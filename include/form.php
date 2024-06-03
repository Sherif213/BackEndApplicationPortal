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
                            <p>Arrival of International Participants: <strong>6th and 7th
                                    July</strong>.<span>&#9992;</span></p>
                            <p>Orientation Day: <strong>8th July</strong> </p>
                            <p>Program Courses and activities: <strong>9th July till 18th July</strong></p>
                            <p>Closing Ceremony: <strong>19th July</strong></p>
                            <p>Departure of International Participants: <strong>20th July</strong></p>
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
                            <p>Registration Deadline: <strong>17th June</strong></p>
                        </div>
                    </div>
                    <!-- Courses Section -->
                    <div class="section" style="min-height: 22%;">
                        <h3>COURSES</h3>
                        <div class="programDatesContent">
                            <p>Will be revealed soon!</p>
                        </div>
                    </div>
                    <!-- Fees Section -->
                    <div class="section" style="min-height: 47%;">
                        <h3>FEES</h3>
                        <div class="programDatesContent">
                            <p>Program Fee: <strong>$590</strong></p>
                            <p>Optional Accommodation Fee: <strong>$600</strong></p>
                            <p>Total cost with accommodation: <strong>$1190</strong></p>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>&nbsp;
                            A receipt is required to confirm application!
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
                    <div class="left-section2">
                        <!-- First Name -->
                        <div class="section2">
                            <label for="first_name">Full Name</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>

                        <!-- Date of Birth -->
                        <div class="section2">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" required>
                        </div>

                        <!-- Gender -->
                        <div class="section2">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <!-- T-Shirt Size -->
                        <div class="section2">
                            <label for="tshirt_size">T-Shirt Size</label>
                            <select id="tshirt_size" name="tshirt_size" required>
                                <option value="option">--Select Size--</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="Xlarge">XL</option>
                            </select>
                        </div>
                    </div>

                    <!-- Right Section -->
                    <div class="right-section2">
                        <!-- Nationality -->
                        <div class="section2">
                            <label for="nationality">Nationality</label>
                            <select name="Nationality" class="form-control" required>
                                <option value="">-- Select Country --</option>
                                <option value="3">AFGHANISTAN</option>
                                <option value="6">ALBANIA</option>
                                <option value="15">ALGERIA</option>
                                <option value="80">AMERICAN SAMOA</option>
                                <option value="81">ANDORRA</option>
                                <option value="82">ANGOLA</option>
                                <option value="83">ANGUILLA, UNITED KINGDOM</option>
                                <option value="84">Antigua and Barbuda</option>
                                <option value="5">ARGENTINA</option>
                                <option value="118">ARMENIA</option>
                                <option value="85">ARUBA, NETHERLANDS</option>
                                <option value="86">AUSTRALIA</option>
                                <option value="7">AUSTRIA</option>
                                <option value="8">AZERBAIJAN</option>
                                <option value="87">BAHAMA ISLANDS</option>
                                <option value="9">BAHRAIN</option>
                                <option value="10">BANGLADESH</option>
                                <option value="88">BARBADOS</option>
                                <option value="11">BELARUS</option>
                                <option value="89">BELGIUM</option>
                                <option value="90">BELIZE</option>
                                <option value="91">BENIN</option>
                                <option value="92">BERMUDA, UNITED KINGDOM</option>
                                <option value="94">BHUTAN</option>
                                <option value="96">BOLIVIA</option>
                                <option value="13">BOSNIA AND HERZEGOVINA</option>
                                <option value="97">BOTSWANA</option>
                                <option value="98">BRAZIL</option>
                                <option value="99">BRUNEI</option>
                                <option value="14">BULGARIA</option>
                                <option value="100">BURKINA FASO</option>
                                <option value="101">BURUNDI</option>
                                <option value="155">CAMBODIA</option>
                                <option value="156">CAMEROON</option>
                                <option value="157">CANADA</option>
                                <option value="158">CANARY ISLANDS</option>
                                <option value="102">CAPE VERDE</option>
                                <option value="103">CAYMAN ISLANDS, UNITED KINGDOM</option>
                                <option value="200">CENTRAL AFRICAN REPUBLIC</option>
                                <option value="107">CHAD</option>
                                <option value="228">CHILE</option>
                                <option value="16">CHINA</option>
                                <option value="105">CHRISTMAS ISLAND, AUSTRALIA</option>
                                <option value="40">COLOMBIA</option>
                                <option value="161">COMOROS</option>
                                <option value="41">CONGO</option>
                                <option value="164">COSTA RICA</option>
                                <option value="25">CROATIA</option>
                                <option value="43">CUBA</option>
                                <option value="142">CYPRUS</option>
                                <option value="108">CZECH REPUBLIC</option>
                                <option value="162">DEMOCRATIC REPUBLIC OF CONGO</option>
                                <option value="109">Denmark</option>
                                <option value="106">DJIBOUTI</option>
                                <option value="111">DOMINICAN REPUBLIC</option>
                                <option value="112">Dominica</option>
                                <option value="110">EAST TIMOR</option>
                                <option value="113">ECUADOR</option>
                                <option value="53">EGYPT</option>
                                <option value="115">EL SALVADOR</option>
                                <option value="28">ENGLAND</option>
                                <option value="114">EQUATORIAL GUINEA</option>
                                <option value="117">ERITREA</option>
                                <option value="119">ESTONIA</option>
                                <option value="17">ETHIOPIA</option>
                                <option value="123">Falkland Islands, British</option>
                                <option value="120">FIJI</option>
                                <option value="20">FINLAND</option>
                                <option value="124">FRANCE</option>
                                <option value="125">FRENCH GUIANA</option>
                                <option value="127">FRENCH POLYNESIA</option>
                                <option value="126">FRENCH SOUTHERN Province (Kerguelen Islands)</option>
                                <option value="128">GABON</option>
                                <option value="130">GAMBIA</option>
                                <option value="23">GEORGIA</option>
                                <option value="4">GERMANY</option>
                                <option value="131">GHANA</option>
                                <option value="104">GIBRALTAR, UNITED KINGDOM</option>
                                <option value="79">GREECE</option>
                                <option value="135">GREENLAND</option>
                                <option value="134">GRENADA</option>
                                <option value="136">GUADELOUPE, FRANCE</option>
                                <option value="137">GUAM, AMERICAN</option>
                                <option value="138">GUATEMALA</option>
                                <option value="132">GUINEA</option>
                                <option value="139">GUYANA</option>
                                <option value="145">HAITI</option>
                                <option value="147">HONDURAS</option>
                                <option value="27">HONG KONG</option>
                                <option value="50">HUNGARY</option>
                                <option value="151">ICELAND</option>
                                <option value="24">INDIA</option>
                                <option value="116">INDONESIA</option>
                                <option value="30">IRAN</option>
                                <option value="29">IRAQ</option>
                                <option value="148">IRELAND</option>
                                <option value="31">ISRAEL</option>
                                <option value="33">ITALY</option>
                                <option value="121">IVORY COAST</option>
                                <option value="152">JAMAICA</option>
                                <option value="34">Jamaica</option>
                                <option value="35">JAPAN</option>
                                <option value="153">JOHNSTON ATOLL, AMERICA</option>
                                <option value="239">JORDAN</option>
                                <option value="38">KAZAKHSTAN</option>
                                <option value="159">KENYA</option>
                                <option value="160">KIRIBATI</option>
                                <option value="163">KOSOVO</option>
                                <option value="44">KUWAIT</option>
                                <option value="39">KYRGYZSTAN</option>
                                <option value="169">LAOS</option>
                                <option value="170">LATVIA</option>
                                <option value="49">LEBANON</option>
                                <option value="46">LESOTHO</option>
                                <option value="171">LIBERIA</option>
                                <option value="47">LIBYA</option>
                                <option value="172">LIECHTENSTEIN</option>
                                <option value="48">LITHUANIA</option>
                                <option value="174">LUXEMBOURG</option>
                                <option value="176">MACAU (Macau)</option>
                                <option value="51">MACEDONIA</option>
                                <option value="175">MADAGASCAR</option>
                                <option value="177">MALAWI</option>
                                <option value="52">MALAYSIA</option>
                                <option value="178">Maldive Islands</option>
                                <option value="179">MALI</option>
                                <option value="180">MALTA</option>
                                <option value="181">Marshall Islands</option>
                                <option value="182">Martinique, FRANCE</option>
                                <option value="191">MAURITANIA</option>
                                <option value="183">MAURITIUS</option>
                                <option value="184">MAYOTTE, FRANCE</option>
                                <option value="185">MEXICO</option>
                                <option value="187">MICRONESIA</option>
                                <option value="186">Midway Islands, U.S.</option>
                                <option value="55">MOLDOVA</option>
                                <option value="189">MONACO</option>
                                <option value="54">MONGOLIA</option>
                                <option value="36">MONTENEGRO</option>
                                <option value="190">MONTSERRAT</option>
                                <option value="18">MOROCCO</option>
                                <option value="192">MOZAMBIQUE</option>
                                <option value="95">MYANMAR (BURMA)</option>
                                <option value="193">Namibia</option>
                                <option value="194">NAURU</option>
                                <option value="195">NEPAL</option>
                                <option value="26">NETHERLANDS</option>
                                <option value="146">NETHERLANDS ANTILLES</option>
                                <option value="247">NEW CALEDONIA, FRANCE</option>
                                <option value="248">NEW ZEALAND</option>
                                <option value="197">NICARAGUA</option>
                                <option value="196">NIGER</option>
                                <option value="56">NIGERIA</option>
                                <option value="198">NIUE, NEW ZEALAND</option>
                                <option value="166">NORTH KOREA</option>
                                <option value="165">NORTHERN IRELAND</option>
                                <option value="167">NORTHERN Maryana ISLANDS</option>
                                <option value="199">NORWAY</option>
                                <option value="133">of Guinea-Bissau</option>
                                <option value="237">OMAN</option>
                                <option value="58">PAKISTAN</option>
                                <option value="201">PALAU ISLANDS</option>
                                <option value="122">PALESTINE</option>
                                <option value="202">PALMYRA ATOLL, AMERICA</option>
                                <option value="203">PANAMA</option>
                                <option value="204">PAPUA NEW GUINEA</option>
                                <option value="205">PARAGUAY</option>
                                <option value="206">PERU</option>
                                <option value="59">POLAND</option>
                                <option value="207">PORTUGAL</option>
                                <option value="208">PUERTO RICO, UNITED STATES</option>
                                <option value="37">QATAR</option>
                                <option value="251">REPUBLIC OF SOUTH SUDAN</option>
                                <option value="1">REPUBLIC OF TÜRKİYE</option>
                                <option value="209">Réunion, FRANCE</option>
                                <option value="60">ROMANIA</option>
                                <option value="62">RUSSIAN FEDERATION</option>
                                <option value="61">RWANDA</option>
                                <option value="210">SAINT HELENA, ENGLAND</option>
                                <option value="211">Saint Martin, France</option>
                                <option value="212">Saint Pierre And Miquelon, FRANCE</option>
                                <option value="213">SAMOA</option>
                                <option value="214">SAN MARINO</option>
                                <option value="215">SANTA Kitts and Nevis</option>
                                <option value="216">SANTA LUCIA</option>
                                <option value="217">SANTA Vincent and the Grenadines</option>
                                <option value="218">São Tomé and Príncipe</option>
                                <option value="69">SAUDI ARABIA</option>
                                <option value="219">SENEGAL</option>
                                <option value="64">SERBIA</option>
                                <option value="220">SEYCHELLES</option>
                                <option value="221">SIERRA LEONE</option>
                                <option value="63">SINGAPORE</option>
                                <option value="65">SLOVAKIA</option>
                                <option value="66">SLOVENIA</option>
                                <option value="222">SOLOMON ISLANDS</option>
                                <option value="223">SOMALIA</option>
                                <option value="21">SOUTH AFRICA</option>
                                <option value="141">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS, ENGLAND</option>
                                <option value="22">SOUTH KOREA</option>
                                <option value="149">SPAIN</option>
                                <option value="224">SRI LANKA</option>
                                <option value="67">SUDAN</option>
                                <option value="225">SURINAME</option>
                                <option value="226">SVALBARD, NORWAY</option>
                                <option value="227">SWAZILAND</option>
                                <option value="32">SWEDEN</option>
                                <option value="150">SWITZERLAND</option>
                                <option value="68">SYRIA</option>
                                <option value="73">TAIWAN</option>
                                <option value="70">TAJIKISTAN</option>
                                <option value="229">TANZANIA</option>
                                <option value="71">TATARİSTAN</option>
                                <option value="72">THAILAND</option>
                                <option value="42">THE DEMOCRATIC PEOPLES REPUBLIC OF KOREA</option>
                                <option value="19">THE PHILIPPINES</option>
                                <option value="230">TOGO</option>
                                <option value="231">TONGA</option>
                                <option value="232">TRINIDAD AND TOBAGO</option>
                                <option value="74">TUNISIA</option>
                                <option value="45">TURKISH REPUBLIC OF NORTHERN CYPRUS</option>
                                <option value="75">TURKMENISTAN</option>
                                <option value="233">Turks and Caicos Islands, England</option>
                                <option value="234">TUVALU</option>
                                <option value="76">UGANDA</option>
                                <option value="77">UKRAINE</option>
                                <option value="12">UNITED ARAB EMIRATES</option>
                                <option value="2">UNITED STATES OF AMERICA</option>
                                <option value="238">URUGUAY</option>
                                <option value="57">UZBEKISTAN</option>
                                <option value="240">Vallis and Futuna, FRANCE</option>
                                <option value="241">VANUATU</option>
                                <option value="242">VENEZUELA</option>
                                <option value="243">VIETNAM</option>
                                <option value="244">VIRGIN ISLANDS, UNITED STATES</option>
                                <option value="245">Virgin Islands, British</option>
                                <option value="246">WAKE ISLAND, AMERICA</option>
                                <option value="129">WALES</option>
                                <option value="78">YEMEN</option>
                                <option value="249">ZAMBIA</option>
                                <option value="250">ZIMBABWE</option>
                            </select>
                        </div>

                        <!-- Place of Birth -->
                        <div class="section2">
                            <label for="place_of_birth">Place of Birth</label>
                            <input type="text" id="place_of_birth" name="place_of_birth" required>
                        </div>

                        <!-- Student Certificate -->
                        <div class="section2">
                            <label for="student_certificate">Student Certificate</label>
                            <input type="file" id="student_certificate" name="student_certificate" required>
                        </div>

                        <!-- Photo Upload -->
                        <div class="section2">
                            <label for="photo">Your Photo</label>
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
                </div>

                <div class="information-container3">
                    <!-- Headline -->
                    <div class="container-headline1">
                        <img src="images/ContactCropped.png" alt="Texture Image" class="texture-image2">
                        <h2 class="headline1">CONTACT INFORMATION</h2>
                    </div>

                    <!-- Home Address Row -->
                    <div class="top-section3">
                        <label for="home_address">Home Address</label>
                        <textarea id="home_address" name="home_address" class="form-control full-width-input"
                            required></textarea>
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
                        <label for="fathers_full_name">1.Parent/Legal Guardian's Full Name</label>
                        <input type="text" id="fathers_full_name" name="fathers_full_name"
                            class="form-control full-width-input" required>
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
                        <label for="mothers_full_name">2.Parent/Legal Guardian's Full Name</label>
                        <input type="text" id="mothers_full_name" name="mothers_full_name"
                            class="form-control full-width-input" required>
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
                    <div class="top-section5">
                        <!-- Left Section -->
                        <div class="left-section5">
                            <label for="passport_name">Name on Passport</label>
                            <input type="text" id="passport_name" name="passport_name" required>
                        </div>
                        <!-- Right Section -->
                        <div class="right-section5">
                            <label for="given_place">Given Place</label>
                            <input type="text" id="given_place" name="given_place" required>
                        </div>
                    </div>

                    <!-- Second Section -->
                    <div class="second-section5">
                        <!-- Left Section -->
                        <div class="left-section5">
                            <label for="passport_name_2">Passport Number</label>
                            <input type="text" id="passport_name_2" name="passport_number" required>
                        </div>
                        <!-- Right Section -->
                        <div class="right-section5">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="text" id="expiry_date" name="expiry_date" required>
                        </div>
                    </div>

                    <!-- Bottom Section -->
                    <div class="bottom-section5">
                        <label for="passport_copy">Upload Passport Copy</label>
                        <input type="file" id="passport_copy" name="passport_copy" required>
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
                            <option value="Programming With JAVA II">Programming With JAVA II</option>
                            <option value="Introduction To Programming Language">Introduction To Programming Language
                            </option>
                            <option value="Calculas II">Calculas II</option>
                        </select>
                    </div>


                </div>
                <div class="information-container7">
                    <div class="container-headline1">
                        <img src="images/Course.jpg" alt="Texture Image" class="texture-image2">
                        <h2 class="headline1">UNIVERSITY INFORMATION</h2>
                    </div>
                    <div class="top-section5">
                        <div class="left-section5">
                            <label for="institution-name">Institution Name</label>
                            <input type="text" id="institution-name" name="institution_name" required>
                        </div>
                        <div class="right-section5">
                            <label for="department">Department</label>
                            <input type="text" id="department" name="department" required>
                        </div>
                    </div>
                    <div class="top-section3">
                        <label for="institution-address">Institution Address</label>
                        <textarea id="institution-address" name="institution_address"
                            class="form-control full-width-input" required></textarea>
                    </div>
                    <div class="top-section5">
                        <div class="left-section5">
                            <label for="email4">Institution Email</label>
                            <input type="email" id="email4" name="institution_email" required>
                        </div>
                        <div class="right-section5">
                            <label for="telephone4">Institution Telephone</label>
                            <input type="tel" id="telephone4" name="institution_telephone" required>
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

                <div class="information-container8">
                    <label class="checkbox-container">
                        <input type="checkbox" id="agreeCheckbox" required class="checkbox-input" required>
                        <span class="checkmark"></span>
                        <span class="checkbox-text">I agree to the <a href="#" id="openModal" class="terms-link">Terms
                                and Conditions</a></span>
                    </label>

                </div>
                <div class="information-container8">
                    <div class="button-section">
                        <button type="submit" class="btn btn-success">Submit Application</button>
                        <button type="reset" class="btn btn-danger">Reset Field</button>
                    </div>
                </div>
                <div id="modal">
                    <div class="modal-content">
                        <!-- Your terms and conditions content goes here -->
                        <h2>Terms and Conditions</h2>
                        ‘IAU will not be liable in any way for any loss, injury, sickness or damage that might be caused
                        by third parties that I may suffer while participating in the program, or which results in any
                        way during my participation in the program.
                        <br><br> I am aware and accept that IAU is not responsible for any other liabilities other than
                        organizing and conducting this program. I declare that the information presented in this
                        application and the accompanying documentation is true and correct. I understand that the IAU
                        Academic Relations Office may terminate my application or nomination for the program if I have
                        misrepresented my past and/or present circumstances.
                        <br><br> I authorize IAU staff to make relevant enquiries to verify my application, and should I
                        be approved to go on the program, to provide the necessary information to the required
                        institutions for the purpose of arranging my participation.
                        <br><br> I am aware that I have the right to either transfer to another course or receive a full
                        refund if my course selection is either no longer available or has been cancelled by IAU.’
                        <div class="clear"><br><br></div>
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
                            <p><span class="time">09:00 - 12:30:</span> Human Dignity, Freedom</p>
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
                            <p><span class="time">09:00 - 12:30:</span> Rule of Law, Human Rights</p>
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
                        <div class="clear"><br><br></div>
                    </div>
                </div>
            </form>

            <?php include "include/footer.php"?>
            <div class="info-container">
            </div>
        </div>
    </div>
    <script src="src/js/schedule.js"></script>
    <script src="src/js/termsConditions.js"></script>