$(document).ready(function(){
    
    var baseUrl = "https://buy.smallsmall.com/";
    
    $('#giftBasket').submit(function(e){
        e.preventDefault();
        
        $('#giftBut').html('Sending...');
        
        var gift_amount = parseInt($('#gift_amount').val());
        
        var user_shares = $('#user_shares').val();
        
        var request_id = $('#request_id').val();
        
        var property_id = $('#property_id').val();
        
        if(gift_amount < 1 || gift_amount == '' || gift_amount > user_shares || isNaN(gift_amount)){
            
            $('#gift_amount').css('border', '1px solid red');
            
            alert('Enter a valid amount ('+gift_amount+')');
            
            $('#giftBut').html('Send gift');
            
            return false;
            
        }
        
        var data = {"gift_amount" : gift_amount, "user_shares" : user_shares, "request_id" : request_id, "property_id" : property_id};
        
        $.ajaxSetup ({ cache: false });

    	$.ajax({
    
    		url: baseUrl+"giftbasket/move_to_gift_bag",
    
    		type: "POST",
    
    		dataType: "json",
    
    		data: data,
    
    		success: function(data) {
    
    			if(data.result == 'success'){
    				
    				location.reload();
    				
    			}else{
    			    
    			    alert('Error: '+data.msg);
    			    
    			    $('#giftBut').html('Send gift');
    
    				return false;
    
    			}
    
    		}
    
    	});
    });
    
    $('#giftSending').submit(function(e){
        
        e.preventDefault();
        
        if(!(parseInt($('#unlock-shares').val()))){
        
            $('#gift-send-but').html('Sending...');
            
            var filteredList = []; 
    	
        	    //Check for empty fields
        
        	    filteredList = $('.verify-txt').filter(function(){
        
        		return $(this).val() === "";
        
        	});
        	
        	if(filteredList.length > 0){
    
        		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");
        		    
        		$('.error-report').html('All fields are mandatory');
        		        
    	        $('.error-report').css('background', 'red');
    	        
    	        $('.error-report').css('display', 'block');
    	        
    	        $('#gift-send-but').html('Send');
        		
        		setTimeout( function(){
        		    
        		    $('.error-report').css('display', 'none');
        		    
        		    filteredList.css("border","1px solid #ced4da");
        		    
        		}, 3000);
        
        		return false;
        	}
        }

        var data = $(this).serializeArray();
        
        $.ajaxSetup ({ cache: false });

    	$.ajax({
    
    		url: baseUrl+"user/send_user_gift",
    
    		type: "POST",

		    dataType : 'json',
    
    		data: data,
    
    		success: function(data) {
    		    
    		    if(data.result == 'success' && parseInt(data.lock_status) === 1){
    		        
    		        $('.error-report').html('Unlocked!!! Page will refresh in 3 Secs.');
    		        
    		        $('.error-report').css('background', 'green');
    		        
    		        $('.error-report').css('display', 'block');
    		        
    		        setTimeout( function(){
    		    
            		    $('.error-report').css('display', 'none');
            		    
            		    location.reload();
            		    
            		}, 3000);
    		        
    		        
    		    }else if(data.result == 'success'){
    		        
    		        $('.error-report').html('Gift successfully sent.');
    		        
    		        $('.error-report').css('background', 'green');
    		        
    		        $('.error-report').css('display', 'block');
    		        
    		        $('#gift-send-but').html('Send');
    		        
    		        $('.verify-txt').val('');
    		        
    		        setTimeout( function(){
    		    
            		    $('.error-report').css('display', 'none');
            		    
            		}, 3000);
    				
    				
    			}else{
    		        
    		        $('.error-report').html('Error: '+data.msg);
    		        
    		        $('.error-report').css('background', 'red');
    		        
    		        $('.error-report').css('display', 'block');
    		        
    		        setTimeout( function(){
    		    
            		    $('.error-report').css('display', 'none');
            		    
            		}, 3000);
    		        
    		        $('#gift-send-but').html('Send');
    
    			}
    
    		}
    
    	});
    });
    
    $('#transferShares').submit(function(e){
        
        e.preventDefault();
        
        $('#transfer-but').html('Transferring...');
        
        var fname = $('#firstname').val();
        
        var lname = $('#lastname').val();
        
        var email = $('#email').val();
        
        var phone = $('#phone').val();
        
        var transfer_shares = $('#transfer_shares').val();
        
        var user_shares = $('#user_shares').val();
        
        var shares_spent = $('#user_shares_spent').val();
        
        var property_id = $('#property_id').val();
        
        var request_id = $('#request_id').val();
        
        var filteredList = []; 
	
    	//Check for empty fields
    
    	filteredList = $('.verify-txt').filter(function(){
    
    		return $(this).val() === "";
    
    	});
    	
    	if(filteredList.length > 0){

    		filteredList.css("border","1px solid rgba(251, 0, 0, 0.8)");
    		
    		alert('Fill all fields');
	        
	        $('#transfer-but').html('Transfer');
    		
    		setTimeout( function(){
    		    
    		    filteredList.css("border","1px solid #ced4da");
    		    
    		}, 3000);
    
    		return false;
    	}
        var data = {"firstname" : fname, "lname" : lastname, "email" : email, "phone" : phone, "transfer_shares" : transfer_shares, "user_shares" : user_shares, "shares_spent" : shares_spent, "propertyID" : property_id, "requestID" : request_id};
        //var data = $(this).serializeArray();
        
        $.ajaxSetup ({ cache: false });

    	$.ajax({
    
    		url: baseUrl+"user/transfer_to_user",
    
    		type: "POST",

		    dataType : 'json',
    
    		data: data,
    
    		success: function(data) {
    
    			if(data.result == 'success'){
    			    
    			    alert('Successfully transferred');
    		        
    		        $('#transfer-but').html('Transfer');
    		        
    		        $('.verify-txt').val('');
    		        
    			}else{
    		        
    		        alert('Error: '+data.msg);
    		        
    		        $('#transfer-but').html('Transfer');
    
    			}
    
    		}
    
    	});
    });
    
    
});