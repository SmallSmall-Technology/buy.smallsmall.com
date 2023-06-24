$(document).ready(function(){
    
    var co_own_order = JSON.parse(localStorage.getItem('co_own_basket'));

    //Populate necessary fields
    
    $('#shares-amount').html(co_own_order.shares_amount); 
    
    $("#unit-amount").attr({
        
       //"max" : 10,
       
       "min" : co_own_order.shares_amount,
       
       "value" : co_own_order.shares_amount
       
    });
});