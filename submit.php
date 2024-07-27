<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/Attachment.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Student;
use App\Models\Attachment;

// Define the path to the log file
$logFile = __DIR__ . '/debug.log';

// Function to retrieve country name based on nationality value
function getCountryName($nationalityValue)
{
    global $capsule; // Assuming $capsule contains the Eloquent Capsule

    // Use Eloquent to query the database
    $country = $capsule->getConnection()->table('Countries')->where('value', $nationalityValue)->first();

    if ($country) {
        return $country->name;
    } else {
        return null; 
    }
}

function createNewStudent($studentData)
{
    try {
        writeToLog("Creating new student...\n");
        $newStudent = Student::create($studentData);
        writeToLog("New student created successfully.\n");
        return $newStudent;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function createNewAttachment($imageData)
{
    try {
        writeToLog("Creating new attachment...\n");
        $newAttachment = Attachment::create($imageData);
        writeToLog("New attachment created successfully.\n");
        return $newAttachment;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function sendNotificationEmail($studentData, $imageData)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'shouldtheone@mail.ru'; 
        $mail->Password = 'whupyvhXJJ5Sdan10vAC'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('shouldtheone@mail.ru', 'Your Application System'); 
        $recipients = [
            'Shouldtheone@gmail.com' => 'Serif',
            'another@example.com' => 'Another Recipient',
            'third@example.com' => 'Third Recipient'
        ];

        foreach ($recipients as $email => $name) {
            $mail->addAddress($email, $name);
        }

        $uploadDir = 'http://localhost:3000//uploads/' . $studentData['passportName'] . '/';
        $fileLinks = [];
        foreach ($imageData as $key => $filename) {
            if ($filename) {
                $fileLinks[$key] = "<a href=\"{$uploadDir}{$filename}\">{$filename}</a>";
            } else {
                $fileLinks[$key] = '';
            }
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Applicant Submission';
        $mail->Body = "
        <html>
        <body>
            <h2>New Applicant Submission</h2>
            <table border='1' cellpadding='10'>
                <tr><th>Field</th><th>Value</th></tr>
                <tr><td>First Name</td><td>{$studentData['firstName']}</td></tr>
                <tr><td>Date of Birth</td><td>{$studentData['dateOfBirth']}</td></tr>
                <tr><td>Gender</td><td>{$studentData['gender']}</td></tr>
                <tr><td>T-shirt Size</td><td>{$studentData['tshirtSize']}</td></tr>
                <tr><td>Nationality</td><td>{$studentData['nationality']}</td></tr>
                <tr><td>Place of Birth</td><td>{$studentData['placeOfBirth']}</td></tr>
                <tr><td>Home Address</td><td>{$studentData['homeAddress']}</td></tr>
                <tr><td>Email</td><td>{$studentData['email']}</td></tr>
                <tr><td>Telephone</td><td>{$studentData['telephone']}</td></tr>
                <tr><td>Father's Full Name</td><td>{$studentData['fathersFullName']}</td></tr>
                <tr><td>Father's Email</td><td>{$studentData['fathersEmail']}</td></tr>
                <tr><td>Father's Telephone</td><td>{$studentData['fathersTelephone']}</td></tr>
                <tr><td>Mother's Full Name</td><td>{$studentData['mothersFullName']}</td></tr>
                <tr><td>Mother's Email</td><td>{$studentData['mothersEmail']}</td></tr>
                <tr><td>Mother's Telephone</td><td>{$studentData['mothersTelephone']}</td></tr>
                <tr><td>Passport Name</td><td>{$studentData['passportName']}</td></tr>
                <tr><td>Given Place</td><td>{$studentData['givenPlace']}</td></tr>
                <tr><td>Passport Number</td><td>{$studentData['passportNumber']}</td></tr>
                <tr><td>Expiry Date</td><td>{$studentData['expiryDate']}</td></tr>
                <tr><td>Course</td><td>{$studentData['course']}</td></tr>
                <tr><td>Institution Name</td><td>{$studentData['institutionName']}</td></tr>
                <tr><td>Department</td><td>{$studentData['department']}</td></tr>
                <tr><td>Institution Address</td><td>{$studentData['institutionAddress']}</td></tr>
                <tr><td>Institution Email</td><td>{$studentData['institutionEmail']}</td></tr>
                <tr><td>Institution Telephone</td><td>{$studentData['institutionTelephone']}</td></tr>
                <tr><td>IBAN</td><td>{$studentData['iban']}</td></tr>
                <tr><td>Student Certificate</td><td>{$fileLinks['studentCertificate']}</td></tr>
                <tr><td>Photo</td><td>{$fileLinks['photo']}</td></tr>
                <tr><td>Passport Copy</td><td>{$fileLinks['passportCopy']}</td></tr>
            </table>
        </body>
        </html>";

        $mail->send();
        writeToLog("Notification email sent successfully.\n");
    } catch (Exception $e) {
        writeToLog("ERROR: Could not send email. Mailer Error: {$mail->ErrorInfo}\n");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    writeToLog("Processing form submission...\n");

    // Establish database connection if not already done
    require_once __DIR__ . '/config/database.php';

    // Prepare student data
    $nationalityValue = $_POST['Nationality'];
    $countryName = getCountryName($nationalityValue);

    $studentData = [
        'submissionId' => uniqid(),
        'firstName' => $_POST['first_name'],
        'dateOfBirth' => $_POST['date_of_birth'],
        'gender' => $_POST['gender'],
        'tshirtSize' => $_POST['tshirt_size'],
        'nationality' => $countryName,
        'placeOfBirth' => $_POST['place_of_birth'],
        'homeAddress' => $_POST['home_address'],
        'email' => $_POST['email'],
        'telephone' => $_POST['telephone'],
        'fathersFullName' => $_POST['fathers_full_name'],
        'fathersEmail' => $_POST['fathers_email'],
        'fathersTelephone' => $_POST['fathers_telephone'],
        'mothersFullName' => $_POST['mothers_full_name'],
        'mothersEmail' => $_POST['mothers_email'],
        'mothersTelephone' => $_POST['mothers_telephone'],
        'passportName' => $_POST['passport_name'],
        'givenPlace' => $_POST['given_place'],
        'passportNumber' => $_POST['passport_number'],
        'expiryDate' => $_POST['expiry_date'],
        'course' => $_POST['course'],
        'institutionName' => $_POST['institution_name'],
        'department' => $_POST['department'],
        'institutionAddress' => $_POST['institution_address'],
        'institutionEmail' => $_POST['institution_email'],
        'institutionTelephone' => $_POST['institution_telephone'],
        'iban' => $_POST['iban']
    ];

    // Prepare image data
    $imageData = [
        'submissionId' => $studentData['submissionId'],
        'firstName' => $_POST['first_name'],
        'studentCertificate' => $_FILES['student_certificate']['name'],
        'photo' => $_FILES['photo']['name'],
        'passportName' => $_POST['passport_name'],
        'passportCopy' => $_FILES['passport_copy']['name'],
        // 'Recommendation_Letter' => $_FILES['Recommendation_Letter']['name'], 
        // 'Motivation_Letter' => $_FILES['Motivation_Letter']['name'] 
    ];
    
    try {
        $passportName = $_POST['passport_name'];

        writeToLog("Creating upload directory...\n");

        // Create directory if it doesn't exist
        $uploadDir = 'uploads/' . $passportName . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Creates the directory recursively
            writeToLog("Upload directory created: $uploadDir\n");
        }

        writeToLog("Creating new student and attachment...\n");

        $newStudent = createNewStudent($studentData);
        $newAttachment = createNewAttachment($imageData);

        // Handle file uploads
        move_uploaded_file($_FILES['student_certificate']['tmp_name'], $uploadDir . $_FILES['student_certificate']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $_FILES['photo']['name']);
        move_uploaded_file($_FILES['passport_copy']['tmp_name'], $uploadDir . $_FILES['passport_copy']['name']);
        // move_uploaded_file($_FILES['Recommendation_Letter']['tmp_name'], $uploadDir . $_FILES['Recommendation_Letter']['name']);
        // move_uploaded_file($_FILES['Motivation_Letter']['tmp_name'], $uploadDir . $_FILES['Motivation_Letter']['name']);

        writeToLog("Data insertion successful.\n");
        
        // Send notification email
        sendNotificationEmail($studentData, $imageData);

        // Redirect to success page
        header('Location: /SuccessfulRegisteration');
        exit;
    } catch (Exception $e) {
        // Log the error and display a generic error message
        writeToLog("ERROR: " . $e->getMessage() . "\n");
        echo 'Form submission failed. Please try again later.';
    }
} else {
    // Redirect back to the form page if the request method is not POST
    header('Location: /');
    exit;
}

function writeToLog($message)
{
    global $logFile;
    file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ' . $message, FILE_APPEND);
}
?>
