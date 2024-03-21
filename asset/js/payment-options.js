$('#mortgage-finance-option').click(function(){
    //Close all other options
    $('.payment-boxes').hide();

    $('.mortgage-finance-payment').show();

    $('#option-but').val('finance');
});

$('#outright-option').click(function(){
    //Close all other options
    $('.payment-boxes').hide();

    $('.outright-payment').show();

    $('#option-but').val('outright');
});

$('.payment-option').on('change', function(){
    
    var option = $('#payment-option').val(); 
    
    if(option == 'finance'){
        
        //Close all other options
        $('.payment-boxes').hide();
    
        $('.mortgage-finance-payment').show();
    
        $('#option-but').val('finance');
        
    }else if(option == 'outright'){
        
        //Close all other options
        $('.payment-boxes').hide();
    
        $('.outright-payment').show();
    
        $('#option-but').val('outright');
        
    }else if(option == 'champ'){        

        //Close all other options
        $('.payment-boxes').hide();    

        $('.champ-payment').show();    

        $('#option-but').val('champ'); 

    }else if(option == 'standard-btl'){        

        //Close all other options
        $('.payment-boxes').hide();    

        $('.mortgage-finance-payment').show();    

        $('#option-but').val('standard-btl'); 

    }
});