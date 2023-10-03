
    <div class="info">
        <h1 id="the-form-title"> Financing Application</h1>
        
        <div  class="form_elem">
            <h3 id="persona"> Personal information</h3>
        </div>
    
        <form id="financeBasicInformation" method="POST">
            
            <div class="form__one">
                <div class="finance-form-elem-container">
                    <input id="fname" placeholder="Firstname" type="text" class="verify-txt" value="<?php echo $fname; ?>" />
                    
                    <input type="text" id="lname" placeholder="Lastname" class="verify-txt" value="<?php echo $lname; ?>" />
                </div>
            
                <div class="finance-form-elem-container">
                    <input class="verify-txt" type="text" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
                <div class="finance-form-elem-container">
                    <input class="verify-txt" type="text" id="phone" placeholder="Phone number" value="<?php echo $phone; ?>" />
                </div>
                <div id="bvn-spc" class="finance-form-elem-container bvn-spc">
                    <input class="" type="text" id="bvn" placeholder="BVN" maxlength="11" />
                </div>
                 
                <!-- <input type="text" id="dob" placeholder="Date of birth" type="text"name="date of birth"><br/> -->
                <div class="finance-form-elem-container">
                    <label for="dob">Date of birth</label>
                    <input  id="dob" class="verify-txt"  onfocus="(this.type='date')" type="text" placeholder="YYYY-MM-DD" />
                </div>
                <div class="finance-form-elem-container">
                    <!---<input type="text" class="marital_status verify-txt" id="marital__status" placeholder="Marital status" />--->
                    <select name="marital_status" id="marital_status" class="verify-txt marital_status">
                        <option value="" disabled selected hidden>Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    <select/>
                </div>
                <div class="finance-form-elem-container">
                    <textarea placeholder="Residential Address" class="verify-txt" id="residential_address" ></textarea>
                </div>
                <div class="finance-form-elem-container">
                    <button disabled type="submit" id="finance-button" class="finance-form-btns">Proceed</button>
                </div>
            </div>
        </form>
        
    </div> 
    <script src="<?php echo base_url(); ?>assets/js/payment.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/personal-page.js"></script>