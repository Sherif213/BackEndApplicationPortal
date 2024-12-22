<?php
use App\Models\Student;
use App\Models\Attachment;
use App\Models\ParentalInfo;
use App\Models\InstitutionDetail;
use App\Models\legal_information;
use App\Models\StudentProgram;


require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Student.php';
require_once __DIR__ . '/../../models/Parental_info.php';
require_once __DIR__ . '/../../models/institution_details.php';
require_once __DIR__ . '/../../models/Attachment.php';
require_once __DIR__ . '/../../models/legal_information.php';
require_once __DIR__ . '/../../models/student_program.php';

require_once __DIR__ . '/../../functions/log.php';
require_once __DIR__ . '/../../functions/email.php';
require_once __DIR__ . '/../../functions/student.php';
require_once __DIR__ . '/../../functions/attachment.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = Database::getConnection();

$id = $_GET['id'] ?? null;

if ($id) {
    $student = Student::with(['parentalInfos', 'institutionDetails', 'attachments', 'passport'])->find($id);
    
    $attachment = Capsule::table('attachments')->where('student_id', $id)->first();
    $parentalInfos = Capsule::table('parental_infos')->where('student_id', $id)->first();
    $institutionDetails = Capsule::table('institution_details')->where('student_id', $id)->first();

    writeToLog('Student: ' . json_encode($student));
    writeToLog('Parental Infos: ' . json_encode($student->parentalInfos));
    writeToLog('Institution Details: ' . json_encode($student->institutionDetails));
    writeToLog('Attachments: ' . json_encode($student->attachments));
    writeToLog('Passport: ' . json_encode($student->passport));
    
    $father = $student->parentalInfos->where('parent_type', 'Father')->first();
    $mother = $student->parentalInfos->where('parent_type', 'Mother')->first();

    if ($student) {
        echo json_encode([
            'submission_id' => $student->submission_id,
            'first_name' => $student->first_name,
            'date_of_birth' => $student->date_of_birth,
            'tshirt_size' => $student->tshirt_size,
            'gender' => $student->gender,
            'nationality' => $student->nationality,
            'place_of_birth' => $student->place_of_birth,
            'home_address' => $student->home_address,
            'email' => $student->email,
            'telephone' => $student->telephone,
            'outreach' => $student->outreach,
            'iban' => $student->iban,
            
            // Father's Information
            'father_name' => $father->full_name ?? null,
            'father_email' => $father->email ?? null,
            'father_telephone' => $father->telephone ?? null,
    
            // Mother's Information
            'mother_name' => $mother->full_name ?? null,
            'mother_email' => $mother->email ?? null,
            'mother_telephone' => $mother->telephone ?? null,
    
            // Passport Information
            'passport_name' => $student->passport->passport_name ?? '',
            'given_place' => $student->passport->given_place ?? '',
            'passport_number' => $student->passport->passport_number ?? '',
            'expiry_date' => $student->passport->expiry_date ?? '',

            'institutionDetails' => $student->institutionDetails,
            
            'created_at' => $student->created_at,
            
            'attachments' => $student->attachments,
        ]);
    } else {
        echo json_encode(['error' => 'Student not found.']);
    }
} else {
    echo "Invalid request.";
}
