<?php
use App\Models\Student;
use App\Models\Attachment;
use App\Models\ParentalInfo;
use App\Models\InstitutionDetail;
use App\Models\legal_information;
use App\Models\StudentProgram;

// Include necessary files
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/Parental_info.php';
require_once __DIR__ . '/models/institution_details.php';
require_once __DIR__ . '/models/Attachment.php';
require_once __DIR__ . '/models/legal_information.php';
require_once __DIR__ . '/models/student_program.php';

require_once __DIR__ . '/functions/log.php';
require_once __DIR__ . '/functions/email.php';
require_once __DIR__ . '/functions/student.php';
require_once __DIR__ . '/functions/attachment.php';


$capsule = Database::getConnection();
// Get the student ID from a request parameter or POST data
// $studentId = filter_var($_GET['student_id'] ?? $_POST['student_id'], FILTER_VALIDATE_INT);
$studentId = 21;

if (!$studentId) {
    die('Error: Invalid or missing student ID.');
}

// Fetch student data from the database
$studentData = Student::find($studentId);
if (!$studentData) {
    die('Error: Student not found.');
}

// Fetch associated parental information
$parentalData = ParentalInfo::where('student_id', $studentId)->get()->map(function ($parent) {
    return [
        'full_name' => $parent->full_name,
        'email' => $parent->email,
        'telephone' => $parent->telephone,
        'type' => $parent->parent_type, // 'Father' or 'Mother'
    ];
});

// Fetch legal information
$legal_information = legal_Information::where('student_id', $studentId)->first();

// Fetch institution details
$institutionData = InstitutionDetail::where('student_id', $studentId)->first();

// Fetch attachments
$attachments = Attachment::where('student_id', $studentId)->get();
$attachmentData = $attachments->map(function ($attachment) {
    return [
        'type' => $attachment->attachment_type,
        'file_path' => $attachment->file_path,
        'file_name' => basename($attachment->file_path),
    ];
})->toArray();

// Prepare the data array
$data = [
    'student' => [
        'first_name' => $studentData->first_name,
        'date_of_birth' => $studentData->date_of_birth,
        'tshirt_size' => $studentData->tshirt_size,
        'gender' => $studentData->gender,
        'nationality' => $studentData->nationality,
        'place_of_birth' => $studentData->place_of_birth,
        'home_address' => $studentData->home_address,
        'email' => $studentData->email,
        'telephone' => $studentData->telephone,
        'outreach' => $studentData->outreach,
        'iban' => $studentData->iban,
    ],
    'parental_info' => $parentalData,
    'legal_info' => [
        'passport_name' => $legal_information->passport_name ?? 'N/A',
        'given_place' => $legal_information->given_place ?? 'N/A',
        'passport_number' => $legal_information->passport_number ?? 'N/A',
        'expiry_date' => $legal_information->expiry_date ?? 'N/A',
    ],
    'institution' => [
        'institution_name' => $institutionData->institution_name ?? 'N/A',
        'department' => $institutionData->department ?? 'N/A',
        'course' => $institutionData->course ?? 'N/A',
        'address' => $institutionData->address ?? 'N/A',
        'email' => $institutionData->email ?? 'N/A',
        'telephone' => $institutionData->telephone ?? 'N/A',
    ],
    'attachments' => $attachmentData,
];

// Convert to JSON
$jsonData = json_encode($data);

// Send to Python server
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:5005/index'); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Save the PDF file
    $pdfPath = 'output_' . $studentId . '.pdf'; // Use student ID to create unique file
    file_put_contents($pdfPath, $response);
    echo 'PDF generated and saved as ' . $pdfPath;
}

curl_close($ch);
?>
