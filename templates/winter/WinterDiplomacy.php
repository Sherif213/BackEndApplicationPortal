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
</head>

<body>
    <div class="wrapper">
        <div class="container">
        <?php include "include/winter/winterDiplomacy.php" ?>
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
                            <p>Arrival of International Participants: <strong>31st January</strong>.<span>&#9992;</span>
                            </p>
                            <p>Orientation Day: <strong>1st February</strong> </p>
                            <p>Program Courses and activities: <strong>1st February till 7th February</strong></p>
                            <p>Closing Ceremony: <strong>7th February</strong></p>
                            <p>Departure of International Participants: <strong>8th February</strong></p>
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
                            <p>Registration Deadline: <strong>15 Jan</strong></p>
                        </div>
                    </div>
                    <!-- Courses Section -->
                    <div class="section" style="min-height: 22%;">
                        <h3>PROGRAM</h3>
                        <div class="programDatesContent">
                            <p>IAU UNESCO WINTER JUNIOR PEACE AND DIPLOMACY</p>
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
    <?php include "include/winter/winterForm.php" ?>
            
    
    <?php include "include/blocks/university_information.php" ?>

    <?php include "include/blocks/payment_method.php" ?>

    <?php include "include/blocks/outreach.php" ?>



    <div class="information-container9">
        <div class="top-section6">
            <div class="left-section6">
                <label class="checkbox-container">
                    <input type="checkbox" id="agreeCheckbox" required class="checkbox-input" required>
                    <span class="checkmark"></span>
                    <span class="checkbox-text">I agree to the <a href="#" id="openModal" class="terms-link">Terms
                            and Conditions</a></span>
                </label>
            </div>
            <div class="alert alert-warning" role="alert">
                <i class="fa-solid fa-circle-info"></i>&nbsp;
                Read terms and conditions before proceeding!
            </div>
        </div>

    </div>
    <div class="information-container8">
        <div class="g-recaptcha" data-sitekey="6LdqOvspAAAAAN2h0gs6rDQ9sg6yVwOSoXTJCf1l"></div>
    </div>
    <div class="information-container8">
        <div class="button-section">
            <button type="submit" class="btn btn-success">Submit Application</button>
            <button type="reset" class="btn btn-danger">Reset Field</button>
        </div>
    </div>
    <div id="modal">
        <div class="modal-content">
            <h2>UNESCO WINTER DIPLOMACY PROGRAM TERMS AND CONDITIONS</h2>
            <div class="terms-section">
                <strong>1. Eligibility:</strong>
                <p>- The program is open to all university students ages 18 and above, including international students.</p>
                <p>- Participants must have a minimum proficiency level of B1 in English</p>
                <p>- Participants must submit a valid ID or passport.</p>
                <p>- Students under 18 years of age require the consent of a legal guardian to participate.</p>
            </div>
            <div class="terms-section">
                <strong>2. Accommodation:</strong>
                <p>- Accommodation will be provided only for students arriving from outside of Istanbul.</p>
                <p>- Participants must adhere to the accommodation rules and regulations set forth by the organizers.
                </p>
            </div>
            <div class="terms-section">
                <strong>3. Program Activities:</strong>
                <p>- The program will include trips and educational activities organized by the UNESCO Chair at Istanbul Aydin University.</p>
                <p>- Program activity details such as time and location maybe subject to change.</p>
            </div>
            <div class="terms-section">
                <strong>4. Code of Conduct:</strong>
                <p>- Participants must conduct themselves in a respectful and professional manner at all times.</p>
                <p>- Any misdemeanor may result in immediate termination from the program without refund.</p>
            </div>
            <div class="terms-section">
                <strong>5. Health and Safety:</strong>
                <p>- Participants are responsible for their own health insurance coverage for the duration of the program.</p>
                <p>- Emergency contact information must be provided upon registration.</p>
                <p>- Any medical conditions or special requirements must be disclosed to the organizers in advance.</p>
            </div>
            <div class="terms-section">
                <strong>6. Payment:</strong>
                <p>- Payment for the program is non-refundable, other than in exceptional circumstances at the discretion of the organizing committee.</p>
            </div>
            <div class="terms-section">
                <strong>7. Liability:</strong>
                <p>- Istanbul Aydin University and the UNESCO Chair are not liable for any loss, damage, or injury sustained during the program, including during scheduled trips.</p>
                <p>- Participants are responsible for their personal belongings and valuables.</p>
            </div>
            <div class="terms-section">
                <strong>8. Changes and Cancellations:</strong>
                <p>- The organizers reserve the right to make changes to the program itinerary or schedule if necessary.</p>
                <p>- In the event of program cancellation by the organizers, participants will be notified as soon as possible, and any fees paid will be refunded.</p>
            </div>
            <div class="terms-section">
                <strong>9. Agreement:</strong>
                <p>- By submitting an application, participants agree to abide by these terms and conditions.</p>
            </div>
            <p>By participating in the UNESCO Junior Peace Program, participants acknowledge that they have read, understood, and agree to comply with these terms and conditions.</p>
        </div>
    </div>
    <div id="scheduleDetails">
        <div class="schedule-content">
            <h2>Program Schedule</h2>
            <div class="schedule-item">
                <strong>Day 1: Introduction</strong>
                <p><span class="time">09:00 - 13:00:</span> Overview of International Organizations: UN, UNESCO, EURAS, Missions, Vision and History</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Campus Tour and Networking Session with UNESCO & EURAS Representatives</p>
            </div>
            <div class="schedule-item">
                <strong>Day 2: International Relations: Concepts</strong>
                <p><span class="time">09:00 - 13:00:</span> Concepts of International Relations</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Istanbul Aquarium Tour</p>
            </div>
            <div class="schedule-item">
                <strong>Day 3: International Relations: Theories</strong>
                <p><span class="time">09:00 - 13:00:</span> Theories of International Relations</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Koç Museum Tour and Pierre Loti</p>
            </div>
            <div class="schedule-item">
                <strong>Day 4: Foreign Policy Analysis: Concepts, Theories</strong>
                <p><span class="time">09:00 - 13:00:</span> Concepts and Theories of Foreign Policy Analysis</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Çamlıca Mosque and Tower Tour</p>
            </div>
            <div class="schedule-item">
                <strong>Day 5: Foreign Policy Analysis: Actors and Structures</strong>
                <p><span class="time">09:00 - 13:00:</span> Actors and Structures in Foreign Policy Analysis</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Dolmabahçe Palace and Ortaköy Tour</p>
            </div>
            <div class="schedule-item">
                <strong>Weekend 1: Historical Peninsula Tour</strong>
                <p>Optional tour: Explore the historical sites of the peninsula. ($50)</p>
            </div>
            <div class="schedule-item">
                <strong>Weekend 2: Bosphorus Boat Tour</strong>
                <p>Optional tour: Cruise along the Bosphorus and enjoy scenic views. ($70)</p>
            </div>
            <div class="schedule-item">
                <strong>Day 6: Diplomatic History and Traditions</strong>
                <p><span class="time">09:00 - 13:00:</span> Diplomatic History and Traditions</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Taksim and Galata Tower Tour</p>
            </div>
            <div class="schedule-item">
                <strong>Day 7: Power, Hard/Soft Power</strong>
                <p><span class="time">09:00 - 13:00:</span> Understanding Power Dynamics, Hard and Soft Power</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Spice Bazaar and Galata Bridge Area Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 15th (Monday) - Day 6: Exploring Values</strong>
                <p><span class="time">09:00 - 12:30:</span> Human Dignity, Freedom</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> VIALAND Themepark Tour</p>
            </div>
            <div class="schedule-item">
                <strong>Day 8: Public Diplomacy</strong>
                <p><span class="time">09:00 - 13:00:</span> Public Diplomacy Strategies</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Cultural Day</p>
            </div>
            <div class="schedule-item">
                <strong>Day 9: Student Presentations on Diplomacy</strong>
                <p><span class="time">09:00 - 13:00:</span> Student Presentations on Diplomatic Topics</p>
                <p><span class="time">13:00 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Mall of Istanbul Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 18th (Thursday) - Day 9: Student Presentations</strong>
                <p><span class="time">09:00 - 12:30:</span> Presentations on Education and Peace</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Sports Activity</p>
            </div>
            <div class="schedule-item">
                <strong>Day 10: Graduation Ceremony</strong>
                <p><span class="time">09:00 - 12:00:</span> Review and Reflection on the Program</p>
                <p><span class="time">12:00 - 13:00:</span> Graduation Ceremony</p>
                
            </div>
            <div class="clear"><br><br></div>
        </div>
    </div>
</form>
<?php include "include/others/footer.php" ?>
<div class="info-container">
</div>
</div>
</div>
<script src="src/js/schedule.js"></script>
<script src="src/js/termsConditions.js"></script>
<script src="src/js/agree_terms.js"></script>

</body>

</html>