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
                    <?php include "include/others/countries.php" ?>
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