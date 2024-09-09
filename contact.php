<?php include 'assets/header.php'; ?>

<div class="abocontainer">
    <div class="abodetails">
        <h2>Get Answers to all your <br>questions you might have</h2>
        <h3>We will answer any questions you may have about our online sales right here. We love to hear from you.</h3>
        <br>
        <p>With more than 25 years of experience in Gem business, we being most trustworthy genuine Gemstones Dealers,
            Importers, Exporters, Wholesalers and Online Sellers in Sri Lanka.
            We are selling 100% Natural, Genuine and Certified Gemstones only.</p>
        <div class="form-container">
            <form id="contactForm" action="process_form.php" method="POST">
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
                                <option value="Albania">Albania</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Austria">Austria</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Italy">Italy</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Malta">Malta</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Norway">Norway</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Romania">Romania</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
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
</div>

<script src="js\script.js"></script>
<?php include 'assets/footer.php'; ?>