$(document).ready(function(){

    var slider = document.getElementById("myRange");

    var output = document.getElementById("demo");

    var down_payment_output = document.getElementById("down-payment");

    var payment = document.getElementById("payment");

    var finance_payment = document.getElementById('finance-payment');

    var total_cost = parseInt(document.getElementById("total-cost").value);

    var expected_rent = document.getElementById("expected-rent").value;

    var tooltip = document.getElementById('pp-tooltip');

    var one_percent = document.getElementById("one-percent").value;

    var four_percent = document.getElementById("four-percent").value;

    var fourty_five_percent = document.getElementById("fourty-five-percent").value;

    var seventy_five_percent = document.getElementById("seventy-five-percent").value;

    var ninety_five_percent = document.getElementById("ninety-five-percent").value;

    var total_output = document.getElementById("total-output");

    var developerPlan = document.getElementById("developer-plan");

    var mortgagePlan = document.getElementById("mortgage-plan");

    var selfFinance = document.getElementById("self-finance");

    var pplan_minimum = document.getElementById("payment-plan-minimum").value;

    var total_price = 0;

    var percentage_val = 0;

    total_price = (total_cost * pplan_minimum) + parseInt(one_percent) + parseInt(four_percent);

    output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(slider.value);

    down_payment_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(slider.value);

    total_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(total_price);

    slider.oninput = function() {

        percentage_val = ((slider.value * 100) / total_cost);

        if(percentage_val > 35 && percentage_val < 54){

            $('#repayment-period-display').html('1 Year');

        }else if(percentage_val > 55 && percentage_val < 64){

            $('#repayment-period-display').html('2 Years');

        }else if(percentage_val > 65 && percentage_val < 100){

            $('#repayment-period-display').html('3 Years');

        }

        //Insert percentage in div
        $('.percentage-container').html(percentage_val + "%");

        $('#percentage-value').val(percentage_val);

        total_price = parseInt(this.value) + parseInt(one_percent) + parseInt(four_percent);

        var pplan = $(".payment-plan-option").val();

        output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(this.value);

        down_payment_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(this.value);

        total_output.innerHTML = "<span style='font-family:helvetica;'>&#x20A6;</span> " + numberWithCommas(total_price);

        payment.value = this.value;

        finance_payment.value = total_price;

        //var payment_period = $(".repayment-duration").val();

    }

    function numberWithCommas(x) {

        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    }
});