<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

function sendNotificationEmail($studentData, $parentalData, $institutionData, $attachments)
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
        $uploadDir = 'http://localhost:3000/uploads/' . $studentData['submission_id'] . '/';
        $fileLinks = [];
        foreach ($attachments as $attachment) {
            if (!empty($attachment->file_path)) {
                $fileLinks[$attachment->attachment_type] = "<a href=\"{$uploadDir}{$attachment->file_path}\">{$attachment->file_path}</a>";
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
            <h3>Student Information</h3>
            <table border='1' cellpadding='10'>
                <tr><th>Field</th><th>Value</th></tr>
                <tr><td>First Name</td><td>{$studentData['first_name']}</td></tr>
                <tr><td>Date of Birth</td><td>{$studentData['date_of_birth']}</td></tr>
                <tr><td>Gender</td><td>{$studentData['gender']}</td></tr>
                <tr><td>Nationality</td><td>{$studentData['nationality']}</td></tr>
                <tr><td>Home Address</td><td>{$studentData['home_address']}</td></tr>
                <tr><td>Email</td><td>{$studentData['email']}</td></tr>
                <tr><td>Telephone</td><td>{$studentData['telephone']}</td></tr>
                <tr><td>IBAN</td><td>{$studentData['iban']}</td></tr>
                <tr><td>Outreach</td><td>{$studentData['outreach']}</td></tr>
            </table>

            <h3>Parental Information</h3>
            <table border='1' cellpadding='10'>
                <tr><th>Parent Type</th><th>Full Name</th><th>Email</th><th>Telephone</th></tr>";
        foreach ($parentalData as $parent) {
            $mail->Body .= "
                <tr>
                    <td>{$parent->parent_type}</td>
                    <td>{$parent->full_name}</td>
                    <td>{$parent->email}</td>
                    <td>{$parent->telephone}</td>
                </tr>";
        }
        $mail->Body .= "</table>

            <h3>Institution Details</h3>
            <table border='1' cellpadding='10'>
                <tr><td>Institution Name</td><td>{$institutionData['institution_name']}</td></tr>
                <tr><td>Department</td><td>{$institutionData['department']}</td></tr>
                <tr><td>Course</td><td>{$institutionData['course']}</td></tr>
                <tr><td>Institution Address</td><td>{$institutionData['address']}</td></tr>
                <tr><td>Institution Email</td><td>{$institutionData['email']}</td></tr>
                <tr><td>Institution Telephone</td><td>{$institutionData['telephone']}</td></tr>
            </table>

            <h3>Attachments</h3>
            <table border='1' cellpadding='10'>
                <tr><th>Attachment Type</th><th>File Link</th></tr>";
        foreach ($fileLinks as $type => $link) {
            $mail->Body .= "
                <tr>
                    <td>{$type}</td>
                    <td>{$link}</td>
                </tr>";
        }
        $mail->Body .= "</table>
        </body>
        </html>";

        // Send the email
        $mail->send();
        writeToLog("Notification email sent successfully.");
    } catch (Exception $e) {
        writeToLog("ERROR: Could not send email. Mailer Error: {$mail->ErrorInfo}");
    }
}
