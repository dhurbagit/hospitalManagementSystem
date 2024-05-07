function graduationBsToAd() {
    var nepaliDate = $('#graduation_year_bs').val();
    var englishDate = NepaliFunctions.BS2AD(nepaliDate);
    $('#graduation_year_ad').val(englishDate);
}

function startbsToAd() {
    var nepaliDate = $('#start_date_bs').val();
    var englishDate = NepaliFunctions.BS2AD(nepaliDate);
    $('#start_date_ad').val(englishDate);

}

function EndbsToAd() {
    var nepaliDate = $('#end_date_bs').val();
    var englishDate = NepaliFunctions.BS2AD(nepaliDate);
    $('#end_date_ad').val(englishDate);

}

function bsToAd() {
    var nepaliDate = $('#nepali-datepicker').val();
    var englishDate = NepaliFunctions.BS2AD(nepaliDate);
    $('#inputDOB_ad').val(englishDate);

}

window.onload = function () {
    var mainInput = document.getElementById("nepali-datepicker");
    mainInput.nepaliDatePicker();

    var mainInput = document.getElementById("graduation_year_bs");
    mainInput.nepaliDatePicker();

    var mainInput = document.getElementById("start_date_bs");
    mainInput.nepaliDatePicker();

    var mainInput = document.getElementById("end_date_bs");
    mainInput.nepaliDatePicker();

    setInterval(() => {
        bsToAd();
        graduationBsToAd();
        startbsToAd();
        EndbsToAd();
    }, 1000);
};

// ClassicEditor
//     .create(document.querySelector('#editor'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor0'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor1'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor2'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor3'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor4'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor5'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor6'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor7'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor8'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor9'))
//     .catch(error => {
//         console.error(error);
//     });
// ClassicEditor
//     .create(document.querySelector('#editor10'))
//     .catch(error => {
//         console.error(error);
//     });

// form widget 


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:

    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;

    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var v, w, x, y, z, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].querySelectorAll("input[type='text']");
    v = x[currentTab].querySelectorAll("input[type='date']");
    z = x[currentTab].querySelectorAll("select");
    w = x[currentTab].querySelectorAll("textarea");
    // A loop that checks every select field in the current tab:
    for (i = 0; i < z.length; i++) {
        // console.log(z[i].prop('disabled'));
        if (z[i].value == '' && !z[i].disabled) {
            z[i].className += " invalid active_error";
            // and set the current valid status to false
            valid = false;
        }
    }
    for (i = 0; i < v.length; i++) {
        if (v[i].value == '') {
            v[i].className += " invalid active_error";
            // and set the current valid status to false
            valid = false;
        }
    }
    // for (i = 0; i < w.length; i++) {
    //     if (w[i].value == '') {


    //         w[i].className += " invalid active_error";
    //         // and set the current valid status to false
    //         valid = false;
    //     }
    // }
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {

        // If a field is empty...
        if (y[i].value == "" && !y[i].classList.contains("not-required")) {

            // add an "invalid" class to the field:
            y[i].className += " invalid active_error";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}
// form widget 

var loadFile = function (event) {
    var image = document.getElementById('placeholder_image');
    image.src = URL.createObjectURL(event.target.files[0]);
};

// **************************************************************
// |
// |
// **************************************************************

var count = 0;

$("#add").click(function () {


    var $clonedInput = $(".academic_info > .fieldSet_wrapper:last").clone()
        .append($('<a id="glyphicon-remove" href="#"><i class="fas fa-trash-alt"></i></a>'))
        .appendTo("#wrapper_one");
    var dynamicId = 'graduation_year_bs' + count;
    $clonedInput.find('.bs_dynamic_class input').attr('id', dynamicId);
    var dynamicId = 'graduation_year_ad' + count;
    $clonedInput.find('.ad_dynamic_class input').attr('id', dynamicId);
    $clonedInput.find('input').val('');
    $clonedInput.find('textarea').val('');
    var mainInput = document.getElementById("graduation_year_bs" + count);
    mainInput.nepaliDatePicker();
    count++;

});

function graduationBsToAd_loop(numIds) {
    for (var i = 0; i < numIds; i++) {
        var nepaliDate = $('#graduation_year_bs' + i).val();
        var englishDate = NepaliFunctions.BS2AD(nepaliDate);
        $('#graduation_year_ad' + i).val(englishDate);
    }
}  

setInterval(function () {
    graduationBsToAd_loop(100)
}, 1000)


$(document).on('click', '#glyphicon-remove', function () {
    $(this).parent().remove();
});

// **************************************************************
// |
// |
// **************************************************************
var count = 0;
$("#addExperience").click(function () {


    var $clonedInput = $(".work_experience > .fieldSet_wrapper:last").clone()
        .append($('<a id="glyphicon-remove" href="#"><i class="fas fa-trash-alt"></i></a>'))
        .appendTo("#wrapper_two");

    var dynamicId = 'start_date_bs' + count;
    $clonedInput.find('.bs_start_dynamic_class_experience input').attr('id', dynamicId);

    var dynamicId = 'start_date_ad' + count;
    $clonedInput.find('.ad_start_dynamic_class_experience input').attr('id', dynamicId);

    var dynamicId = 'end_date_bs' + count;
    $clonedInput.find('.bs_end_dynamic_class_experience input').attr('id', dynamicId);

    var dynamicId = 'end_date_ad' + count;
    $clonedInput.find('.ad_end_dynamic_class_experience input').attr('id', dynamicId);

    var dynamicId = 'editor' + count;
    $clonedInput.find('textarea').attr('id', dynamicId);

    $clonedInput.find('input').val('');
    // $clonedInput.find('textarea').val('');


    var mainInput = document.getElementById("start_date_bs" + count);
    mainInput.nepaliDatePicker();

    var mainInput = document.getElementById("end_date_bs" + count);
    mainInput.nepaliDatePicker();

    count++;
});

$(document).on('click', '#glyphicon-remove', function () {
    $(this).parent().remove();
});
setInterval(function () {
    startbsToAd_loop(100);
    EndbsToAd_loop(100)
}, 1000)
function startbsToAd_loop(numberId) {
    for (var i = 0; i < numberId; i++) {
        var nepaliDate = $('#start_date_bs' + i).val();
        var englishDate = NepaliFunctions.BS2AD(nepaliDate);
        $('#start_date_ad' + i).val(englishDate);
    }
}
function EndbsToAd_loop(nums) {
    for (var i = 0; i < nums; i++) {
        var nepaliDate = $('#end_date_bs' + i).val();
        var englishDate = NepaliFunctions.BS2AD(nepaliDate);
        $('#end_date_ad' + i).val(englishDate);
    }
}
$(document).ready(function () {

    var cit = $('#countryID').val();
    if (cit == 156) {
        var province = $('#province_id');
        province.removeAttr('disabled');
        var district = $('#district_id');
        district.removeAttr('disabled');
        var municipality = $('#municipality_id');
        municipality.removeAttr('disabled');
    } else {
        var province = $('#province_id');
        province.attr('disabled', 'disabled');
        var district = $('#district_id');
        district.attr('disabled', 'disabled');
        var municipality = $('#municipality_id');
        municipality.attr('disabled', 'disabled');
    }
});


$(document).ready(function() {
    if ($('.tab').hasClass('dontShow')) {
        // Remove the div if it has the class "dontShow"
        $('.tab.dontShow ').remove();
    }
});