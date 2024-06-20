<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /"); 
    exit;
}
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$students = Capsule::table('students')->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="aydin University" href="images/IAU.png">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="src/css/admin.css">
</head>

<body>
    <div>
        <h1>Admin Panel - Student Data</h1>
        <div class="btn-group mb-3">
            <a href="export.php?format=csv" class="btn btn-primary">Export as CSV</a>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Submission ID</th>
                        <th>First Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>T-Shirt Size</th>
                        <th>Nationality</th>
                        <th>Place of Birth</th>
                        <th>Home Address</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Father's Full Name</th>
                        <th>Father's Email</th>
                        <th>Father's Telephone</th>
                        <th>Mother's Full Name</th>
                        <th>Mother's Email</th>
                        <th>Mother's Telephone</th>
                        <th>Passport Name</th>
                        <th>Given Place</th>
                        <th>Passport Number</th>
                        <th>Expiry Date</th>
                        <th>Course</th>
                        <th>Institution Name</th>
                        <th>Department</th>
                        <th>Institution Address</th>
                        <th>Institution Email</th>
                        <th>Institution Telephone</th>
                        <th>IBAN</th>
                        <th>Student Certificate</th>
                        <th>Photo</th>
                        <th>Passport Copy</th>
                        <th>Recommendation Letter</th>
                        <th>Motivation Letter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $index => $student): ?>
                        <?php
                        // Retrieve attachment data for the current student
                        $attachment = Capsule::table('attachments')->where('submissionId', $student->submissionId)->first();
                        ?>
                        <tr class="<?php echo ($index % 2 == 0) ? 'even' : ''; ?>">
                            <td><?php echo $student->id; ?></td>
                            <td><?php echo $student->submissionId; ?></td>
                            <td><?php echo $student->firstName; ?></td>
                            <td><?php echo $student->dateOfBirth; ?></td>
                            <td><?php echo $student->gender; ?></td>
                            <td><?php echo $student->tshirtSize; ?></td>
                            <td><?php echo $student->nationality; ?></td>
                            <td><?php echo $student->placeOfBirth; ?></td>
                            <td><?php echo $student->homeAddress; ?></td>
                            <td><?php echo $student->email; ?></td>
                            <td><?php echo $student->telephone; ?></td>
                            <td><?php echo $student->fathersFullName; ?></td>
                            <td><?php echo $student->fathersEmail; ?></td>
                            <td><?php echo $student->fathersTelephone; ?></td>
                            <td><?php echo $student->mothersFullName; ?></td>
                            <td><?php echo $student->mothersEmail; ?></td>
                            <td><?php echo $student->mothersTelephone; ?></td>
                            <td><?php echo $student->passportName; ?></td>
                            <td><?php echo $student->givenPlace; ?></td>
                            <td><?php echo $student->passportNumber; ?></td>
                            <td><?php echo $student->expiryDate; ?></td>
                            <td><?php echo $student->course; ?></td>
                            <td><?php echo $student->institutionName; ?></td>
                            <td><?php echo $student->department; ?></td>
                            <td><?php echo $student->institutionAddress; ?></td>
                            <td><?php echo $student->institutionEmail; ?></td>
                            <td><?php echo $student->institutionTelephone; ?></td>
                            <td><?php echo $student->iban; ?></td>
                            <td><a href="/uploads/<?php echo $student->passportName."/". $attachment->studentCertificate; ?>"><?php echo isset($attachment->studentCertificate) ? $attachment->studentCertificate : ''; ?></a></td>
                            <td><a href="/uploads/<?php echo $student->passportName."/". $attachment->photo; ?>"><?php echo isset($attachment->photo) ? $attachment->photo : ''; ?></a></td>
                            <td><a href="/uploads/<?php echo $student->passportName."/". $attachment->passportCopy; ?>"><?php echo isset($attachment->passportCopy) ? $attachment->passportCopy : ''; ?></a></td>
                            <td><a href="/uploads/<?php echo $student->passportName."/". $attachment->RecommendationLetter; ?>"><?php echo isset($attachment->RecommendationLetter) ? $attachment->RecommendationLetter : ''; ?></td>
                            <td><a href="/uploads/<?php echo $student->passportName."/". $attachment->MotivationLetter; ?>"><?php echo isset($attachment->MotivationLetter) ? $attachment->MotivationLetter : ''; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    var timeout;

    function resetTimer() {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            <?php $_SESSION['logged_in'] = false; ?>;
            window.location.href = '/secretAdmin';
        }, 300000);
    }

    document.addEventListener('mousemove', resetTimer);
    document.addEventListener('mousedown', resetTimer);
    document.addEventListener('keypress', resetTimer);
</script>
</body>

</html>