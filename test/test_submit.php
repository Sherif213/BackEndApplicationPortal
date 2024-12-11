<?php
// test_submit.php

// Initialize a cURL session
$ch = curl_init();

// Define the URL of the form's processing file
$targetUrl = "http://localhost:3000/submit.php";
curl_setopt($ch, CURLOPT_URL, $targetUrl); // Change this URL to the actual location

echo "Target URL: $targetUrl\n";

// Set cURL to send data via POST
curl_setopt($ch, CURLOPT_POST, true);

// Test data for form fields
$data = [
    'first_name' => 'John',
    'date_of_birth' => '1990-01-01',
    'gender' => 'Male',
    'tshirt_size' => 'L',
    'nationality' => 'US',
    'place_of_birth' => 'New York',
    'home_address' => '123 Main St, New York, NY',
    'email' => 'john.doe@example.com',
    'telephone' => '1234567890',
    'fathers_full_name' => 'James Doe',
    'fathers_email' => 'james.doe@example.com',
    'fathers_telephone' => '0987654321',
    'mothers_full_name' => 'Jane Doe',
    'mothers_email' => 'jane.doe@example.com',
    'mothers_telephone' => '0123456789',
    'passport_name' => 'John Doe',
    'given_place' => 'New York',
    'passport_number' => 'A12345678',
    'expiry_date' => '2030-01-01',
    'course' => 'Computer Science',
    'institution_name' => 'Example University',
    'department' => 'Engineering',
    'institution_address' => '456 College St, New York, NY',
    'institution_email' => 'admissions@example.edu',
    'institution_telephone' => '9876543210',
    'iban' => 'US12345678901234567890',
    'outreach' => 'Social Media'
];

echo "Form data prepared.\n";

// Test files for file upload fields
$fileData = [
    'student_certificate' => curl_file_create(__DIR__ . '/test_files/student_certificate.pdf', 'application/pdf', 'student_certificate.pdf'),
    'photo' => curl_file_create(__DIR__ . '/test_files/photo.jpg', 'image/jpeg', 'photo.jpg'),
    'passport_copy' => curl_file_create(__DIR__ . '/test_files/passport_copy.pdf', 'application/pdf', 'passport_copy.pdf'),
    'Recommendation_Letter' => curl_file_create(__DIR__ . '/test_files/recommendation_letter.pdf', 'application/pdf', 'recommendation_letter.pdf'),
    'Motivation_Letter' => curl_file_create(__DIR__ . '/test_files/motivation_letter.pdf', 'application/pdf', 'motivation_letter.pdf'),
    'consentForm' => curl_file_create(__DIR__ . '/test_files/consent_form.pdf', 'application/pdf', 'consent_form.pdf')
];

echo "File data prepared.\n";

// Combine form data and file data
$postData = array_merge($data, $fileData);

// Attach the data and files to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// Return the response instead of printing
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set a timeout for the request
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

echo "Sending data to the server...\n";

// Execute the cURL request and capture the response
$response = curl_exec($ch);

// Check if there were any cURL errors
if ($response === false) {
    $error = curl_error($ch);
    echo "cURL Error: $error\n";
    // Log the error to a file
    error_log("cURL Error: $error\n", 3, __DIR__ . '/error_log.txt');
} else {
    echo "Data sent successfully. Server response:\n";
    echo $response; // Display the response from your form processing file
    // Log the response to a file
    file_put_contents(__DIR__ . '/response_log.txt', $response, FILE_APPEND);
}

// Close the cURL session
curl_close($ch);

echo "\nTest completed.\n";
