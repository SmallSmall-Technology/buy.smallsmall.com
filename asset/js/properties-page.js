var baseUrl = 'https://buy.smallsmall.com/';
// Function for social media sharing
function fbShare(url, title, descr, image, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);
    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

// Function for sharing on Twitter 
$('.js-share-twitter-link').click(function (e) {
    e.preventDefault();
    var href = $(this).attr('href');
    window.open(href, "Twitter", "height=285,width=550,resizable=1");
});

// Event listeners for select elements to update hidden input fields for filter section
document.getElementById('list_price_select').addEventListener('change', updateHiddenListPrice);
document.getElementById('location_select').addEventListener('change', updateHiddenLocation);
document.getElementById('property_type_select').addEventListener('change', updateHiddenPropertyType);

// Function to update the hidden list_price input field in filter section
function updateHiddenListPrice() {
    var listPrice = document.getElementById('list_price_select').value;
    document.getElementById('list_price').value = listPrice;
}

// Function to update the hidden 'location' input field in filter section
function updateHiddenLocation() {
    var location = document.getElementById('location_select').value;
    document.getElementById('location').value = location;
}

// Function to update the hidden 'property_type' input field in filter section
function updateHiddenPropertyType() {
    var propertyType = document.getElementById('property_type_select').value;
    document.getElementById('property_type').value = propertyType;
}

// AJAX request to load locations and fetch cities based on the selected state in the filter section
$('#state_select').on('change', function () {

    "use strict";

    var states = $(this).val();

    var cities = "<option selected='selected'>Location</option>";

    $('#location_select').html("<option selected='selected'>Loading...</option>");

    var data = { "states": states };

    $.ajaxSetup({ cache: false });

    $.ajax({

        url: baseUrl+"buytolet/get_cities/",

        secureuri: false,

        type: "POST",

        dataType: 'json',

        data: data,

        success: function (data, status, msg) {

            for (let i = 0; i < data.msg.length; i++) {

                cities += '<option value="' + data.msg[i].name + '">' + data.msg[i].name + '</option>';

            }

            $('#location_select').html(cities);

            // Update the hidden state input fied to the selected state

            $('#state').val(states); 
           
            $('#location').val($('#location_select').val());

            // Deburging: Logging values to console to see so as to capture in properties-filter page
            // console.log("location:", $('#location').val());
            // console.log("state:", states);
        },

        error: function (xhr, status, error) {
            console.error("AJAX Error:", error); // Errors during Ajax call
            // console.log("Response Text:", xhr.responseText); // Log the entire response content
        }

    });

});
