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
            <label for="phone-number">Telephone</label>
                <div class="phone-input-wrapper">
                    <select id="country-code" name="country_code" class="country-code-select">
                        <?php foreach ($dials as $dial): ?>
                            <option value="<?= htmlspecialchars($dial['M49']) ?>">
                            +<?= htmlspecialchars($dial['Dial'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($dial['official_name_en'], ENT_QUOTES, 'UTF-8') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="tel" id="phone-number" name="fathers_telephone" class="phone-number-input" placeholder="Enter your phone number" required>
                </div>
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
            <label for="phone-number">Telephone</label>
                <div class="phone-input-wrapper">
                    <select id="country-code" name="country_code" class="country-code-select">
                        <?php foreach ($dials as $dial): ?>
                            <option value="<?= htmlspecialchars($dial['M49']) ?>">
                            +<?= htmlspecialchars($dial['Dial'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($dial['official_name_en'], ENT_QUOTES, 'UTF-8') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="tel" id="phone-number" name="mothers_telephone" class="phone-number-input" placeholder="Enter your phone number" required>
                </div>
            </div>
        </div>
    </div>