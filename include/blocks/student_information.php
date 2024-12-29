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
                <select name="place_of_birth" class="form-control"  id="place_of_birth" aria-label="Place of birth" required>  
                <option value="-1">__SELECT__</option>     
                <?php foreach ($countries as $country): ?>
                    <option value="<?= htmlspecialchars($country['M49']) ?>">
                    <?= htmlspecialchars($country['official_name_en'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
                </select>
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