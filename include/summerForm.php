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
                <p>Arrival of International Participants: <strong>4th Aug</strong>.<span>&#9992;</span></p>
                <p>Orientation Day: <strong>5th Aug</strong> </p>
                <p>Program Courses and activities: <strong>6th Aug till 15th Aug</strong></p>
                <p>Graduation: <strong>16th Aug</strong></p>
                <p>Departure of International Participants: <strong>17th Aug</strong></p>
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
                <p>Global Diplomacy and Foreign Policy</p>
            </div>
        </div>
        <!-- Fees Section -->
        <div class="section" style="min-height: 47%;">
            <h3>FEES</h3>
            <div class="programDatesContent">
                <p>The fee will be communicated to you via <strong>email</strong> after your application has been
                    reviewed.</p>
                <p>This process ensures that you receive all necessary information regarding the cost of the program.
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
<form id="myForm" action="/submit.php" method="POST" enctype="multipart/form-data">
    <!-- Information Container 2 -->
    <div class="information-container2">
        <!-- Headline -->
        <div class="container-headline1">
            <img src="images/StudentInformation.jpg" alt="Texture Image" class="texture-image1">
            <h2 class="headline1">STUDENT INFORMATION</h2>
        </div>

        <!-- Left Section -->

        <div class="bottom-section3">
            <div class="left-section3">
                <label for="first_name">Full Name</label>
                <input type="text" aria-label="First Name" class="form-control" id="first_name" name="first_name"
                    required>
            </div>
            <div class="right-section3">
                <label for="nationality">Nationality</label>
                <select name="Nationality" class="form-control" required>
                    <?php include "include/countries.php" ?>
                </select>
            </div>
        </div>
        <div class="bottom-section3">
            <div class="left-section3">
                <label for="date_of_birth">Date of Birth</label>
                <input class="form-control" type="date" id="date_of_birth" name="date_of_birth" required>
            </div>
            <!-- Place of Birth -->
            <div class="right-section3">
                <label for="place_of_birth">Place of Birth</label>
                <input type="text" aria-label="Place of birth" class="form-control" id="place_of_birth"
                    name="place_of_birth" required>
            </div>

        </div>
        <div class="bottom-section3">
            <!-- T-Shirt Size -->
            <div class="left-section3">
                <label for="tshirt_size">T-Shirt Size</label>
                <select class="form-control" id="tshirt_size" name="tshirt_size" required>
                    <option value="option">--Select Size--</option>
                    <option value="small">S</option>
                    <option value="medium">M</option>
                    <option value="large">L</option>
                    <option value="Xlarge">XL</option>
                </select>
            </div>
            <div class="right-section3">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

        </div>
        <div class="bottom-section3">
            <div class="left-section3">
                <label for="student_certificate">Student Certificate</label>
                <input type="file" class="form-control" id="student_certificate" name="student_certificate" required>
            </div>


            <!-- Photo Upload -->
            <div class="right-section3">
                <label for="photo">Your Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
        </div>


















    </div>
    <!-- <div class="information-container3">
        
        <div class="container-headline1">
            <img src="images/Letter.jpg" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">DOCUMENTS</h2>
        </div>
        
        <div class="bottom-section2">
            <div class="left-section2">
                <label for="Recommendation_Letter"><strong>Recommendation Letter</strong></label>
                <div class="input-group mb-3">
                <label for="Recommendation_Letter"></label>
                    <input type="file" class="form-control"  id="Recommendation_Letter"
                        name="Recommendation_Letter" required>
                </div>
            </div>
            <div class="right-section2">
                <label for="Motivation_Letter"><strong>Motivation Letter</strong></label>
                <div class="input-group mb-3">
                    <label for="Motivation_Letter"></label>
                    <input type="file" class="form-control" id="Motivation_Letter" name="Motivation_Letter" required>
                </div>
            </div>
        </div>
    </div> -->
    <div class="information-container3">
        <!-- Headline -->
        <div class="container-headline1">
            <img src="images/ContactCropped.png" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">CONTACT INFORMATION</h2>
        </div>

        <!-- Home Address Row -->
        <div class="top-section3">
            <label for="home_address">Home Address</label>
            <textarea id="home_address" name="home_address" class="form-control full-width-input" required></textarea>
        </div>

        <!-- Email and Telephone Row -->
        <div class="bottom-section3">
            <div class="left-section3">
                <label for="email1">Email</label>
                <input type="email" id="email1" name="email" class="form-control" required>
            </div>
            <div class="right-section3">
                <label for="telephone1">Telephone</label>
                <input type="tel" id="telephone1" name="telephone" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="information-container4">
        <div class="container-headline1">
            <img src="images/Emergency1.jpg" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">EMERGENCY CONTACT INFORMATION</h2>
        </div>
        <div class="top-section4">
            <label for="fathers_full_name">1.Emergency Contact</label>
            <input type="text" id="fathers_full_name" name="fathers_full_name" class="form-control full-width-input"
                required>
        </div>
        <!-- Email and Telephone Row -->
        <div class="bottom-section4">
            <div class="left-section4">
                <label for="email2">Email</label>
                <input type="email" id="email2" name="fathers_email" class="form-control" required>
            </div>
            <div class="right-section4">
                <label for="telephone2">Telephone</label>
                <input type="tel" id="telephone2" name="fathers_telephone" class="form-control" required>
            </div>
        </div>
        <div class="separator"></div>
        <div class="top-section4">
            <label for="mothers_full_name">2.Emergency Contact</label>
            <input type="text" id="mothers_full_name" name="mothers_full_name" class="form-control full-width-input"
                required>
        </div>
        <!-- Email and Telephone Row -->
        <div class="bottom-section4">
            <div class="left-section4">
                <label for="email3">Email</label>
                <input type="email" id="email3" name="mothers_email" class="form-control" required>
            </div>
            <div class="right-section4">
                <label for="telephone3">Telephone</label>
                <input type="tel" id="telephone3" name="mothers_telephone" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="information-container5">
        <div class="container-headline1">
            <img src="images/Passport.jpg" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">PASSPORT INFORMATION</h2>
        </div>
        <!-- Top Section -->
        <div class="bottom-section3">
            <!-- Left Section -->
            <div class="left-section3">
                <label for="passport_name">Name on Passport</label>
                <input type="text" class="form-control" id="passport_name" name="passport_name" required>
            </div>
            <!-- Right Section -->
            <div class="right-section3">
                <label for="given_place">Given Place</label>
                <input type="text" class="form-control" id="given_place" name="given_place" required>
            </div>
        </div>

        <!-- Second Section -->
        <div class="bottom-section3">
            <!-- Left Section -->
            <div class="left-section3">
                <label for="passport_name_2">Passport Number</label>
                <input type="text" class="form-control" id="passport_name_2" name="passport_number" required>
            </div>
            <!-- Right Section -->
            <div class="right-section3">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" class="form-control" id="expiry_date" name="expiry_date" required>
            </div>
        </div>

        <!-- Third Section -->
        <div class="bottom-section3">
            <div class="left-section3">
                <label for="passport_copy" class="input-group-text">Passport Copy</label>
                <input type="file" class="form-control" id="passport_copy" name="passport_copy" required>
            </div>
        </div>
    </div>
    <div class="information-container6">
        <div class="container-headline1">
            <img src="images/Course.jpg" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">COURSE SELECTION</h2>
        </div>
        <div class="course-selection">
            <label for="course">Course</label>
            <select id="course" name="course" required>
                <option value="">-- Select Course --</option>
                <option value="Global Diplomacy and Foreign Policy">Global Diplomacy and Foreign Policy.</option>
            </select>
        </div>


    </div>
    <div class="information-container7">
        <div class="container-headline1">
            <img src="images/Course.jpg" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">UNIVERSITY INFORMATION</h2>
        </div>
        <div class="bottom-section3">
            <div class="left-section3">
                <label for="institution-name">Institution Name</label>
                <input type="text" class="form-control" id="institution-name" name="institution_name" required>
            </div>
            <div class="right-section3">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
        </div>
        <div class="top-section3">
            <label for="institution-address">Institution Address</label>
            <textarea id="institution-address" name="institution_address" class="form-control full-width-input"
                required></textarea>
        </div>
        <div class="bottom-section3">
            <div class="left-section3">
                <label for="email4">Institution Email</label>
                <input type="email" id="email4" name="institution_email" required>
            </div>
            <div class="right-section3">
                <label for="telephone4">Institution Telephone</label>
                <input type="tel" class="form-control" id="telephone4" name="institution_telephone" required>
            </div>
        </div>
    </div>
    <div class="information-container8">
        <div class="container-headline1">
            <img src="images/dollar.jpg" alt="Texture Image" class="texture-image2">
            <h2 class="headline1">PREFERRED PAYMENT METHOD</h2>
        </div>
        <div class="course-selection">
            <label for="course2">Payment Method</label>
            <select id="course2" name="iban" required>
                <option value="">-- Select Payment Method --</option>
                <option value="ibanTR">Turkish Lira IBAN</option>
                <option value="ibanUS">US Dollar IBAN</option>
                <option value="ibanEURO">EURO IBAN</option>
            </select>
        </div>
    </div>

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
            <h2>UNESCO JUNIOR DIPLOMACY PROGRAM TERMS AND CONDITIONS</h2>
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

<?php include "include/footer.php" ?>
<div class="info-container">
</div>
</div>
</div>
<script src="src/js/schedule.js"></script>
<script src="src/js/termsConditions.js"></script>
<script src="src/js/agree_terms.js"></script>