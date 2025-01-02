<?php
// functions/log.php

define('LOG_FILE', __DIR__ . '/../debug.log'); 
define('INFO_FILE', __DIR__ . '/../info.log'); 

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

function Write_Info_Log($message)
{
    $infoFile = INFO_FILE; // Use the constant defined above for the file path

    if (!file_exists($infoFile)) {
        // Create an empty log file if it does not exist
        file_put_contents($infoFile, '');
    }

    // Append message to the log file
    file_put_contents($infoFile, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
}
?>
