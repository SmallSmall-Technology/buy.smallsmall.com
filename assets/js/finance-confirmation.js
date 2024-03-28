$(document).ready(function(){

    var order = JSON.parse(localStorage.getItem('buytolet_basket'));
    
    var balance_percentage = (order.balance * 100) / order.property_cost;

    var transaction_fee = order.transaction_fee;

    var due_amount = order.origination_fee;

    if(order.paymentPlan == 'bnpl'){

        $('#summary-header').html('Lockdown Summary');

        $('#summary-sub-head').html('Payment Information');

        $('.finance-spc').hide();

        $('#payment-txt').html('Click the finish button to submit and pay now');

        $('#summary-desc').html('Lockdown Fee');

        transaction_fee = order.payable;

        due_amount = order.payable;

    }else if(order.paymentPlan == 'buy-2-let'){

        $('#other-finance-confirmation').hide();

        $('#buytolet-confirmation').show();

        $('#cta-info').html('Pay transaction fee now to secure the unit');

        $('#deposit-amount').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(order.down_payment));

        $('#btl-transaction-fee').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(transaction_fee));

        $('#btl-amount-due').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(parseInt(transaction_fee) + parseInt(order.down_payment)));

        $('#alt-mortgage-period').html(order.payment_period+" Months");

        $('#deposit-percentage').html(balance_percentage+"%");

    }
    
    $('#total-amount-payable').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(order.payable));
    
    $('#actual-percentage').html(balance_percentage+"%");
    
    //$('#property-cost').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(order.property_cost));

    $('#property-cost').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(order.balance));
    
    $('#transaction-fee').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(transaction_fee));

    $('#originating-fee').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(order.origination_fee));

    $('#down-payment').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(order.down_payment));
    
    $('#payment-tenor').html(order.payment_period+" year");
    
    var payment = parseInt(order.transaction_fee) + parseInt(order.origination_fee);
    
    $('#due_amount').val(due_amount);
    
    $('#payment-output').html("<span style='font-family:helvetica;'>&#x20A6;</span>"+numberWithCommas(due_amount));
    
    $('#full-name').html(order.personal_details[0]['firstname']+' '+order.personal_details[0]['lastname']);
    
    $('#bvn').html(order.personal_details[0]['bvn']);
    
    $('#email-address').html(order.personal_details[0]['email']);
    
    $('#phone-number').html(order.personal_details[0]['phone']);
    
    $('#marital-status').html(order.personal_details[0]['marital_status']);
    
    $('#dob').html(order.personal_details[0]['dateOfBirth']);
    
    $('#home-address').html(order.personal_details[0]['residential_address']);
    
    $('#occupation').html(order.employment_details[0]['occupation']);
    
    $('#net-income').html(order.employment_details[0]['income_range']);
    
    $('#position').html(order.employment_details[0]['position']);
    
    $('#company-name').html(order.employment_details[0]['company_name']);
    
    $('#company-address').html(order.employment_details[0]['company_address']);

    var data = {"prop_id" : order.property_id};
	
	//Check promo code
	$.ajaxSetup ({ cache: false });
	$.ajax({			

		url: baseUrl+"buytolet/getProperty/",

		type: "POST",

		data: data,

		dataType : 'json',

		success: function(data){

			if(data.result == 'success'){
                //console.log(data.details);
                $('#prop-title').html(data.details['property_name']);
                $('#prop-address').html(data.details['address']+', '+data.details['city']+'.');
                $('#bed-bath').html(data.details['bed']+'Bedroom '+data.details['bath']+'Bathroom');
                $('#prop-size').html(data.details['property_size']+' sqm');
			}else{

			}				

		}

	});

    
    
});
function numberWithCommas(x) {

    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}
