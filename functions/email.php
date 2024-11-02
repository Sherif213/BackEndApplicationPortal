<?php
// functions/email.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Dotenv\Dotenv;

function sendNotificationEmail($studentData, $imageData)
{
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $mail = new PHPMailer(true);
    try {
        writeToLog("Preparing to send notification email...");

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['email_username']; 
        $mail->Password = $_ENV['email_password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set sender email and name
        $mail->setFrom($_ENV['email_username'], 'UNESCO APPLICATION PORTAL');
        
        // Recipients
        $recipients = [
            $_ENV['firstRecipient'] => 'Serif',
            $_ENV['secondRecipient'] => 'Osman',
            $_ENV['thirdRecipient'] => 'Faruk',
            
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
        $mail->Subject = 'NEW UNESCO PROGRAM APPLICANT';
        
        // Email body with embedded HTML
        $mail->Body = "
        <html>
        <body>
            <h2>NEW UNESCO PROGRAM APPLICANT</h2>
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
?>
