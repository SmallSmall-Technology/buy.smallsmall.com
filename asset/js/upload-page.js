$(document).ready(function(){
    
    var baseUrl = 'https://buy.smallsmall.com/';
    
    $('#back__btn').click(function(e){
        
        window.location.href = baseUrl+"employment-info";
        
    });

    var order = JSON.parse(localStorage.getItem('buytolet_basket'));

	if(order.paymentPlan == 'onpl'){		
		$('#the-form-title').html('Lockdown Form');
        $('#finance-form-elem').hide();
        $('#statement-state').val(1);        
        $('#statement').val('https://buy.smallsmall.com/');
        $('#agreement').html('I have read the <a href="'+baseUrl+'faq" target="_blank">ONPL Terms and Condition.</a>');
        $('#add-onpl-agreement').show();
	}
    
});