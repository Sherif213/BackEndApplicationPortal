<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Retrieve student data from the database using Eloquent
$students = Capsule::table('students')->get();

// Export data to CSV file
$csvFilePath = 'student_data.csv';
$csvFile = fopen($csvFilePath, 'w');

// Specify UTF-8 encoding
fwrite($csvFile, "\xEF\xBB\xBF"); // UTF-8 BOM

// Write headers
$headers = [
    'ID', 'Submission ID', 'First Name', 'Date of Birth', 'Gender', 'T-Shirt Size',
    'Nationality', 'Place of Birth', 'Home Address', 'Email', 'Telephone', "Father's Full Name",
    "Father's Email", "Father's Telephone", "Mother's Full Name", "Mother's Email",
    "Mother's Telephone", 'Passport Name', 'Given Place', 'Passport Number', 'Expiry Date',
    'Course', 'Institution Name', 'Department', 'Institution Address', 'Institution Email',
    'Institution Telephone', 'IBAN', 'Student Certificate', 'Photo', 'Passport Copy'
];
fputcsv($csvFile, $headers);

// Write data rows
foreach ($students as $student) {
    // Retrieve attachment data for the current student
    $attachment = Capsule::table('attachments')->where('submissionId', $student->submissionId)->first();

    $rowData = [
        $student->id, $student->submissionId, $student->firstName, $student->dateOfBirth,
        $student->gender, $student->tshirtSize, $student->nationality, $student->placeOfBirth,
        $student->homeAddress, $student->email, $student->telephone, $student->fathersFullName,
        $student->fathersEmail, $student->fathersTelephone, $student->mothersFullName,
        $student->mothersEmail, $student->mothersTelephone, $student->passportName,
        $student->givenPlace, $student->passportNumber, $student->expiryDate, $student->course,
        $student->institutionName, $student->department, $student->institutionAddress,
        $student->institutionEmail, $student->institutionTelephone, $student->iban,
        isset($attachment->studentCertificate) ? $attachment->studentCertificate : '',
        isset($attachment->photo) ? $attachment->photo : '',
        isset($attachment->passportCopy) ? $attachment->passportCopy : ''
    ];
    fputcsv($csvFile, $rowData);
}

// Close CSV file
fclose($csvFile);

// Download CSV file
header('Content-Type: application/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $csvFilePath . '"');
readfile($csvFilePath);
exit;
