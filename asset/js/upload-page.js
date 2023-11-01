$(document).ready(function(){
    
    var baseUrl = 'https://dev-buy.smallsmall.com/';
    
    $('#back__btn').click(function(e){
        
        window.location.href = baseUrl+"employment-info";
        
    });

    var order = JSON.parse(localStorage.getItem('buytolet_basket'));

	if(order.paymentPlan == 'bnpl' || order.paymentPlan == 'onpl'){		
		$('#the-form-title').html('Lockdown Form');
        $('#finance-form-elem').hide();
        $('#statement-state').val(1);        
        $('#statement').val('https://buy.smallsmall.com/');
        $('#agreement').html('I have read the <a href="'+baseUrl+'bnpl-terms-and-conditions" target="_blank">BNPL Terms and Condition.</a>');
        $('#add-onpl-agreement').show();
	}
    
});