<?php
$session_expire = 300; // 5 minutes for session expiration
session_set_cookie_params($session_expire);
session_start();
require_once __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_regenerate_id(true);

// Function to generate a random 6-digit passcode
function generatePasscode() {
    return rand(100000, 999999);
}

// Check if the user has provided credentials
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordHash = '$2y$10$wcJJyWIUar.qx6v9BjqH6eJww9N10eDFql09Cpd4gVSi4yQkztj7y'; 
    $expectedHash = crypt($password, $passwordHash);
    $expectedUsername = 'tomioka047';

    if ($username !== $expectedUsername || $expectedHash !== $passwordHash) {
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= 3) {
            // Send email notification
            $to = "shouldtheone@gmail.com";
            $subject = "Login attempts exceeded";
            $message = "Someone has attempted to log in to the Admin Panel more than 3 times.";

            sendEmail($to, $subject, $message);
            exit;
        }
        
        $error = 'Invalid credentials';
    } else {
        // Generate and send the passcode
        $passcode = generatePasscode();
        $_SESSION['passcode'] = $passcode;

        $to = "shouldtheone@gmail.com";
        $subject = "Your Login Passcode";
        $message = "Your passcode is: $passcode";

        sendEmail($to, $subject, $message);

        // Redirect to passcode entry page
        header("Location: /authentication");
        exit;
    }
}

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'shouldtheone@mail.ru'; 
        $mail->Password = 'whupyvhXJJ5Sdan10vAC'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('shouldtheone@mail.ru', 'Admin Panel');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center mb-0">Sign In</h2>
                    </div>
                    <div class="card-body">
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
