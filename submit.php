<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/Attachment.php';

use App\Models\Student;
use App\Models\Attachment;

// Define the path to the log file
$logFile = __DIR__ . '/debug.log';




// Function to retrieve country name based on nationality value
function getCountryName($nationalityValue)
{
    global $capsule; // Assuming $capsule contains the Eloquent Capsule

    // Use Eloquent to query the database
    $country = $capsule->getConnection()->table('Countries')->where('value', $nationalityValue)->first();

    if ($country) {
        return $country->name;
    } else {
        return null; 
    }
}

function createNewStudent($studentData)
{
    try {
        writeToLog("Creating new student...\n");
        $newStudent = Student::create($studentData);
        writeToLog("New student created successfully.\n");
        return $newStudent;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function createNewAttachment($imageData)
{
    try {
        writeToLog("Creating new attachment...\n");
        $newAttachment = Attachment::create($imageData);
        writeToLog("New attachment created successfully.\n");
        return $newAttachment;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    writeToLog("Processing form submission...\n");

    // Establish database connection
    require_once __DIR__ . '/config/database.php';

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
        'passportCopy' => $_FILES['passport_copy']['name'],
        // 'Recommendation_Letter' => $_FILES['Recommendation_Letter']['name'], 
        // 'Motivation_Letter' => $_FILES['Motivation_Letter']['name'] 
    ];
    
    try {
        $passportName = $_POST['passport_name'];

        writeToLog("Creating upload directory...\n");

        // Create directory if it doesn't exist
        $uploadDir = 'uploads/' . $passportName . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Creates the directory recursively
            writeToLog("Upload directory created: $uploadDir\n");
        }

        writeToLog("Creating new student and attachment...\n");

        $newStudent = createNewStudent($studentData);
        $newAttachment = createNewAttachment($imageData);

        // Handle file uploads
        move_uploaded_file($_FILES['student_certificate']['tmp_name'], $uploadDir . $_FILES['student_certificate']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $_FILES['photo']['name']);
        move_uploaded_file($_FILES['passport_copy']['tmp_name'], $uploadDir . $_FILES['passport_copy']['name']);
        // move_uploaded_file($_FILES['Recommendation_Letter']['tmp_name'], $uploadDir . $_FILES['Recommendation_Letter']['name']);
        // move_uploaded_file($_FILES['Motivation_Letter']['tmp_name'], $uploadDir . $_FILES['Motivation_Letter']['name']);

        writeToLog("Data insertion successful.\n");
        

        // Redirect to success page
        header('Location: /SuccessfulRegisteration');
        exit;
    } catch (Exception $e) {
        // Log the error and display a generic error message
        writeToLog("ERROR: " . $e->getMessage() . "\n");
        echo 'Form submission failed. Please try again later.';
    }
} else {
    // Redirect back to the form page if the request method is not POST
    header('Location: /');
    exit;
}

function writeToLog($message)
{
    global $logFile;
    file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ' . $message, FILE_APPEND);
}
?>
