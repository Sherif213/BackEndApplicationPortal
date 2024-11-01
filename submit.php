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

function writeToLog($message)
{
    global $logFile;
    file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
}

// Function to retrieve country name based on nationality value
function getCountryName($nationalityValue)
{
    global $capsule;

    writeToLog("Retrieving country name for nationality value: $nationalityValue");

    $country = $capsule->getConnection()->table('Countries')->where('value', $nationalityValue)->first();

    if ($country) {
        writeToLog("Country found: {$country->name}");
        return $country->name;
    } else {
        writeToLog("No country found for nationality value: $nationalityValue");
        return null;
    }
}

function createNewStudent($studentData)
{
    try {
        writeToLog("Creating new student with data: " . json_encode($studentData));
        $newStudent = Student::create($studentData);
        writeToLog("New student created successfully with ID: {$newStudent->id}");
        return $newStudent;
    } catch (Exception $e) {
        writeToLog("ERROR creating new student: " . $e->getMessage());
        throw new Exception($e->getMessage());
    }
}

function createNewAttachment($imageData)
{
    try {
        writeToLog("Creating new attachment with data: " . json_encode($imageData));
        $newAttachment = Attachment::create($imageData);
        writeToLog("New attachment created successfully with ID: {$newAttachment->id}");
        return $newAttachment;
    } catch (Exception $e) {
        writeToLog("ERROR creating new attachment: " . $e->getMessage());
        throw new Exception($e->getMessage());
    }
}

function sendNotificationEmail($studentData, $imageData)
{
    $mail = new PHPMailer(true);
    try {
        writeToLog("Preparing to send notification email...");

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'shouldtheone@mail.ru';
        $mail->Password = 'whupyvhXJJ5Sdan10vAC';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set sender email and name
        $mail->setFrom('shouldtheone@mail.ru', 'Your Application System');
        
        // Recipients
        $recipients = [
            'Shouldtheone@gmail.com' => 'Serif',
            
        ];
        foreach ($recipients as $email => $name) {
            $mail->addAddress($email, $name);
        }

        // Create file links
        $uploadDir = 'http://localhost:3000/uploads/' . $studentData['passportName'] . '/';
        $fileLinks = [];
        foreach ($imageData as $key => $filename) {
            if ($filename) {
                $fileLinks[$key] = "<a href=\"{$uploadDir}{$filename}\">{$filename}</a>";
            } else {
                $fileLinks[$key] = '';
            }
        }

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Applicant Submission';
        
        // Email body with embedded HTML
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
                <tr><td>Recommendation Letter</td><td>{$fileLinks['Recommendation_Letter']}</td></tr>
                <tr><td>Motivation Letter</td><td>{$fileLinks['Motivation_Letter']}</td></tr>
                <tr><td>Consent Form</td><td>{$fileLinks['consentForm']}</td></tr>
            </table>
        </body>
        </html>";
        
        // Send the email
        $mail->send();
        writeToLog("Notification email sent successfully.");
    } catch (Exception $e) {
        writeToLog("ERROR: Could not send email. Mailer Error: {$mail->ErrorInfo}");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    writeToLog("Processing form submission...");

    require_once __DIR__ . '/config/database.php';

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
        'iban' => $_POST['iban'],
        'outreach'=>$_POST['outreach']
    ];

    $imageData = [
        'submissionId' => $studentData['submissionId'],
        'firstName' => $_POST['first_name'],
        'studentCertificate' => $_FILES['student_certificate']['name'],
        'photo' => $_FILES['photo']['name'],
        'passportName' => $_POST['passport_name'],
        'passportCopy' => $_FILES['passport_copy']['name'],
        'Recommendation_Letter' => $_FILES['Recommendation_Letter']['name'], 
        'Motivation_Letter' => $_FILES['Motivation_Letter']['name'],
        'consentForm' => $_FILES['consentForm']['name'],
    ];
    
    try {
        $passportName = $_POST['passport_name'];
        $uploadDir = 'uploads/' . $passportName . '/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
            writeToLog("Upload directory created: $uploadDir");
        }

        $newStudent = createNewStudent($studentData);
        $newAttachment = createNewAttachment($imageData);

        move_uploaded_file($_FILES['student_certificate']['tmp_name'], $uploadDir . $_FILES['student_certificate']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $_FILES['photo']['name']);
        move_uploaded_file($_FILES['passport_copy']['tmp_name'], $uploadDir . $_FILES['passport_copy']['name']);
        move_uploaded_file($_FILES['Recommendation_Letter']['tmp_name'], $uploadDir . $_FILES['Recommendation_Letter']['name']);
        move_uploaded_file($_FILES['Motivation_Letter']['tmp_name'], $uploadDir . $_FILES['Motivation_Letter']['name']);
        move_uploaded_file($_FILES['consentForm']['tmp_name'], $uploadDir . $_FILES['consentForm']['name']);

        writeToLog("Files uploaded and data insertion successful.");
        
        sendNotificationEmail($studentData, $imageData);

        header('Location: /SuccessfulRegisteration');
        exit;
    } catch (Exception $e) {
        writeToLog("ERROR: " . $e->getMessage());
        echo 'Form submission failed. Please try again later.';
    }
} else {
    header('Location: /');
    exit;
}
?>