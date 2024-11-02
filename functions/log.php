<?php
// functions/log.php

define('LOG_FILE', __DIR__ . '/../debug.log'); // Define log file path as a constant

function writeToLog($message)
{
    $logFile = LOG_FILE; // Use the constant defined above for the file path

    if (!file_exists($logFile)) {
        // Create an empty log file if it does not exist
        file_put_contents($logFile, '');
    }

    // Append message to the log file
    file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
}
?>
