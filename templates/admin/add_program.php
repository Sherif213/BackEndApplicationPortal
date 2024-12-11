<?php
session_start();
use App\Models\Program;

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Program.php';
require_once __DIR__ . '/../../functions/log.php';

writeToLog("Request URI: " . $_SERVER['REQUEST_URI']);
writeToLog("Request method: " . $_SERVER['REQUEST_METHOD']);
writeToLog("POST data: " . json_encode($_POST));

try {
    Database::getConnection();
    writeToLog("Database connection established.");
} catch (Exception $e) {
    writeToLog("Database connection error: " . $e->getMessage());
    die("Database connection error: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        writeToLog("Processing program addition...");

        // Sanitize and validate input data
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $start_date = filter_var($_POST['start_date'], FILTER_SANITIZE_STRING);
        $end_date = filter_var($_POST['end_date'], FILTER_SANITIZE_STRING);
        $progress = filter_var($_POST['progress'], FILTER_SANITIZE_STRING);

        if (empty($name) || empty($start_date) || empty($end_date) || empty($progress)) {
            throw new Exception('All fields are required.');
        }

        // Create program entry
        $programData = [
            'name' => $name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'progress' => $progress,
        ];

        $newProgram = Program::create($programData);
        writeToLog("Program created with ID: " . $newProgram->id);

        // Success response
        echo "<script>alert('Program added successfully!'); window.location.href='add_program_form.php';</script>";
    } catch (Exception $e) {
        // Log error and show an alert
        writeToLog("ERROR: " . $e->getMessage());
        echo "<script>alert('Error adding program: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    writeToLog("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    header('Location: adding_new_program.php');
    exit;
}
