<?php
session_start();

// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header("Location: /"); 
//     exit;
// }
require_once __DIR__ . '../../../vendor/autoload.php';
require_once __DIR__ . '../../../config/database.php';
require_once __DIR__ . '../../../models/Student.php';
require_once __DIR__ . '../../../models/Parental_info.php';
require_once __DIR__ . '../../../models/institution_details.php';
require_once __DIR__ . '../../../models/Attachment.php';
require_once __DIR__ . '../../../models/legal_information.php';
use App\Models\Student;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = Database::getConnection();

$students = Student::with(['parentalInfos', 'institutionDetails', 'attachments','passport'])->get();

error_log('Fetched students: ' . json_encode($students));

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
                        <th>outreach</th>
                        <th>Student Certificate</th>
                        <th>Photo</th>
                        <th>Passport Copy</th>
                        <th>Consent Form</th>
                        <th>Motivation Letter</th>
                        <th>Recommendation Letter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $index => $student): ?>
                        <?php
                        // Retrieve attachment data for the current student
                        $attachment = Capsule::table('attachments')->where('student_id', $student->id)->first();
                        $parentalInfos = Capsule::table('parental_infos')->where('student_id', $student->id)->first();
                        $institutionDetails = Capsule::table('institution_details')->where('student_id', $student->id)->first();

                        error_log('Student ID: ' . $student->id . ' - Attachments: ' . json_encode($attachment));
                        error_log('Student ID: ' . $student->id . ' - Parental Infos: ' . json_encode($parentalInfos));
                        error_log('Student ID: ' . $student->id . ' - Institution Details: ' . json_encode($institutionDetails));
                        ?>
                        <tr class="<?= ($index % 2 == 0) ? 'even' : ''; ?>">
                            <td><?php echo $student->id; ?></td>
                            <td><?php echo $student->submission_id; ?></td>
                            <td><?php echo $student->first_name; ?></td>
                            <td><?php echo $student->date_of_birth; ?></td>
                            <td><?php echo $student->gender; ?></td>
                            <td><?php echo $student->tshirt_size; ?></td>
                            <td><?php echo $student->nationality; ?></td>
                            <td><?php echo $student->place_of_birth; ?></td>
                            <td><?php echo $student->home_address; ?></td>
                            <td><?php echo $student->email; ?></td>
                            <td><?php echo $student->telephone; ?></td>

                            <!-- Father's Information -->
                            <td><?php echo $student->parentalInfos->where('parent_type', 'Father')->first()->full_name ?? ''; ?></td>
                            <td><?php echo $student->parentalInfos->where('parent_type', 'Father')->first()->email ?? ''; ?></td>
                            <td><?php echo $student->parentalInfos->where('parent_type', 'Father')->first()->telephone ?? ''; ?></td>

                            <!-- Mother's Information -->
                            <td><?php echo $student->parentalInfos->where('parent_type', 'Mother')->first()->full_name ?? ''; ?></td>
                            <td><?php echo $student->parentalInfos->where('parent_type', 'Mother')->first()->email ?? ''; ?></td>
                            <td><?php echo $student->parentalInfos->where('parent_type', 'Mother')->first()->telephone ?? ''; ?></td>
                            
                            <!-- Legal Information -->                           
                            <td><?php echo $student->passport->passport_name ?? ''; ?></td>
                            <td><?php echo $student->passport->given_place ?? ''; ?></td>
                            <td><?php echo $student->passport->passport_number ?? ''; ?></td>
                            <td><?php echo $student->passport->expiry_date ?? ''; ?></td>

                            <!-- course -->
                            <td><?php echo $student->institutionDetails->course ?? ''; ?></td>

                            <!-- Institution Information -->
                            <td><?php echo $student->institutionDetails->institution_name ?? ''; ?></td>
                            <td><?php echo $student->institutionDetails->department ?? ''; ?></td>
                            <td><?php echo $student->institutionDetails->address ?? ''; ?></td>
                            <td><?php echo $student->institutionDetails->email ?? ''; ?></td>
                            <td><?php echo $student->institutionDetails->telephone ?? ''; ?></td>

                            <!-- iban and outreach -->
                            <td><?php echo $student->iban; ?></td>
                            <td><?php echo $student->outreach; ?></td>

                            <!-- Attachment Information -->
                            <td>
                                <a href="<?php echo $student->attachments->where('attachment_type', 'Certificate')->first()->file_path ?? 'Not Provided'; ?>">
                                    <?php $file_path = $student->attachments->where('attachment_type', 'Certificate')->first()->file_path ?? ''; 
                                    echo basename($file_path);?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $student->attachments->where('attachment_type', 'Photo')->first()->file_path ?? 'Not Provided'; ?>">
                                    <?php $file_path = $student->attachments->where('attachment_type', 'Photo')->first()->file_path ?? ''; 
                                    echo basename($file_path);?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $student->attachments->where('attachment_type', 'Passport')->first()->file_path ?? 'Not Provided'; ?>">
                                    <?php $file_path = $student->attachments->where('attachment_type', 'Passport')->first()->file_path ?? ''; 
                                    echo basename($file_path);?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $student->attachments->where('attachment_type', 'ConsentForm')->first()->file_path ?? 'Not Provided'; ?>">
                                    <?php $file_path = $student->attachments->where('attachment_type', 'ConsentForm')->first()->file_path ?? ''; 
                                    echo basename($file_path);?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $student->attachments->where('attachment_type', 'Motivation_Letter')->first()->file_path ?? 'Not Provided'; ?>">
                                    <?php $file_path = $student->attachments->where('attachment_type', 'Motivation_Letter')->first()->file_path ?? '';
                                     echo basename($file_path);?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $student->attachments->where('attachment_type', 'Recommendation_Letter')->first()->file_path ?? 'Not Provided'; ?>">
                                    <?php $file_path = $student->attachments->where('attachment_type', 'Recommendation_Letter')->first()->file_path ?? '';
                                    echo basename($file_path); ?>
                                </a>
                            </td>
                            
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <script>
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
</script> -->
</body>

</html>