<?php
session_start();

require_once __DIR__ . '../../../vendor/autoload.php';
require_once __DIR__ . '../../../config/database.php';
require_once __DIR__ . '../../../models/Student.php';
require_once __DIR__ . '../../../models/Parental_info.php';
require_once __DIR__ . '../../../models/institution_details.php';
require_once __DIR__ . '../../../models/Attachment.php';
require_once __DIR__ . '../../../models/legal_information.php';
require_once __DIR__ . '../../../models/student_program.php';
require_once __DIR__ . '../../../models/program.php';
use App\Models\Student;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = Database::getConnection();

$students = Student::with(['parentalInfos', 'institutionDetails', 'attachments', 'passport'])->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="images/IAU.png">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/css/dashboard.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Dashboard</h1>
            <p>6hicSgKjAyco</p>
        </header>
        <nav>
            <button>Submissions</button>
            <button>Setup</button>
            <button>Analytics</button>
            <button>Settings</button>
        </nav>
        <section class="actions">
            <button>Select All</button>
            <div class="filters">
                <button>Filters</button>
                <button>Sort</button>
                <button>Fields</button>
            </div>
            <button class="action-btn">Actions</button>
        </section>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Submission ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php $counter = 1; // Initialize a counter ?>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $counter++; ?></td> 
                    <td><?= $student->submission_id ?></td>
                    <td><?= $student->first_name ?? '---' ?></td>
                    <td><?= $student->email ?></td>
                    <td><?= $student->created_at ?? '---' ?></td>
                    <td>
                        <button class="btn btn-primary expand-btn" data-id="<?= $student->id ?>">Expand</button>
                        <button class="btn btn-warning edit-btn" data-id="<?= $student->id ?>">Edit</button>
                        <button class="btn btn-danger delete-btn" data-id="<?= $student->id ?>">Delete</button>
                    </td>
                </tr>
                <!-- Hidden expandable row -->
                <tr class="expand-row" id="expand-row-<?= $student->id ?>" style="display: none;">
                    <td colspan="6" class="expanded-content">
                        <div class="loading-spinner">Loading...</div>
                        <!-- This is where the fetched table data will appear -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for expanded details -->
    <div class="modal fade" id="expandModal" tabindex="-1" aria-labelledby="expandModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="expandModalLabel">Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content loaded dynamically -->
                    <div id="modal-content">Loading...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-vTFYWZ7sG/KnOwZ7fvoBpn04TwFu+GcQy2t/+98u/Bp8vhZjfBffxP9mwOzWjfFO" crossorigin="anonymous"></script>
    <script>
        document.querySelectorAll('.expand-btn').forEach(button => {
        button.addEventListener('click', async (event) => {
            const button = event.target;
            const studentId = button.dataset.id;
            const expandRow = document.getElementById(`expand-row-${studentId}`);
            const isVisible = expandRow.style.display === 'table-row';

            if (isVisible) {
                // Collapse the row
                expandRow.style.display = 'none';
            } else {
                // Expand the row and show loading spinner
                expandRow.style.display = 'table-row';
                expandRow.querySelector('.expanded-content').innerHTML = '<div class="loading-spinner">Loading...</div>';

                // Fetch student details
                try {
                    const response = await fetch(`getStudentDetails.php?id=${studentId}`);
                    const data = await response.json();
                    
                    

                    // Populate with fetched data
                    expandRow.querySelector('.expanded-content').innerHTML = `
                        <table class="table table-bordered">
                            <tbody>
                        <tr><th>Submission ID</th><td>${data.submission_id}</td></tr>
                        <tr><th>Full Name</th><td>${data.first_name}</td></tr>
                        <tr><th>Date of Birth</th><td>${data.date_of_birth}</td></tr>
                        <tr><th>T-Shirt Size</th><td>${data.tshirt_size}</td></tr>
                        <tr><th>Gender</th><td>${data.gender}</td></tr>
                        <tr><th>Nationality</th><td>${data.nationality}</td></tr>
                        <tr><th>Place of Birth</th><td>${data.place_of_birth}</td></tr>
                        <tr><th>Home Address</th><td>${data.home_address}</td></tr>
                        <tr><th>Email</th><td>${data.email}</td></tr>
                        <tr><th>Telephone</th><td>${data.telephone}</td></tr>
                        <tr><th>Outreach</th><td>${data.outreach}</td></tr>
                        <tr><th>IBAN</th><td>${data.iban}</td></tr>

                        <tr><th>Father's Name</th><td>${data.father_name || 'N/A'}</td></tr>
                        <tr><th>Father's Email</th><td>${data.father_email || 'N/A'}</td></tr>
                        <tr><th>Father's Telephone</th><td>${data.father_telephone || 'N/A'}</td></tr>
                        <tr><th>Mother's Name</th><td>${data.mother_name || 'N/A'}</td></tr>
                        <tr><th>Mother's Email</th><td>${data.mother_email || 'N/A'}</td></tr>
                        <tr><th>Mother's Telephone</th><td>${data.mother_telephone || 'N/A'}</td></tr>


                        <tr><th>Passport Name</th><td>${data.passport_name || 'N/A'}</td></tr>
                        <tr><th>Given Place</th><td>${data.given_place || 'N/A'}</td></tr>
                        <tr><th>Passport Number</th><td>${data.passport_number || 'N/A'}</td></tr>
                        <tr><th>Expiry Date</th><td>${data.expiry_date || 'N/A'}</td></tr>

                        <tr><th>Institution Name</th><td>${data.institutionDetails?.institution_name || 'N/A'}</td></tr>
                        <tr><th>Department</th><td>${data.institutionDetails?.department || 'N/A'}</td></tr>
                        <tr><th>Course</th><td>${data.institutionDetails?.course || 'N/A'}</td></tr>
                        <tr><th>Institution Address</th><td>${data.institutionDetails?.address || 'N/A'}</td></tr>
                        <tr><th>Institution Email</th><td>${data.institutionDetails?.email || 'N/A'}</td></tr>
                        <tr><th>Institution Telephone</th><td>${data.institutionDetails?.telephone || 'N/A'}</td></tr>

                        <tr><th>Attachments</th><td>${data.attachments?.map(a => `<a href="/../../${a.file_path}" target="_blank">${a.attachment_type}</a>`).join(', ') || 'N/A'}</td></tr>
                        <tr><th>Date of Submission</th><td>${data.created_at}</td></tr>
                            </tbody>
                        </table>
                    `;
                } catch (error) {
                    console.error('Error fetching student details:', error);
                    expandRow.querySelector('.expanded-content').innerHTML = '<p>Error loading details.</p>';
                }
            }
        });
    });

    </script>
</body>

</html>
