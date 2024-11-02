<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Attachment.php';

require_once __DIR__ . '/../functions/log.php';
require_once __DIR__ . '/../functions/email.php';
require_once __DIR__ . '/../functions/student.php';
require_once __DIR__ . '/../functions/attachment.php';

writeToLog("Request URI: " . $_SERVER['REQUEST_URI']);
writeToLog("Request method: " . $_SERVER['REQUEST_METHOD']);
writeToLog("POST data: " . json_encode($_POST));
writeToLog("FILES data: " . json_encode($_FILES));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    writeToLog("Processing form submission...");

    $nationalityValue = $_POST['Nationality'];
    $countryName = getCountryName($nationalityValue);

    $studentData = [
        'submissionId' => uniqid(),
        'firstName' => $_POST['first_name'],
        'dateOfBirth' => $_POST['date_of_birth'],
        'gender' => $_POST['gender'],
        'tshirtSize' => $_POST['tshirt_size'],
        'nationality' => $countryName,
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
        'course' => isset($_POST['course']) ? $_POST['course'] : "NOT SPECIFIED",
        'institutionName' => $_POST['institution_name'],
        'department' => $_POST['department'],
        'institutionAddress' => $_POST['institution_address'],
        'institutionEmail' => $_POST['institution_email'],
        'institutionTelephone' => $_POST['institution_telephone'],
        'iban' => $_POST['iban'],
        'outreach'=>$_POST['outreach']
    ];

    $imageData = [
        'submissionId' => $studentData['submissionId'],
        'firstName' => $_POST['first_name'],
        'studentCertificate' => $_FILES['student_certificate']['name'],
        'photo' => $_FILES['photo']['name'],
        'passportName' => $_POST['passport_name'],
        'passportCopy' => $_FILES['passport_copy']['name'],
        'Recommendation_Letter' => $_FILES['Recommendation_Letter']['name'], 
        'Motivation_Letter' => $_FILES['Motivation_Letter']['name'],
        'consentForm' => $_FILES['consentForm']['name'],
    ];

    try {
        $uploadDir = 'uploads/' . $studentData['passportName'] . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
            writeToLog("Upload directory created: $uploadDir");
        }

        $newStudent = createNewStudent($studentData);
        $newAttachment = createNewAttachment($imageData);

        move_uploaded_file($_FILES['student_certificate']['tmp_name'], $uploadDir . $_FILES['student_certificate']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $_FILES['photo']['name']);
        move_uploaded_file($_FILES['passport_copy']['tmp_name'], $uploadDir . $_FILES['passport_copy']['name']);
        move_uploaded_file($_FILES['Recommendation_Letter']['tmp_name'], $uploadDir . $_FILES['Recommendation_Letter']['name']);
        move_uploaded_file($_FILES['Motivation_Letter']['tmp_name'], $uploadDir . $_FILES['Motivation_Letter']['name']);
        move_uploaded_file($_FILES['consentForm']['tmp_name'], $uploadDir . $_FILES['consentForm']['name']);

        writeToLog("Files uploaded and data insertion successful.");
        
        sendNotificationEmail($studentData, $imageData);

        header('Location: /SuccessfulRegisteration');
        exit;
    } catch (Exception $e) {
        writeToLog("ERROR: " . $e->getMessage());
        echo 'Form submission failed. Please try again later.';
    }
} else {
    writeToLog("Request method is not POST: " . $_SERVER['REQUEST_METHOD']);
    
    header('Location: /');
    exit;
}
?>