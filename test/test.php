<?php
// The URL of the form you want to test
$url = 'http://localhost:3000/winterDiplomacyFormApplication?AuthKey=8932d175';


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

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true); // Use POST method
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Pass data as a query string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of printing it
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Skip SSL verification (only for testing)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Skip SSL verification (only for testing)

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Print the response from the server
    echo "Server Response:\n";
    echo $response;
}

// Close the cURL session
curl_close($ch);
?>
