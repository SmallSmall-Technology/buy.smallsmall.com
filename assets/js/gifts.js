$(document).ready(function(){
    
    var baseUrl = 'https://buy.smallsmall.com/';
    
    $('.accept-shares').click(function(){
        
        var ids = $(this).attr('id').replace(/accept-shares-/, '');
        
        var id = ids.split('-');
        
        var req_id = id[0];
        
        var row_id = id[1];
        
        //alert('Request id: '+req_id+' Row id: '+row_id);
        
        //return false;
        
        $('#accept-shares-'+ids).html('Wait...');
        
        var data = {"request_id" : req_id, "id" : row_id, "request" : "owned"};
        
        $.ajaxSetup ({ cache: false });

    	$.ajax({
    
    		url: baseUrl+"giftbasket/change_gift_status",
    
    		type: "POST",
    
    		dataType: "json",
    
    		data: data,
    
    		success: function(data) {
    
    			if(data.result == 'success'){
    			    
    			    alert("Successfully changed");
    				
    				location.reload();
    				
    			}else{
    			    
    			    alert('Error: '+data.msg);
    			    
    			    $('#accept-shares-'+ids).html('Accept');
    
    				return false;
    
    			}
    
    		}
    
    	});
        
    });
    
    $('.reject-shares').click(function(){
        
        var ids = $(this).attr('id').replace(/reject-shares-/, '');
        
        var id = ids.split('-');
        
        var req_id = id[0];
        
        var row_id = id[1];
        
        $('#reject-shares-'+ids).html('Wait...');
        
        var data = {"request_id" : req_id, "id" : row_id, "request" : "rejected"};
        
        $.ajaxSetup ({ cache: false });

    	$.ajax({
    
    		url: baseUrl+"giftbasket/change_gift_status",
    
    		type: "POST",
    
    		dataType: "json",
    
    		data: data,
    
    		success: function(data) {
    
    			if(data.result == 'success'){
    			    
    			    alert("Successfully changed");
    				
    				location.reload();
    				
    			}else{
    			    
    			    alert('Error: '+data.msg);
    			    
    			    $('#reject-shares-'+ids).html('Reject');
    
    				return false;
    
    			}
    
    		}
    
    	});
        
    });
    
});