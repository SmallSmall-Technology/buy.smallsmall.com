    <div class="form-wrapper">
        <Box class="form-input-container">
            <div class="form-title">
                <h1>Co-Ownership Shares Application</h1>
            </div>
            <!---- Co Own STP application form ---->
            <form class="stp-app-form" id="targetProgramForm" method="POST">
                <div>
                    <div class="purchased-shares-info">
                        <span class="shares-txt-info small">You are about to purchase</span>
                        <span class="shares-txt-info large colored"><span id="shares-amount">0</span> Shares</span>
                        <div class="share-quantity share-quantity-target">
    				              <input id="unit-amount" class="unit-amount" min="" value="" type="number">
    					          </div>
                        <span class="shares-txt-info small">add more shares</span>
                        <?php //if($targetOption){ ?>
                          <!---<span class="shares-txt-info small">
                            Hi <?php //echo $fname; ?><br /><br />
                            You are already on an STP plan, if you would like to subscribe to another plan you can do so by clicking the checkbox below.
                          </span>--->
                        <?php //} ?>
                        <span class="shares-txt-info small"><input class="target-option" type="checkbox" /> Subscribe to our<?php //echo ($targetOption)? 'another' : 'our'; ?> Co-ownership Shares Target Program </span>
                    </div>
                    
                    <!-- <a id="shares-target-link" href="https://smallsmall.zendesk.com/hc/en-us/categories/10765648854429-Shares-Target-Program" target="_blank">What is shares target program?  <i class="fa fa-angle-double-right"></i></a> -->
                    <a id="shares-target-link" href="https://buy-small-small.helpcenter.guide/collections/shares-target-program-a4e580-efff9" target="_blank">What is shares target program?  <i class="fa fa-angle-double-right"></i></a>

                    <div class="single-span-col-input btm-spc user-target-options">
                        <span id="field-label">Select a plan</span>
                        <input type="hidden" class="plan-amount" id="plan-amount" value="" />
                        <!---<select name="plan-amount" class="minimal plan-amount verify-txt" id="plan-amount">
                              <option value="20000">20,000 (5 Shares)</option>
                              <option value="40000">40,000 (10 Shares)</option>
                              <option value="60000">60,000 (15 Shares)</option>
                              <option value="80000">80,000 (20 Shares)</option>
                              <option value="100000">100,000 (25 Shares)</option>
                              <option value="120000">120,000 (30 Shares)</option>
                              <option value="140000">140,000 (35 Shares)</option>
                              <option value="160000">160,000 (40 Shares)</option>
                              <option value="180000">180,000 (45 Shares)</option>
                        </select>--->
                    </div>
                    
                    <div class="single-span-col-input btm-spc user-target-options">
                        <span id="field-label">Auto-Purchase Frquency</span>
                        <select name="purchase-frequency" class="minimal purchase-frequency verify-txt" id="purchase-frequency">
                            <option value="">Select frequency</option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="single-span-col-input btm-spc user-target-options">
                        <span id="field-label">Duration</span>
                        <select name="duration" class="minimal duration verify-txt" id="duration">
                            <option value="">Select duration</option>
                              <option value="1">1 Year</option>
                              <option value="2">2 Years</option>
                              <option value="3">3 Years</option>
                              <option value="4">4 Years</option>
                              <option value="5">5 Years</option>
                              <option value="6">6 Years</option>
                        </select>
                    </div>
                    
                </div>
                
                <input type="hidden" id="userID" name="userID" value="<?php echo @$userID; ?>" />
                
                <div class="single-span-col-input">
                    
                    <input type="submit" class="co-own-form-btn button" value="Proceed" />
                    
                </div>
            
            </form>
            <!---- Co Own STP application form ---->
        </Box>
        
    </div>
    <script src="<?php echo base_url(); ?>assets/js/payment.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/payment-plan-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/co-own-app.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/upload-drag-and-drop.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/beneficiary-form.js?version=<?php echo rand(199, 9999999999); ?>"></script>
    <script>

        jQuery('<div class="quantity-nav-home"><div class="quantity-button-home upp">+</div><div class="quantity-button-home ddown">-</div></div>').insertAfter('.share-quantity input');
        
        jQuery('.share-quantity').each(function() {
          var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.upp'),
            btnDown = spinner.find('.ddown'),
            min = input.attr('min'),
            max = input.attr('max');
            
                
          btnUp.click(function() {
              
            var oldValue = parseFloat(input.val());
            
            if (oldValue >= max) {
                
              var newVal = oldValue;
              
            } else {
                
              var newVal = oldValue + 1;
              
            }
            
            spinner.find("input").val(newVal);
            
            spinner.find("input").trigger("change");
            
            $('#shares-amount').html(newVal);
          });
    
          btnDown.click(function() {

            var oldValue = parseFloat(input.val());
            
            if (oldValue <= min) {
                
              var newVal = oldValue;
              
            } else {
                
              var newVal = oldValue - 1;
              
            }
            
            spinner.find("input").val(newVal);
            
            spinner.find("input").trigger("change");
            
            $('#shares-amount').html(newVal);
            
          });
    
        });
    </script>

    