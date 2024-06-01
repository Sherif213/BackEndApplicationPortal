<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/Attachment.php';

use App\Models\Student;
use App\Models\Attachment;

function createNewStudent($studentData)
{
    try {
        $newStudent = Student::create($studentData);
        return $newStudent;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function createNewAttachment($imageData)
{
    try {
        $newAttachment = Attachment::create($imageData);
        return $newAttachment;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentData = [
        'submissionId' => uniqid(),
        'firstName' => $_POST['first_name'],
        'dateOfBirth' => $_POST['date_of_birth'],
        'gender' => $_POST['gender'],
        'tshirtSize' => $_POST['tshirt_size'],
        'nationality' => $_POST['Nationality'],
        'placeOfBirth' => $_POST['place_of_birth'],
        'homeAddress' => $_POST['home_address'],
        'email' => $_POST['email'],
        'telephone' => $_POST['telephone'],
        'fathersFullName' => $_POST['fathers_full_name'],
        'fathersEmail' => $_POST['fathers_email'],
        'fathersTelephone' => $_POST['fathers_telephone'],
        'mothersFullName' => $_POST['mothers_full_name'],
        'mothersEmail' => $_POST['mothers_email'],
        'mothersTelephone' => $_POST['mothers_telephone'],
        'passportName' => $_POST['passport_name'],
        'givenPlace' => $_POST['given_place'],
        'passportNumber' => $_POST['passport_number'],
        'expiryDate' => $_POST['expiry_date'],
        'course' => $_POST['course'],
        'institutionName' => $_POST['institution_name'],
        'department' => $_POST['department'],
        'institutionAddress' => $_POST['institution_address'],
        'institutionEmail' => $_POST['institution_email'],
        'institutionTelephone' => $_POST['institution_telephone'],
        'iban' => $_POST['iban']
    ];

    $imageData = [
        'submissionId' => $studentData['submissionId'],
        'firstName' => $_POST['first_name'],
        'studentCertificate' => $_FILES['student_certificate']['name'],
        'photo' => $_FILES['photo']['name'],
        'passportName' => $_POST['passport_name'],
        'passportCopy' => $_FILES['passport_copy']['name']
    ];

    try {
        $passportName = $_POST['passport_name'];

        // Create directory if it doesn't exist
        $uploadDir = 'uploads/' . $passportName . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Creates the directory recursively
        }

        $newStudent = createNewStudent($studentData);
        $newAttachment = createNewAttachment($imageData);

        // Handle file uploads
        move_uploaded_file($_FILES['student_certificate']['tmp_name'], $uploadDir . $_FILES['student_certificate']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $_FILES['photo']['name']);
        move_uploaded_file($_FILES['passport_copy']['tmp_name'], $uploadDir . $_FILES['passport_copy']['name']);

        // Redirect to success page
        header('Location: signUpSuccessful.php');
        exit;
    } catch (Exception $e) {
        // Log the error and display a generic error message
        file_put_contents(__DIR__ . '/error.log', date('Y-m-d H:i:s') . ' - ERROR: ' . $e->getMessage() . PHP_EOL, FILE_APPEND);
        echo 'Form submission failed. Please try again later.';
    }
} else {
    // Redirect back to the form page if the request method is not POST
    header('Location: index.php');
    exit;
}
?>