<?php

session_start();
require_once '../../vendor/autoload.php'; 
require_once '../../models/users.php'; 
require_once '../../config/database.php';
require_once '../../functions/log.php'; // Include the logging function

use App\Models\User;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $capsule = Database::getConnection();

    // Log the start of the registration process
    WriteToLog('Starting user registration process.');

    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $firstName = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
    $lastName = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    try {
        // Log the sanitized input data
        WriteToLog('Sanitized input data: ' . json_encode([
            'username' => $username,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email
        ]));

        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            $_SESSION['error'] = "Email already exists. Please use a different email.";
            WriteToLog('Email already exists: ' . $email);
            header('Location: register.php');
            exit();
        }

        // Create new user
        User::create([
            'registeration_id' =>uniqid(),
            'username' => $username,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $password,
            'role' => 'user',
        ]);

        $_SESSION['success'] = "Registration successful!";
        WriteToLog('User registration successful: ' . $email);
        header('Location: login.php');
        exit();

    } catch (Exception $e) {
        $_SESSION['error'] = "There was an error: " . $e->getMessage();
        WriteToLog('Error during registration: ' . $e->getMessage());
        header('Location: register.php');
        exit();
    }
}
?>
