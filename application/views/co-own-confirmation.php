    <div class="formContainer">
        <div class="header__image">
            <!---<div class='header__img'>
                <img src="<?php //echo base_url(); ?>asset/images/personalinfo.svg" alt="personal information"  /><br/>personal info<br/>
                <input id="personal__headinfo" type="text" />
            </div>
    
    
            <div class='header__img' >
                <img src="<?php //echo base_url(); ?>asset/images/purpbriefcase.svg" alt="employment information"   /><br/>Employment info<br/>
                <input id="personal__headinfo" type="text" />
            </div>
    
            <div class='header__img'>
                <img src="<?php //echo base_url(); ?>asset/images/accountstatecolour.svg" alt="account information" /><br/>Bank statement & ID<br/>
                <input id="personal__headinfo" type="text" />
            </div>
    
            <div class='header__img'>
                <img src="<?php // base_url(); ?>asset/images/summarycolor.svg" alt="summary" /><br/>summary<br/>
                <input id="personal__headinfo" type="text" />
            </div>--->
        </div>
        <div style="width:100%">
            <div class="summary-container">
                <div class="summary-header">Co Ownership</div>
                <div class="payment-summary">
                    <div class="summary-dets">
                        <div class="summary-sub-head align-left">Property information</div>
                        <div class="summary-prop-title" id="prop-title">**************</div>
                        <div class="summary-prop-dets" id="prop-address">****************************</div>
                        <div class="summary-prop-dets" id="bed-bath">**************</div>
                        <div class="summary-prop-dets" id="prop-size">********</div>
                        <table class="summary-table" width="100%">
                            <tr class="summary-tr">
                                
                                <td width="50%">
                                    <div class="summary-desc">Who are you buying for?</div>
                                </td>
                                <td>
                                    <div class="summary-desc"><span style="font-weight:bold" id="purchase-beneficiary"></span></div>
                                    
                                </td>
                            </tr>
                        </table>
                        <div style="font-weight:bold" class="summary-sub-head align-left">Shares target program Subscription details</div>
                        <table class="summary-table" width="100%">
                            <tr class="summary-tr">
                                
                                <td width="50%">
                                    <div class="summary-desc">Auto-Purchase Frequency</div>
                                </td>
                                <td>
                                    <div class="summary-desc"><span style="font-weight:bold" id="auto-purchase-frequency"></span></div>
                                    
                                </td>
                            </tr>
                            <tr class="summary-tr">
                                <td width="50%">
                                    <div class="summary-desc">Duration</div>
                                </td>
                                <td>
                                    <div class="summary-desc"><span style="font-weight:bold" id="auto-purchase-duration"></span></div>
                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="summary-dets">
                        <div class="summary-sub-head align-left">Summary</div>
                        <div class="finance-table-container">
                            <table class="summary-table" width="100%">
                                <tr class="summary-tr">
                                    <td width="50%">
                                        <div class="summary-desc">Number of shares</div>
                                        <div class="summary-info" id="shares-amount">***********</div>
                                    </td>
                                    <td>
                                        <div class="summary-desc">Price/Share</div>
                                        <div class="summary-info" id="price-per-share">***********</div>
                                    </td>
                                </tr>
                                <tr class="summary-tr">
                                    <td width="50%">
                                        <div class="summary-desc">Total price of shares</div>
                                        <div class="summary-info" id="total-shares-price">**************</div>
                                    </td>
                                    <td>
                                        <div class="summary-desc">Transaction fee (10%)</div>
                                        <div class="summary-info" id="transaction-fee">**************</div>
                                    </td>
                                </tr>
                                <tr class="summary-tr">
                                    <td width="50%">
                                        <div class="summary-desc">Total price <!---<span id="actual-percentage">0%</span>---></div>
                                        <div class="summary-info" id="total-cost">**************</div>
                                    </td>
                                    <td>
                                        <div class="summary-desc">Paystack charges</div>
                                        <div class="summary-info" id="payment-charges">*******</div>
                                    </td>
                                </tr>
                                <?php if($discount['discount_price']){ ?>
                                    <tr class="summary-tr">
                                        <td width="50%">
                                            <div class="summary-desc">Discount price <!---<span id="actual-percentage">0%</span>---></div>
                                            <div class="summary-info" id="total-cost"><span style='font-family:helvetica;'>&#x20A6;</span><?php echo number_format($discount['discount_price']); ?></div>
                                        </td>
                                        <td>
                                            <div class="summary-desc">Discount</div>
                                            <div class="summary-info" id="payment-charges"><?php echo number_format($discount['discount_value']); ?>%</div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div> 
            </div> 
            
        </div> 
        <div class="uploadFormContainer">
            <form id="confirmationForm" method="POST">
                
                <input type="hidden" id="email" value="<?php echo $email; ?>" />
                
                <input type="hidden" id="due_amount" value="" />

                <?php
                    $final_amount = 0;

                    if($discount['discount_price']){

                        $paystack_charges = 0.0195;

                        $charges = $paystack_charges * $discount['discount_price'];

                        if($charges < 2000){        
                            //
                            $final_amount = ($discount['discount_price'] / (1 - $paystack_charges)) + 0.01;
                            
                        }else{
                            
                            $final_amount = $discount['discount_price'] + 2000;
                            
                        }

                    }                    
                ?>                
                <input type="hidden" id="discount_amount" value="<?php echo round($final_amount, 2); ?>" />
                
                <input type="hidden" id="refID" value="<?php echo $refID; ?>" />
                
                <input type="hidden" id="target_option" value="<?php echo $target_option; ?>" />
                
                <input type="hidden" id="propertyID" value="<?php echo $propertyID; ?>" />
                
			    
                <div class="payment-txt">Click the finish button to submit and pay <!---origination fee: <span id="payment-output">0</span>---></div>
                <button onclick="payWithPaystack()" type="submit" id="confirmationBtn" class="doc-submit-btn">Finish</button>
                
                <div class="payment-txt"><input id="terms-and-conds" type="checkbox" value="yes" /> I have agreed to BuySmallsmall's <a target="_blank" href="<?php echo base_url('co-own-tandc'); ?>">Terms and Condition</a></div>
            </form>
        </div>        
    </div>

<script src="<?php echo base_url() ?>assets/js/co-own-confirmation.js?version=<?php echo rand(999, 999999); ?>"></script>
<script src="<?php echo base_url().'assets/js/payment.js' ?>"></script>
<script>
    const paymentForm = document.getElementById('confirmationBtn');
    
    paymentForm.addEventListener("click", payWithPaystack, false);
    
    function payWithPaystack(e) {
        
        e.preventDefault();
        
        if($('#terms-and-conds').is(':checked')){
        
            $('.payment-btn').html('Wait...');

            var due_amount = parseInt(document.getElementById("due_amount").value) * 100;

            var discount_amount = parseInt(document.getElementById("discount_amount").value) * 100;

            if(discount_amount){

                due_amount = discount_amount;

            }
        
            let handler = PaystackPop.setup({
            
                key: 'pk_live_34a3561ac7f3d3e35d118e3e4bf3777065d92f62', // Replace with your public key
                
                email: document.getElementById("email").value,
                
                amount: due_amount,
                
                ref: document.getElementById("refID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                
                // label: "Optional string that replaces customer email"
                
                onClose: function(){
                    
                },
                
                callback: function(response){
                
                    let message = 'Payment complete! Reference: ' + response.reference;
                    updateTransaction();
                
                }
            
            });
        
            handler.openIframe();
        }else{
            
            alert("You need to agree to our Terms and Conditions before you can proceed.");
            
            return false;
            
        }
    
    }
    
    function updateTransaction(){
        
        var payable = $('#due_amount').val();

        var discount_amount = $('#discount_amount').val();

        if(discount_amount){
            payable = discount_amount;
        }
        
        var ref = $('#refID').val();
        
        var target_option = $('#target_option').val();
        
        var plan = 'Co-own';
    	
    	//var cost = $('#due_amount').val();
    	
    	
    	var data = {"plan" : plan, "payable" : payable, "ref" : ref, "target_option" : target_option};	
            
            $.ajaxSetup ({ cache: false });
    
    		$.ajax({
    
    			url : baseUrl+'buytolet/updatePayment/',
    
    			type: "POST",
    
    			async: true,
    
    			data: data,
    
    			success	: function (data){
    			    
    				alert("Payment update Successful!");
    
    				window.location.href = baseUrl+"/successful-payment";
    
    			}
    
    		});
        
    }
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
