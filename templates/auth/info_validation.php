<?php
session_start();
require_once '../../vendor/autoload.php'; 
require_once '../../models/users.php'; 
require_once '../../config/database.php';

use App\Models\User;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $capsule = Database::getConnection();

    if (isset($_POST['email'])) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        // Check if the email already exists in the database
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            echo json_encode(['status' => 'error', 'message' => 'Email already exists. Please use a different email.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Email is available.']);
        }
    }

    elseif (isset($_POST['username'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);

        // Check if the username already exists in the database
        $existingUser = User::where('username', $username)->first();

        if ($existingUser) {
            echo json_encode(['status' => 'error', 'message' => 'Username already exists. Please choose a different username.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Username is available.']);
        }
    }
}
?>
