$(document).ready(function(){
    
    var baseUrl = 'https://buy.smallsmall.com/';
    
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
	}else if(order.paymentPlan == 'buy-2-let' || order.paymentPlan == 'standard-btl' || order.paymentPlan == 'champ'){
        $('#finance-form-elem').hide();
        $('#statement-state').val(1);        
        $('#statement').val('https://buy.smallsmall.com/');
        $('#agreement').html('I have read the <a href="'+baseUrl+'#" target="_blank">Buy2Let Terms and Condition.</a>');
        $('#add-onpl-agreement').hide();
    }
    
});