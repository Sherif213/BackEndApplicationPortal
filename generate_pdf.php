<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Payment_Panel.php';
use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function generatePDF($payments)
{
    $html = '
    <!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h2>Payment Status Report</h2>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Payment Status</th>
                    <th>Amount Sent</th>
                    <th>Currency</th>
                    <th>Receipt</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($payments as $payment) {
        $html .= '<tr>
            <td>' . htmlspecialchars($payment->student->firstName ?? 'N/A') . '</td>
            <td>' . htmlspecialchars($payment->payment_status ?? 'N/A') . '</td>
            <td>' . htmlspecialchars($payment->amount_sent ?? 'N/A') . '</td>
            <td>' . htmlspecialchars($payment->currency ?? 'N/A') . '</td>
            <td>' . ($payment->receipt ? '<a href="uploads/' . htmlspecialchars($payment->receipt) . '" target="_blank">View</a>' : 'No Receipt') . '</td>
        </tr>';
    }

    $html .= '
            </tbody>
        </table>
    </body>
    </html>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    return $dompdf->output();
}

function sendPdfByEmail($email, $pdfContent)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'shouldtheone@mail.ru';
        $mail->Password = 'whupyvhXJJ5Sdan10vAC';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('shouldtheone@mail.ru', 'Your Name');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Payment Status PDF Report';
        $mail->Body = 'Please find attached the PDF report of the payment status.';

        // Save the PDF content to a temporary file
        $tmpPdfPath = tempnam(sys_get_temp_dir(), 'pdf');
        file_put_contents($tmpPdfPath, $pdfContent);

        // Attach the saved PDF file
        $mail->addAttachment($tmpPdfPath, 'payment_report.pdf');

        $mail->send();

        // Clean up the temporary file
        unlink($tmpPdfPath);
        
    } catch (Exception $e) {
        throw new Exception('Mailer Error: ' . $mail->ErrorInfo);
    }
}


?>
