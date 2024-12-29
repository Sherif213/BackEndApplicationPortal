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
                <label for="phone-number">Telephone</label>
                <div class="phone-input-wrapper">
                    <select id="country-code" name="country_code" class="country-code-select">
                        <?php foreach ($dials as $dial): ?>
                            <option value="<?= htmlspecialchars($dial['M49']) ?>">
                            +<?= htmlspecialchars($dial['Dial'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($dial['official_name_en'], ENT_QUOTES, 'UTF-8') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="tel" id="phone-number" name="telephone" class="phone-number-input" placeholder="Enter your phone number" required>
                </div>
            </div>
        </div>
    </div>