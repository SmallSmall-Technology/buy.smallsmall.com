$(document).ready(function(){   

    var slider = document.getElementById("myChampRange");

    var output = document.getElementById("champ-demo");

    var down_payment_output = document.getElementById("champ-down-payment");

    var payment = document.getElementById("payment");

    var total_cost = parseInt(document.getElementById("total-cost").value);

    var finance_payment = document.getElementById('finance-payment');

    var total_cost = parseInt(document.getElementById("total-cost").value);

    var one_percent = document.getElementById("one-percent").value;

    var four_percent = document.getElementById("four-percent").value;

    //var total_output = document.getElementById("standard-total-output");

    var total_price = 0;

    var percentage_val = 0;

    output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(slider.value);

    down_payment_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(slider.value);

    //total_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(total_price);

    slider.oninput = function() {

        percentage_val = ((slider.value * 100) / total_cost);        

        //Insert percentage in div
        $('.champ-percentage-container').html(percentage_val + "%");

        if(percentage_val == 20){
            $('#champ-alt-mortgage-period').html(18 + ' Years');
            $('#btl-repayment-period').val(18);
        }else if(percentage_val == 30){
            $('#champ-alt-mortgage-period').html(15 + ' Years');
            $('#btl-repayment-period').val('15');
        }else if(percentage_val == 40){
            $('#champ-alt-mortgage-period').html(12 + ' Years');
            $('#btl-repayment-period').val(12);
        }else if(percentage_val == 50){
            $('#champ-alt-mortgage-period').html(10 + ' Years');
            $('#btl-repayment-period').val(10);
        }

        

        $('#percentage-value').val(percentage_val);

        total_price = parseInt(this.value);

        var pplan = $(".payment-plan-option").val();

        output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(this.value);

        down_payment_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(this.value);

        //total_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(total_price);

        payment.value = this.value;

        finance_payment.value = total_price;

        //var payment_period = $(".repayment-duration").val();

    }

});