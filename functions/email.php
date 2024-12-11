<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;


function sendNotificationEmail($studentData, $parentalData,$legalinformation, $institutionData, $attachments)
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
            // $_ENV['secondRecipient'] => 'Talla',
            // $_ENV['thirdRecipient'] => 'Faruk',
            // $_ENV['fourthRecipient'] => 'Osman',
            // $_ENV['fifthRecipient'] => 'Beyza',
        ];
        foreach ($recipients as $email => $name) {
            $mail->addAddress($email, $name);
        }

        // Create file links
        $uploadDir = 'http://localhost:3000/uploads/' . $studentData['submission_id'] . '/';
writeToLog('Attachments Data: ' . print_r($attachments, true));

$fileLinks = [];
if (!empty($attachments)) {
    foreach ($attachments as $type => $attachment) {
        if (!empty($attachment['name'])) {
            $filePath = $uploadDir . $attachment['name'];
            $fileName = basename($attachment['name']);
            $fileLinks[$type] = "<a href=\"{$filePath}\" target=\"_blank\">{$fileName}</a>";
            writeToLog("Attachment processed: Type={$type}, Path={$filePath}");
        } else {
            writeToLog("Empty file path for attachment type: {$type}");
        }
    }
} else {
    writeToLog("No attachments found.");
}

// Log the generated file links
writeToLog('Generated File Links: ' . print_r($fileLinks, true));


        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'NEW UNESCO PROGRAM APPLICANT';

        // Email body with embedded HTML
        $mail->Body = "
        <html>
        <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;'>
            <div style='max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 5px; overflow: hidden;'>
                <!-- Header -->
                <div style='background-color: #007bff; color: #ffffff; padding: 20px; text-align: center;'>
                    <h2 style='margin: 0;'>UNESCO Application Portal</h2>
                    <p>New Applicant Notification</p>
                </div>

                <!-- Main Content -->
                <div style='padding: 20px;'>
                    <h3 style='color: #333;'>Student Information</h3>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
                        <tr style='background-color: #f4f4f4;'>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Field</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Value</th>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>First Name</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['first_name']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Date of Birth</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['date_of_birth']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Gender</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['gender']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Nationality</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['nationality']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Home Address</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['home_address']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Email</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['email']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Telephone</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['telephone']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>IBAN</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['iban']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Outreach</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$studentData['outreach']}</td>
                        </tr>
                    </table>

                    <h3 style='color: #333;'>Parental Information</h3>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
                        <tr style='background-color: #f4f4f4;'>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Parent Type</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Full Name</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Email</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Telephone</th>
                        </tr>";
                        if (!empty($parentalData)) {
                            foreach ($parentalData as $parentType => $parent) {
                                $mail->Body .= "
                                <tr>
                                    <td style='border: 1px solid #dddddd; padding: 10px;'>" . ucfirst($parentType) . "</td>
                                    <td style='border: 1px solid #dddddd; padding: 10px;'>{$parent['full_name']}</td>
                                    <td style='border: 1px solid #dddddd; padding: 10px;'>{$parent['email']}</td>
                                    <td style='border: 1px solid #dddddd; padding: 10px;'>{$parent['telephone']}</td>
                                </tr>";
                            }
                        } else {
                            $mail->Body .= "
                            <tr>
                                <td colspan='4' style='border: 1px solid #dddddd; padding: 10px; text-align: center;'>No parental information available</td>
                            </tr>";
                        }
        $mail->Body .= "
                    </table>

                    <h3 style='color: #333;'>Institution Information</h3>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
                        <tr style='background-color: #f4f4f4;'>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Field</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Value</th>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Institution Name</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$institutionData['institution_name']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Department</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$institutionData['department']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Course</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$institutionData['course']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Address</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$institutionData['address']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Email</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$institutionData['email']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Telephone</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$institutionData['telephone']}</td>
                        </tr>
                    </table>

                    <h3 style='color: #333;'>Legal Information</h3>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
                        <tr style='background-color: #f4f4f4;'>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Field</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Value</th>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Passport Name</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$legalinformation['passport_name']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Given Place</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$legalinformation['given_place']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Passport Number</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$legalinformation['passport_number']}</td>
                        </tr>
                        <tr>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>Expiry Date</td>
                            <td style='border: 1px solid #dddddd; padding: 10px;'>{$legalinformation['expiry_date']}</td>
                        </tr>
                    </table>

                    <h3 style='color: #333;'>Attachments</h3>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
                        <tr style='background-color: #f4f4f4;'>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>Attachment Type</th>
                            <th style='border: 1px solid #dddddd; padding: 10px; text-align: left;'>File Link</th>
                        </tr>";
                        if (!empty($fileLinks)) {
                            foreach ($fileLinks as $type => $link) {
                                $mail->Body .= "
                                <tr>
                                    <td style='border: 1px solid #dddddd; padding: 10px;'>{$type}</td>
                                    <td style='border: 1px solid #dddddd; padding: 10px;'>{$link}</td>
                                </tr>";
                            }
                        } else {
                            $mail->Body .= "
                            <tr>
                                <td colspan='2' style='border: 1px solid #dddddd; padding: 10px; text-align: center;'>No attachments available</td>
                            </tr>";
                        }
        $mail->Body .= "
                    </table>
                </div>

                <!-- Footer -->
                <div style='background-color: #007bff; color: #ffffff; text-align: center; padding: 10px;'>
                    <p style='margin: 0;'>© 2024 UNESCO Application Portal</p>
                </div>
            </div>
        </body>
        </html>";
        // Send the email
        $mail->send();
        writeToLog("Notification email sent successfully.");
    } catch (Exception $e) {
        writeToLog("ERROR: Could not send email. Mailer Error: {$mail->ErrorInfo}");
    }
}
