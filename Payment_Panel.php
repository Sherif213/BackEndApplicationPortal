<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // Ensure this path is correct
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/Payment.php';
use App\Models\Student;
use App\Models\Payment;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Fetch students who have not made a payment
function getAvailableStudents()
{
    $studentsWithPayments = Payment::pluck('student_id')->toArray();
    return Student::whereNotIn('id', $studentsWithPayments)->get();
}

// Fetch payments from the database
function getPayments()
{
    return Payment::all();
}

// Handle delete request
if (isset($_GET['delete'])) {
    $paymentId = $_GET['delete'];
    try {
        $payment = Payment::find($paymentId);
        if ($payment) {
            // Remove the file associated with the payment if it exists
            if ($payment->receipt && file_exists("uploads/{$payment->receipt}")) {
                unlink("uploads/{$payment->receipt}");
            }
            $payment->delete();
            header("Location: /Payment_Panel.php?message=Payment deleted successfully.");
            exit;
        } else {
            echo "Payment not found.";
        }
    } catch (Exception $e) {
        echo 'Error: ' . htmlspecialchars($e->getMessage());
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['student_id']) && isset($_POST['payment_status'])) {
        $studentId = $_POST['student_id'];
        $paymentStatus = $_POST['payment_status'];
        $amountSent = $paymentStatus === 'paid' ? ($_POST['amount_sent'] ?? null) : null;
        $currency = $paymentStatus === 'paid' ? ($_POST['currency'] ?? 'TRY') : 'N/A'; // Default to TRY if not set
        $receipt = $paymentStatus === 'paid' ? ($_FILES['receipt']['name'] ?? null) : null;

        // Debugging output
        error_log("Student ID: $studentId");
        error_log("Payment Status: $paymentStatus");
        error_log("Amount Sent: $amountSent");
        error_log("Currency: $currency");
        error_log("Receipt: $receipt");

        // Fetch the student based on student_id
        $student = Student::find($studentId);

        if ($student) {
            // Insert data into the database
            try {
                $payment = Payment::create([
                    'student_id' => $studentId,
                    'payment_status' => $paymentStatus,
                    'amount_sent' => $amountSent,
                    'currency' => $currency,
                    'receipt' => $receipt
                ]);

                // Handle file upload if necessary
                if ($receipt) {
                    move_uploaded_file($_FILES['receipt']['tmp_name'], "uploads/$receipt");
                }

                // Redirect or provide feedback
                header("Location: /Payment_Panel.php");
                exit;
            } catch (Exception $e) {
                echo 'Error: ' . htmlspecialchars($e->getMessage());
            }
        } else {
            echo "Student not found.";
        }
    } elseif (isset($_POST['send_pdf'])) {
        // Handle sending PDF
        $email = $_POST['email'];

        // Validate email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                $payments = getPayments();
                $pdfContent = generatePDF($payments);

                // Debugging: Ensure PDF content is generated
                if (empty($pdfContent)) {
                    throw new Exception('Failed to generate PDF content.');
                }

                sendPdfByEmail($email, $pdfContent);
                $_SESSION['sent_emails'][] = $email;
                header('Location: Payment_Panel.php?message=PDF sent successfully.');
                exit();
            } catch (Exception $e) {
                echo 'Error: ' . htmlspecialchars($e->getMessage());
            }
        } else {
            echo 'Invalid email address.';
        }
    }
}

$students = getAvailableStudents();
$payments = getPayments();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #0A2853;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 100px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #43766C;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #43766C;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0A2853;
        }

        .btn-pdf {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-pdf:hover {
            background-color: #0056b3;
        }

        table {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center mb-0">Student Payment</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="student_id" class="form-label">Student</label>
                                <select id="student_id" name="student_id" class="form-select" required>
                                    <option value="">Select a student</option>
                                    <?php foreach ($students as $student): ?>
                                        <option value="<?php echo htmlspecialchars($student->id); ?>"
                                            data-program="<?php echo htmlspecialchars($student->course ?? ''); ?>">
                                            <?php echo htmlspecialchars($student->firstName ?? ''); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="program" class="form-label">Program</label>
                                <input type="text" id="program" name="program" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="payment_status" class="form-label">Payment Status</label>
                                <select id="payment_status" name="payment_status" class="form-select" required
                                    onchange="togglePaymentFields()">
                                    <option value="">Select payment status</option>
                                    <option value="paid">Paid</option>
                                    <option value="unpaid">Unpaid</option>
                                </select>
                            </div>
                            <div id="payment_info" style="display: none;">
                                <div class="form-group">
                                    <label for="amount_sent" class="form-label">Amount Sent</label>
                                    <input type="number" class="form-control" id="amount_sent" name="amount_sent"
                                        min="0" step="0.01">
                                </div>
                                <div class="form-group">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select id="currency" name="currency" class="form-select">
                                        <option value="TRY">Turkish Lira (TRY)</option>
                                        <option value="USD">Dollars (USD)</option>
                                        <option value="EUR">Euros (EUR)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="receipt" class="form-label">Receipt</label>
                                    <input type="file" class="form-control" id="receipt" name="receipt">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payment Status Table -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center mb-0">Payment Status</h3>
                    </div>
                    <div class="card-body">
                        <!-- <button class="btn btn-pdf" onclick="generatePDF()">Download PDF</button> -->
                        <table id="paymentTable" class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Payment Status</th>
                                    <th>Amount Sent</th>
                                    <th>Currency</th>
                                    <th>Receipt</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payments as $payment): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($payment->student->firstName ?? 'N/A'); ?></td>
                                        <td><?php echo htmlspecialchars($payment->payment_status ?? 'N/A'); ?></td>
                                        <td><?php echo htmlspecialchars($payment->amount_sent ?? 'N/A'); ?></td>
                                        <td><?php echo htmlspecialchars($payment->currency ?? 'N/A'); ?></td>
                                        <td>
                                            <?php if ($payment->receipt): ?>
                                                <a href="uploads/<?php echo htmlspecialchars($payment->receipt); ?>"
                                                    target="_blank">View</a>
                                            <?php else: ?>
                                                No Receipt
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="?delete=<?php echo htmlspecialchars($payment->id); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this payment?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Send PDF by Email -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center mb-0">Send PDF by Email</h3>
                    </div>
                    <div class="card-body">
                        <form action="generate_pdf.php" method="post">
                            <div class="form-group">
                                <label for="email" class="form-label">Recipient Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send_pdf" class="btn btn-primary btn-block">Send
                                    PDF</button>
                            </div>
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const studentSelect = document.getElementById('student_id');
            const programInput = document.getElementById('program');
            studentSelect.addEventListener('change', function () {
                const selectedOption = studentSelect.options[studentSelect.selectedIndex];
                const program = selectedOption.getAttribute('data-program');
                programInput.value = program;
            });
        });

        function togglePaymentFields() {
            const paymentStatus = document.getElementById('payment_status').value;
            const paymentInfo = document.getElementById('payment_info');
            paymentInfo.style.display = paymentStatus === 'paid' ? 'block' : 'none';
        }

        function generatePDF() {
            // Implement PDF generation logic here
        }
    </script>
</body>

</html>
