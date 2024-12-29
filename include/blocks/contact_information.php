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
                        <option value="+1" data-country="us">+1 (USA)</option>
                        <option value="+44" data-country="gb">+44 (UK)</option>
                        <option value="+90" data-country="tr">+90 (Turkey)</option>
                        <option value="+91" data-country="in">+91 (India)</option>
                        <option value="+61" data-country="au">+61 (Australia)</option>
                        <!-- Add more options -->
                    </select>
                    <input type="tel" id="phone-number" name="telephone1" class="phone-number-input" placeholder="Enter your phone number" required>
                </div>
            </div>
        </div>
    </div>