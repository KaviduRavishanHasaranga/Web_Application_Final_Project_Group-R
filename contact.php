<?php include 'assets/header.php'; ?>

<div class="abodetails">
    <h2>Get Answers to all your <br>questions you might have</h2>
    <h3>We will answer any questions you may have about our online sales right here. We love to hear from you.</h3>
    <br>
    <p>With more than 25 years of experience in Gem business, we being most trustworthy genuine Gemstones Dealers,
        Importers, Exporters, Wholesalers and Online Sellers in Sri Lanka.
        We are selling 100% Natural, Genuine and Certified Gemstones only.</p>
    <div class="form-container">
        <form action="process_form.php" method="POST">
            <div class="user-details">
                <div class="grid-item item1">
                    <div class="input-box">
                        <span class="details">Title</span>
                        <span class="req-star">*</span><br>
                        <select name="titles" class="form-control" id="titles">
                            <option value="">Select</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Miss.">Miss.</option>
                        </select>
                    </div>
                    <div class="input-box box-2">
                        <span class="details">Full Name</span>
                        <span class="req-star">*</span>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                </div>

                <div class="grid-item item2">
                    <div class="input-box box-1">
                        <span class="details">Email</span>
                        <span class="req-star">*</span>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box box">
                        <span class="details">Country</span>
                        <span class="req-star">*</span><br>
                        <select id="country" name="country" class="form-control" required>
                            <option value="">Select</option>
                            <option value="GB">United Kingdom</option>
                            <option value="AL">Albania</option>
                            <option value="AD">Andorra</option>
                            <option value="AT">Austria</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BG">Bulgaria</option>
                            <option value="HR">Croatia (Hrvatska)</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="FR">France</option>
                            <option value="GI">Gibraltar</option>
                            <option value="DE">Germany</option>
                            <option value="GR">Greece</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HU">Hungary</option>
                            <option value="IT">Italy</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MK">Macedonia</option>
                            <option value="MT">Malta</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="ME">Montenegro</option>
                            <option value="NL">Netherlands</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="RO">Romania</option>
                            <option value="SM">San Marino</option>
                            <option value="RS">Serbia</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="ES">Spain</option>
                            <option value="UA">Ukraine</option>
                            <option value="DK">Denmark</option>
                            <option value="EE">Estonia</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FI">Finland</option>
                            <option value="GL">Greenland</option>
                            <option value="IS">Iceland</option>
                            <option value="IE">Ireland</option>
                            <option value="LV">Latvia</option>
                            <option value="LT">Lithuania</option>
                            <option value="NO">Norway</option>
                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="TR">Turkey</option>
                        </select>
                    </div>
                    <div class="input-box box-3">
                        <span class="details">City</span>
                        <span class="req-star">*</span>
                        <input type="text" id="city" name="city" placeholder="Enter your city" required>
                    </div>
                </div>

                <div class="grid-item item3">
                    <div class="input-box box-1">
                        <span class="details">Phone</span>
                        <span class="req-star">*</span>
                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="box-2">
                        <span class="details">Is this Phone Number available on?</span><br>
                        <div class="checkbox-container">
                            <label class="opt"><input type="checkbox" name="whatsapp" value="1">&nbsp;Whatsapp</label><br>
                            <label class="opt"><input type="checkbox" name="viber" value="1">&nbsp;Viber</label><br>
                            <label class="opt"><input type="checkbox" name="telegram" value="1">&nbsp;Telegram</label>
                        </div>
                    </div>
                </div>

                <div class="grid-item item4">
                    <div class="input-box box-4">
                        <span class="details">Subject</span>
                        <span class="req-star">*</span>
                        <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
                    </div>
                    <div class="input-box box-5">
                        <span class="details">Your Budget(Approximately in your preferred currency)</span>
                        <span class="req-star">*</span>
                        <input type="text" id="budget" name="budget" placeholder="Eg: (USD), (GBP), (EUR), (AUD), (CHF)" required>
                    </div>
                </div>

                <div class="grid-item item5">
                    <div class="input-box box-1">
                        <textarea name="message" placeholder="Your Message" class="message" id="message" required></textarea>
                    </div>
                </div>
                <div class="btn-container">
                    <input type="submit" class="submit-btn" value="Submit" name="submit">
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'assets/footer.php'; ?>