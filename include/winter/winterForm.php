<form id="myForm" action="/submitApplication" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="program_id" value="1">
    <!-- Student Information Section -->
    <?php include "include/blocks/student_information.php" ?>

    <!-- Contact Information Section -->
    <?php include "include/blocks/contact_information.php" ?>

    <!-- Emergency Contact Information Section -->
    <?php include "include/blocks/Emergency_contact.php" ?>

    <!-- Passport Information Section -->
    <?php include "include/blocks/passport_information.php" ?>
    
    <!-- University Information Section -->
    <?php include "include/blocks/university_information.php" ?>

    <!-- Payment Method Section -->
    <?php include "include/blocks/payment_method.php" ?>

    <!-- Outreach Information Section -->
    <?php include "include/blocks/outreach.php" ?>

    <!-- Terms and Conditions Section -->
    <?php include "include/blocks/terms_conditions.php" ?>
