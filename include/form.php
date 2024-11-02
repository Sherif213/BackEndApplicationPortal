<form id="myForm" action="/submitApplication" method="POST" enctype="multipart/form-data">
    

    <?php include "include/blocks/student_information.php" ?>

    <?php include "include/blocks/contact_information.php" ?>


    <?php include "include/blocks/Emergency_contact.php" ?>

    <?php include "include/blocks/passport_information.php" ?>

    <?php include "include/blocks/course_selection.php" ?>
    
    <?php include "include/blocks/school_information.php" ?>

    <?php include "include/blocks/payment_method.php" ?>

    <?php include "include/blocks/outreach.php" ?>
    
    <?php include "include/blocks/consentForm.php" ?>

    
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
            <h2>UNESCO JUNIOR PEACE PROGRAM TERMS AND CONDITIONS</h2>
            <div class="terms-section">
                <strong>1. Eligibility:</strong>
                <p>- The program is open to all participants ages 14 and above, including international students.</p>
                <p>- Participants must have a minimum proficiency level of B1 in English.</p>
                <p>- Participants must submit a personal statement, a letter of recommendation, and a valid ID or
                    passport.</p>
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
                <p>- The program will include trips and educational activities organized by the UNESCO Chair at Istanbul
                    Aydin University.</p>
                <p>- Program activity details such as time and location maybe subject to change.</p>
            </div>
            <div class="terms-section">
                <strong>4. Code of Conduct:</strong>
                <p>- Participants must conduct themselves in a respectful and professional manner at all times.</p>
                <p>- Any misdemeanor may result in immediate termination from the program without refund.</p>
            </div>
            <div class="terms-section">
                <strong>5. Health and Safety:</strong>
                <p>- Participants are responsible for their own health insurance coverage for the duration of the
                    program.</p>
                <p>- Emergency contact information must be provided upon registration.</p>
                <p>- Any medical conditions or special requirements must be disclosed to the organizers in advance.</p>
            </div>
            <div class="terms-section">
                <strong>6. Payment:</strong>
                <p>- Payment for the program is non-refundable, other than in exceptional circumstances at the
                    discretion of
                    the organizing committee.</p>
            </div>
            <div class="terms-section">
                <strong>7. Liability:</strong>
                <p>- Istanbul Aydin University and the UNESCO Chair are not liable for any loss, damage, or injury
                    sustained during the program, including during scheduled trips.</p>
                <p>- Participants are responsible for their personal belongings and valuables.</p>
            </div>
            <div class="terms-section">
                <strong>8. Changes and Cancellations:</strong>
                <p>- The organizers reserve the right to make changes to the program itinerary or schedule if necessary.
                </p>
                <p>- In the event of program cancellation by the organizers, participants will be notified as soon as
                    possible, and any fees paid will be refunded.</p>
            </div>
            <div class="terms-section">
                <strong>9. Agreement:</strong>
                <p>- By submitting an application, participants agree to abide by these terms and conditions.</p>
            </div>
            <p>By participating in the UNESCO Junior Peace Program, participants acknowledge that they have read,
                understood, and agree to comply with these terms and conditions.</p>
        </div>
    </div>
    <div id="scheduleDetails">
        <div class="schedule-content">
            <h2>Program Schedule</h2>
            <div class="schedule-item">
                <strong>July 6th (Saturday)</strong>
                <p>Arrival of International Participants to Istanbul - No scheduled activities</p>
            </div>
            <div class="schedule-item">
                <strong>July 7th (Sunday)</strong>
                <p>Arrival of International Participants to Istanbul - No scheduled activities</p>
            </div>
            <div class="schedule-item">
                <strong>July 8th (Monday) - Day 1: Introduction</strong>
                <p><span class="time">09:00 - 12:30:</span> Orientation, UNESCO overview, Mission and
                    Values, Peace Education, Introduction to International Organizations (UNESCO, UN,
                    History)</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Campus Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 9th (Tuesday) - Day 2: Intercultural Integration</strong>
                <p><span class="time">09:00 - 12:30:</span> Intercultural integration workshop</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Counselling session & Volleyball</p>
            </div>
            <div class="schedule-item">
                <strong>July 10th (Wednesday) - Day 3: Cross-cultural Communication</strong>
                <p><span class="time">09:00 - 12:30:</span> Understanding and managing intercultural
                    conflicts</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Istanbul Aquarium Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 11th (Thursday) - Day 4: International Relations</strong>
                <p><span class="time">09:00 - 12:30:</span> Concepts of International Relations</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Counselling session & Table Tennis/Basketball
                </p>
            </div>
            <div class="schedule-item">
                <strong>July 12th (Friday) - Day 5: International Relations</strong>
                <p><span class="time">09:00 - 12:30:</span> Theories of International Relations</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Koç Museum and Pierre Loti Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 13th (Saturday) - Weekend 1: Historical Peninsula Tour</strong>
                <p>Full day tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 14th (Sunday) - Weekend 2: Bosphorus Boat Tour</strong>
                <p>Full day tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 15th (Monday) - Day 6: Exploring Values</strong>
                <p><span class="time">09:00 - 12:30:</span> Human Dignity and Freedom</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> VIALAND Themepark Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 16th (Tuesday) - Day 7: Appreciation of Democratic Values</strong>
                <p><span class="time">09:00 - 12:30:</span> Democracy and Equality</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Sports Activity</p>
            </div>
            <div class="schedule-item">
                <strong>July 17th (Wednesday) - Day 8: Emphasis on Legal and Human Rights</strong>
                <p><span class="time">09:00 - 12:30:</span> Rule of Law and Human Rights</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Çamlıca Mosque and Tower Tour</p>
            </div>
            <div class="schedule-item">
                <strong>July 18th (Thursday) - Day 9: Student Presentations</strong>
                <p><span class="time">09:00 - 12:30:</span> Presentations on Education and Peace</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Sports Activity</p>
            </div>
            <div class="schedule-item">
                <strong>July 19th (Friday) - Day 10: Graduation Day</strong>
                <p><span class="time">09:00 - 12:30:</span> University Life / Faculties overview</p>
                <p><span class="time">12:30 - 14:00:</span> Lunch break</p>
                <p><span class="time">14:00 - 18:00:</span> Graduation Ceremony</p>
            </div>
            <div class="schedule-item">
                <strong>July 20th (Saturday)</strong>
                <p>Departure of International Participants- No scheduled activities</p>
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