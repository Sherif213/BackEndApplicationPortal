<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['forgotten_email'] ?? '';
    $code = rand(100000, 999999); 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address. Please go back and enter a valid email.");
    }

    
    $_SESSION['verification_code'] = $code;

    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru'; 
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV["email_username"]; 
        $mail->Password = $_ENV["email_password"]; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        
        $subject = "Your Verification Code";
        $message = "
            <p>Dear User,</p>
            <p>Your verification code is: <strong>$code</strong></p>
            <p>Please enter this code on the verification page to proceed.</p>
            <p>If you did not request this, please ignore this email.</p>
            <br>
            <p>Best regards,<br>Admin Panel</p>
        ";

        
        $mail->setFrom($_ENV["email_username"], 'Admin Panel');
        $mail->addAddress($email); 
        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body    = $message;

        
        $mail->send();

        
        header("Location: email_confirmation.php");
        exit;
    } catch (Exception $e) {
        
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
