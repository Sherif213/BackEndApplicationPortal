<?php
session_start();
use App\Models\Attachment;
use App\Models\ParentalInfo;
use App\Models\InstitutionDetail;
use App\Models\legal_information;
use App\Models\StudentProgram;


require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Parental_info.php';
require_once __DIR__ . '/../models/institution_details.php';
require_once __DIR__ . '/../models/Attachment.php';
require_once __DIR__ . '/../models/legal_information.php';
require_once __DIR__ . '/../models/student_program.php';

require_once __DIR__ . '/../functions/log.php';
require_once __DIR__ . '/../functions/email.php';
require_once __DIR__ . '/../functions/student.php';
require_once __DIR__ . '/../functions/attachment.php';

writeToLog("Request URI: " . $_SERVER['REQUEST_URI']);
writeToLog("Request method: " . $_SERVER['REQUEST_METHOD']);
writeToLog("POST data: " . json_encode($_POST));
writeToLog("FILES data: " . json_encode($_FILES));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        writeToLog("Processing form submission...");

        $gender = strtolower($_POST['gender']) === 'male' ? 'M' : (strtolower($_POST['gender']) === 'female' ? 'F' : null);

        if ($gender === null) {
            throw new Exception('Invalid gender value provided.');
        }

        $programId = filter_var($_POST['program_id'], FILTER_VALIDATE_INT);
        if (!$programId) {
            throw new Exception('Invalid program selected.');
        }

        $attachmentTypeMap = [
            'student_certificate' => 'Certificate',
            'photo' => 'Photo',
            'passport_copy' => 'Passport',
            'recommendation_letter' => 'Recommendation_Letter',
            'motivation_letter' => 'Motivation_Letter',
            'consent_form' => 'ConsentForm',
        ];

        // Validate and sanitize input
        $studentData = [
            'submission_id' => uniqid(),
            'first_name' => filter_var($_POST['first_name'], FILTER_SANITIZE_STRING),
            'date_of_birth' => filter_var($_POST['date_of_birth'], FILTER_SANITIZE_STRING),
            'tshirt_size' => $_POST['tshirt_size'],
            'gender' => $gender,
            'nationality' => getCountryName($_POST['Nationality']),
            'place_of_birth' => getCountryName($_POST['place_of_birth']),
            'home_address' => filter_var($_POST['home_address'], FILTER_SANITIZE_STRING),
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'telephone' => sprintf('+(%s) %s', getDialCode($_POST['telephone_country_code']), filter_var($_POST['telephone'], FILTER_SANITIZE_STRING)),
            'outreach' => filter_var($_POST['outreach'], FILTER_SANITIZE_STRING),
            'iban' => filter_var($_POST['iban'], FILTER_SANITIZE_STRING),
        ];

        $parentalData = [
            'father' => [
                'full_name' => filter_var($_POST['fathers_full_name'], FILTER_SANITIZE_STRING),
                'email' => filter_var($_POST['fathers_email'], FILTER_SANITIZE_EMAIL),
                'telephone' => sprintf('+(%s) %s', getDialCode($_POST['fathers_telephone_country_code']), filter_var($_POST['fathers_telephone'], FILTER_SANITIZE_STRING)),
            ],
            'mother' => [
                'full_name' => filter_var($_POST['mothers_full_name'], FILTER_SANITIZE_STRING),
                'email' => filter_var($_POST['mothers_email'], FILTER_SANITIZE_EMAIL),
                'telephone' =>  sprintf('+(%s) %s', getDialCode($_POST['mothers_telephone_country_code']), filter_var($_POST['mothers_telephone'], FILTER_SANITIZE_STRING)),
            ],
        ];
        $legal_information = [
            'passport_name' => filter_var($_POST['passport_name'], FILTER_SANITIZE_STRING),
            'given_place' => filter_var($_POST['given_place'], FILTER_SANITIZE_STRING),
            'passport_number' => filter_var($_POST['passport_number'], FILTER_SANITIZE_STRING),
            'expiry_date' => filter_var($_POST['expiry_date'], FILTER_SANITIZE_EMAIL),
        ];

        $institutionData = [
            'institution_name' => filter_var($_POST['institution_name'], FILTER_SANITIZE_STRING),
            'department' => filter_var($_POST['department'], FILTER_SANITIZE_STRING),
            'course' => isset($_POST['course']) ? filter_var($_POST['course'], FILTER_SANITIZE_STRING) : null, // Handle optional course
            'address' => filter_var($_POST['institution_address'], FILTER_SANITIZE_STRING),
            'email' => filter_var($_POST['institution_email'], FILTER_SANITIZE_EMAIL),
            'telephone' =>  sprintf('+(%s) %s',getDialCode($_POST['institution_country_code']) , filter_var($_POST['institution_telephone'], FILTER_SANITIZE_STRING)),
        ];

        $attachmentData = [
            'student_certificate' => $_FILES['student_certificate'],
            'photo' => $_FILES['photo'],
            'passport_copy' => $_FILES['passport_copy'],
            'recommendation_letter' => $_FILES['Recommendation_Letter'],
            'motivation_letter' => $_FILES['Motivation_Letter'],
            'consent_form' => $_FILES['consentForm'],
        ];

        // Create student record
        $newStudent = createNewStudent($studentData);
        writeToLog("Student created with ID: " . $newStudent->id);

        StudentProgram::create([
            'student_id' => $newStudent->id,
            'program_id' => $programId,
            'program_specific_id' => uniqid(), // Generate a unique ID for this association
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        writeToLog("Student associated with program ID: $programId");

        // Add parental information
        foreach ($parentalData as $type => $data) {
            ParentalInfo::create([
                'student_id' => $newStudent->id,
                'parent_type' => ucfirst($type), // Father or Mother
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
            ]);
            writeToLog("Parental info added for: $type");
        }

        // Add institution details
        InstitutionDetail::create(array_merge(['student_id' => $newStudent->id], $institutionData));
        writeToLog("Institution details added for student ID: " . $newStudent->id);

        //add legal information
        
        legal_Information::create(array_merge(['student_id' => $newStudent->id], $legal_information));
        writeToLog("legal information details added for student ID: " . $newStudent->id);

        // Process and store file attachments
        $uploadDir = 'uploads/' . $studentData['submission_id'] . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($attachmentData as $type => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                $attachmentType = $attachmentTypeMap[$type] ?? null;
        
                if (!$attachmentType) {
                    writeToLog("Invalid attachment type: $type");
                    throw new Exception("Invalid attachment type: $type");
                }
        
                $filePath = $uploadDir . basename($file['name']);
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    Attachment::create([
                        'student_id' => $newStudent->id,
                        'attachment_type' => $attachmentType,
                        'file_path' => $filePath,
                    ]);
                    writeToLog("Attachment uploaded successfully for type: $attachmentType");
                } else {
                    writeToLog("Failed to upload attachment for type: $attachmentType");
                }
            }
        }

        // Send notification email
        sendNotificationEmail($studentData, $parentalData,$legal_information, $institutionData, $attachmentData);

        writeToLog("Form submission completed successfully.");
        header('Location: /SuccessfulRegisteration');
        exit;
    } catch (Exception $e) {
        writeToLog("ERROR: " . $e->getMessage());
        echo 'Form submission failed. Please try again later.';
    }
} else {
    writeToLog("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    header('Location: /');
    exit;
}
?>
