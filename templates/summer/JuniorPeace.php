<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="aydin University" href="images/IAU.png">
    <title>UNESCO APPLICATION FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="src/css/dataEntry.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include "include/summer/JuniorPeace.php" ?>
            <!-- Text Section -->
            <div class="text-section">
                <h1></h1>
            </div>
            <!-- Information Container -->
            <div class="information-container">
                <!-- Headline -->
                <div class="container-headline1">
                    <img src="images/questionMark.jpg" alt="Texture Image" class="texture-image1">
                    <h2 class="headline1">IMPORTANT INFORMATION</h2>
                </div>


                <!-- Left Section -->
                <div class="left-section">
                    <!-- Program Dates Section -->
                    <div class="section" style="min-height: 48%;">
                        <h3>PROGRAM DATES</h3>
                        <div class="programDatesContent">
                            <p>Arrival of International Participants: <strong>4th August</strong>.<span>&#9992;</span>
                            </p>
                            <p>Orientation Day: <strong>5th August</strong> </p>
                            <p>Program Courses and activities: <strong>6th August till 15th August</strong></p>
                            <p>Closing Ceremony: <strong>16th August</strong></p>
                            <p>Departure of International Participants: <strong>17th August</strong></p>
                        </div>
                    </div>
                    <!-- Payment Method Section -->
                    <div class="section">
                        <h3>PAYMENT DETAILS</h3>
                        <div class="programDatesContent">
                            <p>After your application has been reviewed, you will receive the payment details along with
                                your acceptance letter.</p>
                        </div>
                    </div>
                    <!-- Schedule Section -->
                    <div class="section">
                        <h3>SCHEDULE</h3>
                        <div class="programDatesContent">
                            <strong>
                                <p>You can check Schedule <a href="#" id="openSchedule" class="terms-link">HERE</a> !
                                </p>
                            </strong>
                        </div>
                    </div>

                </div>

                <!-- Right Section -->
                <div class="right-section">
                    <!-- Registration Deadline Section -->
                    <div class="section" style="min-height: 22.5%;">
                        <h3>REGISTRATION DEADLINES</h3>
                        <div class="programDatesContent">
                            <p>Registration Deadline: <strong>25th July</strong></p>
                        </div>
                    </div>
                    <!-- Courses Section -->
                    <div class="section" style="min-height: 22%;">
                        <h3>COURSES</h3>
                        <div class="programDatesContent">
                            <p>International Relations and Intercultural Competence</p>
                        </div>
                    </div>
                    <!-- Fees Section -->
                    <div class="section" style="min-height: 47%;">
                        <h3>FEES</h3>
                        <div class="programDatesContent">
                            <p>The fee will be communicated to you via <strong>email</strong> after your application has
                                been
                                reviewed.</p>
                            <p>This process ensures that you receive all necessary information regarding the cost of the
                                program.
                            </p>

                        </div>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>&nbsp;
                            After payment, share receipt for confirmation.
                        </div>
                    </div>


                </div>
                <div class="bottom-section1">

                </div>
            </div>
            <?php include "include/summer/form.php" ?>

</body>

</html>