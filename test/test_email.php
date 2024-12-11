<?php
require '../functions/email.php'; 
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../functions/log.php';

// Sample data
$studentData = [
    'submission_id' => '12345',
    'first_name' => 'John',
    'date_of_birth' => '2000-01-01',
    'gender' => 'Male',
    'nationality' => 'American',
    'home_address' => '123 Main St, Anytown, USA',
    'email' => 'john.doe@example.com',
    'telephone' => '123-456-7890',
    'iban' => 'US12345678901234567890',
    'outreach' => 'Internet'
];

$parentalData = [
    'father' => [
        'full_name' => 'John Doe Sr.',
        'email' => 'john.doe.sr@example.com',
        'telephone' => '123-456-7891'
    ],
    'mother' => [
        'full_name' => 'Jane Doe',
        'email' => 'jane.doe@example.com',
        'telephone' => '123-456-7892'
    ]
];

$legalinformation = [
    'passport_name' => 'John Doe',
    'given_place' => 'Anytown',
    'passport_number' => 'A12345678',
    'expiry_date' => '2030-01-01'
];

$institutionData = [
    'institution_name' => 'Anytown University',
    'department' => 'Computer Science',
    'course' => 'BSc Computer Science',
    'address' => '456 University Ave, Anytown, USA',
    'email' => 'info@anytownuniversity.edu',
    'telephone' => '123-456-7893'
];

$attachments = [
    (object)[
        'attachment_type' => 'Transcript',
        'file_path' => 'transcript.pdf'
    ],
    (object)[
        'attachment_type' => 'ID Card',
        'file_path' => 'id_card.pdf'
    ]
];

// Call the function with sample data
sendNotificationEmail($studentData, $parentalData, $legalinformation, $institutionData, $attachments);