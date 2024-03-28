//Javascript document
var baseUrl = "https://buy.smallsmall.com/";

//window.localStorage.removeItem('co_own_basket');

$('.option-but').click(function(){
	 
	"use strict";
	
	$(this).html("Wait...");	
	
	//var option_taken = $("input[name='option-but']:checked").val();
	
	var logStatus = $('#userID').val();
	
	if(logStatus == ''){
	    
	    var ans = confirm("Do you wish to login to proceed?");
		
		if(ans){

			window.location.href = baseUrl+"login";

		}else{

			$('.option-but').html("Apply Now");

			return false;

		}
	    
	} 

	var plan = $('#option-but').val();

	var onpl_option = $('#onpl-property').val();
	
	var pool_check = $('.pool_check').val();	
	
	var total_pool_units = 0;
	
	var property_name = $('#property_name').val();
	
	var payment_period = $('#repayment-period').val();
	
	var propertyID = $('.prop-id').val();
	
	var payable = 0;
	
	var finance_payable = $('.finance-payment').val();
	
	var property_cost = $('.total-amount').val();
	
	var origination_fee = $('.one-percent').val();
	
	var transaction_fee = $('.four-percent').val();
	
	var unit_amount = 0;
	
	var promo = $('.promo-price').val();
	
	var promo_type = $('.promo-category').val();
	
	var promo_code = '';
	
	var onpl_payable = 0;
	
	var bnpl_payable = 0;

	var down_payment = 0;
	
	var balance = 0;

	var repayment_val = 0;
	
	var purchase_frequency = 0;
	
	var duration = 0;

	var percentage_value = 0;

		
	if(payment_period == '' && !(onpl_option)){
	    
	    alert("Select a tenor period please");
	    
	    $('.option-but').html("Apply Now");
	    
	    return false;

	}else if(payment_period == '' && (onpl_option)){

		percentage_value = $('#percentage-value').val();

		if(percentage_value >= 35 && percentage_value <= 54){

			payment_period = 1;

		}else if(percentage_value >= 55 && percentage_value <= 64){

			payment_period = 2;

		}else if(percentage_value >= 65 && percentage_value <= 100){

			payment_period = 3;

		}

	}
	
	if(plan == 'finance' || plan == 'champ' || plan == 'btl-standard' || plan == 'buy-2-let'){		
		
		payable = finance_payable;

		down_payment = $('.payment').val();
		
		balance = property_cost - down_payment;

	}else if(plan == 'outright'){

		payable = property_cost;
		

	}else if(plan == 'bnpl'){

		bnpl_payable = $('#bnpl-payable').val();

		payable = bnpl_payable;

	}/*else if(plan == 'onpl'){

		onpl_payable = $('#onpl-payable').val();

		payable = onpl_payable;

	}*/	

	if(plan == 'champ' || plan == 'btl-standard'){
		payment_period = $('#btl-repayment-period').val();
	}
	
	if(pool_check == 'yes'){
	    
	    repayment_val = $('.pool-total-cost').val();
	    
	    payable = $('.pool-total-cost').val();
	    
    	unit_amount = $('.unit-amount').val();
    	
    	total_pool_units = $('.pool_units').val();
	    
	    plan = "poolbuy";
	}
	
	if(plan != 'finance'){
		
		payment_period = 0;
		
	}
	
	if(localStorage.getItem('buytolet_basket') === null){
		var newBasket = {

						"paymentPlan" : plan,

						"property_id" : propertyID,

						"property_name" : property_name,

						"cost"        : repayment_val,
			
						"payable"     : payable,
			
						"method"      : '',
			
						"property_cost" : property_cost,
			
						"payment_period" : payment_period,
						
						"unit_amount" : unit_amount,
						
						"promo_price" : promo,
						
						"promo_type" : promo_type,
						
						"promo_code" : promo_code,

						"origination_fee": origination_fee,

						"transaction_fee": transaction_fee,

						"down_payment" : down_payment,
						
						"balance" : balance,
						
						"purchase_frequency" : purchase_frequency,
						
						"duration" : duration,

						"percentage_value" : percentage_value,

						"personal_details" : [],

						"employment_details" : []

				   };

		window.localStorage.setItem('buytolet_basket', JSON.stringify(newBasket));	
		
	}else{
		
		//Get all cart products

		var order = JSON.parse(localStorage.getItem('buytolet_basket'));

		order.paymentPlan = plan;
		
		order.property_id = propertyID;

		order.property_name = property_name;
		
		order.cost = repayment_val;
		
		order.payable = payable;
			
		order.payment_period = payment_period,
		
		order.property_cost = property_cost;
						
		order.unit_amount = unit_amount,
		
		order.promo_price = promo;
		
		order.promo_type = promo_type;

		order.transaction_fee = transaction_fee;

		order.origination_fee = origination_fee;

		order.down_payment = down_payment;
		
		order.balance = balance;
		
		order.promo_code = '';
		
		order.method = '';
						
		order.purchase_frequency = purchase_frequency;

		order.percentage_value = percentage_value;
		
		order.duration = duration;

		//local storage
		window.localStorage.setItem('buytolet_basket', JSON.stringify(order));	
		
		
	}
	
	//redirect to finance form page	
	window.location.href = baseUrl+"personal-info";

});

$('#financeBasicInformation').submit(function(e){
    
    e.preventDefault();
    
    $('.finance-form-btns').html("Wait...");

	var firstname = $.trim($("#fname").val());
	
	var lastname = $.trim($("#lname").val());
	
	var email = $.trim($("#email").val());
	
	var phone = $.trim($("#phone").val());
	
	var bvn = 0;//$.trim($("#bvn").val());
	
	var dateOfBirth = $("#dob").val();
	
	var marital_status = $(".marital_status").val();
	
	var residential_address = $.trim($("#residential_address").val());
	
	var filteredList = []; 
	
	//Check for empty fields

	filteredList = $('.verify-txt').filter(function(){

		return $(this).val() === "";

	});

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.verify-txt').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");
		
		alert('Fill required fields');
		
		$('.finance-form-btns').html("Proceed");

		return false;

	}
	
	var order = JSON.parse(localStorage.getItem('buytolet_basket'));
	
	if(order.personal_details.length > 0){

		 order.personal_details.length = 0;

	}
	
	var personalDetails = {"firstname": firstname, "lastname" : lastname, "email" : email, "phone" : phone, "bvn" : bvn, "dateOfBirth" : dateOfBirth, "marital_status" : marital_status, "residential_address" : residential_address};	

	order.personal_details.push(personalDetails);
	
	window.localStorage.setItem('buytolet_basket', JSON.stringify(order));
	
	window.location.href = baseUrl+"employment-info";
    
});

$('#financeEmploymentInformation').submit(function(e){
    
    e.preventDefault();
    
    $('.finance-form-btns').html("Wait...");

	var occupation = $.trim($("#occupation").val());
	
	var position = $.trim($("#position").val());
	
	var companyName = $.trim($("#company_name").val());

	var income_range = $.trim($("#income").val());
	
	var company_address = $.trim($("#company_address").val());
	
	var filteredList = []; 
	
	//Check for empty fields

	filteredList = $('.verify-txt').filter(function(){

		return $(this).val() === "";

	});

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.verify-txt').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");
		
		alert('Fill required fields');
		
		$('.finance-form-btns').html("Proceed");

		return false;

	}
	
	var order = JSON.parse(localStorage.getItem('buytolet_basket'));
	
	if(order.employment_details.length > 0){

		 order.employment_details.length = 0;

	}
	
	var employmentDetails = {"occupation": occupation, "position" : position, "company_name" : companyName, "income_range" : income_range, "company_address" : company_address};	

	order.employment_details.push(employmentDetails);
	
	window.localStorage.setItem('buytolet_basket', JSON.stringify(order));
	
	window.location.href = baseUrl+"upload-info";
    
});

$('#uploadForm').submit(function(e){
    
    e.preventDefault();
	
	var order = JSON.parse(localStorage.getItem('buytolet_basket'));
    
    if(!$('#agreement').is(":checked")){

		alert("You need to agree to our Terms and Conditions to proceed");
		
        return false;

	}

	if(order.paymentPlan == 'bnpl' && $('#onpl-agreement').prop("checked") != true){

		alert("You need to agree to the BNPL Terms and Conditions to proceed");

        return false;

	}
    
	var statement_state = $('#statement-state').val();
	
	var id_state = $('#id-state').val();
	
	if(statement_state == 0 || id_state == 0){

		alert('You need to upload a bank statement and valid ID card');
		
		$('.finance-form-btn').html("Proceed");

		return false;
	}
	
	var statement_path = $('#statement').val();	

	var id_path = $('#idcard').val();
	
	var data = {"balance" : order.balance, "payment_plan" : order.paymentPlan, "property_id" : order.property_id, "cost" : order.cost, "payable" : order.payable, "method_of_payment" : "paystack", "payment_period" : order.payment_period, "promo_code" : order.promo_code, "id_path" : id_path, "statement_path" : statement_path, "personal_details" : order.personal_details, "employment_details" : order.employment_details};
	
	$.ajaxSetup ({ cache: false });
	$.ajax({			

		url: baseUrl+"buytolet/insertRequest/",

		type: "POST",

		data: data,

		success: function(data){

			if(data == 1){
				
				window.location.href = baseUrl+"finance-confirmation";

				$('.finance-form-btns').html("Proceed");
				
				return false;

			}else{

				alert("Error!!!"); 

				$('.finance-form-btns').html("Proceed");

				return false;

			}				

		},
		
		error: function(){
			
			$('.finance-form-btn').val("Finish");
			
			return false;
			
		}

	});
       
});

$('#financeForm').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	$('.finance-form-btn').val("Wait...");

	var firstname = $.trim($("#firstname").val());
	
	var lastname = $.trim($("#lastname").val());
	
	var email = $.trim($("#email").val());
	
	var phone = $.trim($("#phone").val());
	
	var occupation = $.trim($("#occupation").val());
	
	var position = $.trim($("#position").val());
	
	var companyName = $.trim($("#company").val());

	var income_range = $.trim($("#income-range").val());
	
	var company_address = $.trim($(".address").val());
	
	var statement_state = $('#statement-state').val();
	
	var id_state = $('#id-state').val();
	
	var filteredList = []; 
	
	//Check for empty fields

	filteredList = $('.verify-txt').filter(function(){

		return $(this).val() === "";

	});

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.verify-txt').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");

		//$('.form-report').html("Fields in red are mandatory fields");

		//$('.form-report').css("background", "red");

		//$('.form-report').show();

		window.scrollTo(0,100);
		
		$('.finance-form-btn').val("Finish");

		return false;

	}
	
	if(!(statement_state) || !(id_state)){

		alert('You need to upload a bank statement and valid ID card');
		
		$('.finance-form-btn').val("Finish");

		return false;
	}

	var statement_path = $('#statement').val();	

	var id_path = $('#idcard').val();

	//var order = JSON.parse(localStorage.getItem('buytolet_basket'));
	
	//var customerDetails = {"firstname": firstname, "lastname" : lastname, "email" : email, "phone" : phone, "occupation" : occupation, "position" : position, "companyName" : companyName, "income_range" : income_range, "company_address" : company_address, "statement_path" : statement_path, "id_path" : id_path};	

	//order.finance_form_details.push(customerDetails);
	
	//window.localStorage.setItem('buytolet_basket', JSON.stringify(order));
	var order = JSON.parse(localStorage.getItem('buytolet_basket'));
	
	var data = {"payment_plan" : order.paymentPlan, "property_id" : order.property_id, "cost" : order.cost, "firstname" : firstname, "lastname" : lastname, "email" : email, "phone" : phone, "companyName" : companyName, "position" : position, "occupation" : occupation, "income_range" : income_range, "company_address" : company_address, "payable" : order.payable, "method_of_payment" : "paystack", "payment_period" : order.payment_period, "promo_code" : order.promo_code, "id_path" : id_path, "statement_path" : statement_path};
	
	$.ajaxSetup ({ cache: false });
	$.ajax({			

		url: baseUrl+"buytolet/insertRequest/",

		type: "POST",

		data: data,

		success: function(data){

			if(data == 1){
				
				//window.localStorage.removeItem('buytolet_basket');
	
				//window.location.href = baseUrl+"final";
				
				window.location.href = baseUrl+"finance-confirmation";

				$('.finance-form-btn').val("Finish");
				
				return false;

			}else{

				alert("Error!!!"); 

				$('.finance-form-btn').val("Finish");

				return false;

			}				

		},
		
		error: function(){
			
			$('.finance-form-btn').val("Finish");
			
			return false;
			
		}

	});
	
	//return false;	
	
});

$('#buyerForm').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	$('.buyer-form-btn').val("Wait...");

	var firstname = $.trim($("#firstname").val());
	
	var lastname = $.trim($("#lastnamename").val());
	
	var email = $.trim($("#email").val());
	
	var phone = $.trim($("#phone").val());
	
	var occupation = $.trim($("#occupation").val());
	
	var position = $.trim($("#position").val());
	
	var companyName = $.trim($("#company").val());

	var income_range = $.trim($("#income-range").val());
	
	var company_address = $.trim($(".company_address").val());
	
	

	var order = JSON.parse(localStorage.getItem('buytolet_basket'));
	
	var customerDetails = {"firstname": firstname, "lastname" : lastname, "email" : email, "phone" : phone, "occupation" : occupation, "position" : position, "companyName" : companyName, "income_range" : income_range, "company_address" : company_address};	

	//Send details to DB

	order.finance_form_details.push(customerDetails);
	
	window.localStorage.setItem('buytolet_basket', JSON.stringify(order));	
	
	window.location.href = baseUrl+"thank-you";
	
	return false;	
	
});

$('.recalculate-but').click(function(){	
	"use strict";
	
	$(this).html("Recalculating...");
	
	var promo_code = $('.promo-code').val();
	
	var promo_val = 0;
	
	var new_price = 0;
	
	if(!promo_code){
	    
	    $('.promo-code').css('border', '1px solid red');
	    
	    $('.recalculate-but').html('Recalculate');
	    
	    return false;
	    
	}
	
	var data = {"promocode" : promo_code};
	
	//Check promo code
	$.ajaxSetup ({ cache: false });
	$.ajax({			

		url: baseUrl+"buytolet/confirmCode/",

		type: "POST",

		data: data,

		dataType : 'json',

		success: function(data){

			if(data.result == 'success'){
                
                var order = JSON.parse(localStorage.getItem('buytolet_basket'));
                
                promo_val = data.msg / 100;
                
                order.promo_code = promo_code;
                
                order.payable = order.payable - (order.payable * promo_val);
                
                order.promo_price = order.promo_price - (order.promo_price * promo_val);
                
                window.localStorage.setItem('buytolet_basket', JSON.stringify(order));
                
                location.reload(true);

			}else{

				alert("Promo code not valid");
				
				$('.recalculate-but').html('Recalculate');
				
				return false;

			}				

		},
		
		error: function(){
		    
		    alert("Error!");
			
			$('.recalculate-but').html('Recalculate');
			
			return false;
			
		}

	});
	
});

$('.co-own-option-but').click(function(){
    
    var purchase_beneficiary = $('#purchase-beneficiary').val();
    
    var payable_amount = $('#co-own-payable').val();
    
    var shares_amount = $('#co-own-shares-amount').val();
    
    var property_id = $('#property_id').val();
    
    var property_cost = $('#property-cost').val();
    
    var share_cost = $('#share-cost').val();
    
    var remaining_shares = $('#current_num_of_shares').val();
    
    var userID = $('#userID').val();
    
    var t_option = parseInt($('#target-option').val());
    
    if(!(userID)){
        
        alert('You will be redirected to login/signup to proceed.');
        
	    window.location.href = baseUrl+"login";
        
        return false;
        
    }
    
    if(localStorage.getItem('co_own_basket') === null){
		var newBasket = {

						"purchase_beneficiary" : purchase_beneficiary,

						"payable_amount" : payable_amount,

						"shares_amount" : shares_amount,
						
						"property_id" : property_id,
						
						"property_cost" : property_cost,
						
						"share_cost" : share_cost,
						
						"purchase_frequency" : '',

						"plan_amount" : 0,
						
						"duration" : '',
						
						"remaining_shares" : remaining_shares

				   };

		window.localStorage.setItem('co_own_basket', JSON.stringify(newBasket));	
		
	}else{
		
		//Get all cart products
		
		localStorage.clear();
		
		var newBasket = {

						"purchase_beneficiary" : purchase_beneficiary,

						"payable_amount" : payable_amount,

						"shares_amount" : shares_amount,
						
						"property_id" : property_id,
						
						"property_cost" : property_cost,
						
						"share_cost" : share_cost,
						
						"purchase_frequency" : '',

						"plan_amount" : 0,
						
						"duration" : '',
						
						"remaining_shares" : remaining_shares

				   };

		window.localStorage.setItem('co_own_basket', JSON.stringify(newBasket));
		
	}
	
	//console.log("Error doesnt seem to afftect anything");
	//redirect to co own form page
	//if(t_option){
	    //window.location.href = baseUrl+"co-own-form";
	//}else{
	    window.location.href = baseUrl+"co-own-application";
	//}
	
});
$('.target-option').change(function() {
    if ($(this).is(':checked')) {
        //Display dropdown box
        $('.user-target-options').show();
    } else {
        //Hide dropdown box
        $('.user-target-options').hide();
    }
});
$('#targetProgramForm').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	var filteredList = [];
	
	var new_payable = 0;
	
	var new_total = 0;
	
	var new_percentage = 0;
	
	if($('.target-option').is(':checked')){
	    
    	//Check for empty fields
    	filteredList = $('.verify-txt').filter(function(){
    
    		return $(this).val() === "";
    
    	});
    
    	//Do something about the empty fields
    	if(filteredList.length > 0){
    	    
    	    alert("Please select options from below");
    
    		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");
    		
    		$('.co-own-form-btn').val("Proceed");
    
    		return false;
    
    	}
    	var co_own_order = JSON.parse(localStorage.getItem('co_own_basket'));
    	
    	var total_shares = parseInt($('#unit-amount').val());
    	
    	if(total_shares < 5){
    	    
    	    alert("You need to buy up to 5 or more shares to subscribe");
    	    
    	    return false;
    	    
    	}else{
    	    
    	    co_own_order.shares_amount = total_shares;
    	    
    	    new_total = total_shares * co_own_order.share_cost;
    	    
    	    new_percentage = new_total * 0.1;
    	    
    	    new_payable = parseInt(new_percentage) + parseInt(new_total);
    	    
    	    co_own_order.payable_amount = new_payable;
    	    
    	    
    	}

		co_own_order.plan_amount = $("#plan-amount").val();

    	co_own_order.purchase_frequency = $("#purchase-frequency").val();
    	
    	co_own_order.duration = $("#duration").val();
    	
		window.localStorage.setItem('co_own_basket', JSON.stringify(co_own_order));
	}
	
    window.location.href = baseUrl+"co-own-form";	
	
});

$('#coOwnForm').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	$('.co-own-form-btn').val("Wait...");
	
	var user_info = parseInt($('#user-info').val());
	
	var id_state = '';
	
	var filteredList = [];
	
	var filteredBenList = [];
	
	var ben_first_name = $('input[name="beneficiary-firstname[]"]');
	
	var ben_last_name = $('input[name="beneficiary-lastname[]"]');
	
	var ben_email = $('input[name="beneficiary-email[]"]');
	
	var ben_phone = $('input[name="beneficiary-phone[]"]');
	
	var ben_shares = $('input[name="beneficiary-shares[]"]');
	
	var co_own_order = JSON.parse(localStorage.getItem('co_own_basket'));
	
	if(!(user_info)){
	    
	    id_state = $('#id-state').val();
	    
	}
	
	//Check for empty fields
	filteredList = $('.verify-txt').filter(function(){

		return $(this).val() === "";

	});

	//Do something about the empty fields
	if(filteredList.length > 0){

		$('.verify-txt').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");

		window.scrollTo(0,100);
		
		$('.co-own-form-btn').val("Proceed");

		return false;

	}
	
	if(!(id_state) && !(user_info)){

		alert('You need to upload a valid ID card');
		
		$('.co-own-form-btn').val("Proceed");

		return false;
	}
	
	//Check if user needs to add abeneficiary
	if(co_own_order.purchase_beneficiary != 'Self'){
	    
	    //Check for empty fields
    	filteredBenList = $('.verify-ben-txt').filter(function(){
    
    		return $(this).val() === "";
    
    	});
    
    	//Do something about the empty fields
    	if(filteredBenList.length > 0){
    
    		$('.verify-ben-txt').css("border","1px solid #CCC");
    
    		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");
    
    		alert('You need to enter beneficiary details to proceed');
    		
    		$('.co-own-form-btn').val("Proceed");
    
    		return false;
    
    	}
    	
    	var ben_shares_list = $('input[name="beneficiary-shares[]"]').map(function(){return $(this).val();}).get();
	
    	//Sum up all the unit shares
    	var ben_shares_total = ben_shares_list.reduce((a, b) => parseInt(a) + parseInt(b), 0);
    	
    	if(ben_shares_total > co_own_order.shares_amount){
	    
    	    alert('You have allocated more than available shares');
    	    
    	    return false;
    	}
	    
	    //Get value for beneficiary
	    //beneficiary_id_path = $('#idcard2').val();
	    
	}

	var data = $(this).serialize();
	
	$.ajaxSetup ({ cache: false });
	$.ajax({			

		url: baseUrl+"buytolet/insertCoOwnRequest/",

		type: "POST",

		data: data,

		success: function(data){

			if(data == 1){
				
				//window.localStorage.removeItem('co_own_basket');
	
				//window.location.href = baseUrl+"final";
				
				window.location.href = baseUrl+"co-own-confirmation";

				$('.co-own-form-btn').val("Proceed");
				
				return false;

			}else{

				alert("Error!!!"); 

				$('.co-own-form-btn').val("Proceed");

				return false;

			}				

		},
		
		error: function(){
			
			$('.finance-form-btn').val("Proceed");
			
			return false;
			
		}

	});
	
	//return false;	
	
});

/*$('#confirmationForm').click(function(){
	
	"use strict";
	
	$('.doc-submit-btn').html("Wait...");

	var statement_state = $('#statement-state').val();

	var id_state = $('#id-state').val();

	if(!(statement_state) || !(id_state)){

		alert('You need to upload a bank statement and valid ID card');

		return false;
	}

	var statement_path = $('#statement').val();	

	var id_path = $('#idcard').val();

	var userID = $('#userID').val();

	var order = JSON.parse(localStorage.getItem('buytolet_basket'));	
	
	var data = {"payment_plan" : order.paymentPlan, "property_id" : order.property_id, "cost" : order.cost, "firstname" : order.finance_form_details[0].firstname, "lastname" : order.finance_form_details[0].lastname, "email" : order.finance_form_details[0].email, "phone" : order.finance_form_details[0].phone, "companyName" : order.finance_form_details[0].companyName, "position" : order.finance_form_details[0].position, "occupation" : order.finance_form_details[0].occupation, "income_range" : order.finance_form_details[0].income_range, "company_address" : order.marketplace_fee[0].company_address, "payable" : order.payable, "method_of_payment" : "transfer", "payment_period" : order.payment_period, "promo_code" : order.promo_code};
	
	$.ajaxSetup ({ cache: false });
	$.ajax({			

		url: baseUrl+"buytolet/insertRequest/",

		type: "POST",

		data: data,

		success: function(data){

			if(data == 1){
				
				window.localStorage.removeItem('buytolet_basket');
	
				window.location.href = baseUrl+"final";

				$('.doc-submit-btn').html("Finish");
				
				return false;

			}else{

				alert("Error!!!"); 

				$('.doc-submit-btn').html("Finish");

				return false;

			}				

		},
		
		error: function(){
			
			$('.verify-but').html("Next");
			return false;
			
		}

	});
	
});*/
