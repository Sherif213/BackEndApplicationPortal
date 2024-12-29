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
            <label for="phone-number">Institution Telephone</label>
                <div class="phone-input-wrapper">
                    <select id="country-code" name="country_code" class="country-code-select">
                        <?php foreach ($dials as $dial): ?>
                            <option value="<?= htmlspecialchars($dial['M49']) ?>">
                            +<?= htmlspecialchars($dial['Dial'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($dial['official_name_en'], ENT_QUOTES, 'UTF-8') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="tel" id="phone-number" name="institution_telephone" class="phone-number-input" placeholder="Enter your phone number" required>
                </div>
            </div>
        </div>
    </div>