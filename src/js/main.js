$(document).ready(function () {
    $("a.easy-scroll").click(function () {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top - 35 + "px"
        }, {
            duration: 500,
            easing: "swing"
        });
        return false;
    });
});

$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "form-process.php",
        data: "name=" + name + "&email=" + email + "&message=" + message + "&g-recaptcha-response=" + grecaptcha.getResponse(),
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Message sent!")
}

function formError(){
    $("#contactForm").removeClass().addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h4 text-red";
    } else {
        var msgClasses = "h4 text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

$("#registrationForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formErrorReg();
        submitMSGREG(false, "");
    } else {
        // everything looks good!
        event.preventDefault();
        submitFormReg();
    }
});


function submitFormReg(){
    // Initiate Variables With Form Content
    var name = $("#regName").val();
    var email = $("#regEmail").val();

    $.ajax({
        type: "POST",
        url: "reg-process.php",
        data: "name=" + name + "&email=" + email + "&g-recaptcha-response=" + grecaptcha.getResponse(),
        success : function(text){
            if (text == "success"){
                formSuccessReg();
            } else {
                formErrorReg();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccessReg(){
    $("#registrationForm")[0].reset();
    submitMSGREG(true, "Message sent!")
}

function formErrorReg(){
    $("#registrationForm").removeClass().addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSGREG(valid, msg){
    if(valid){
        var msgClasses = "h4 text-red";
    } else {
        var msgClasses = "h4 text-danger";
    }
    $("#regSubmit").removeClass().addClass(msgClasses).text(msg);
}

// Resize reCAPTCHA to fit width of container
// Since it has a fixed width, we're scaling
// using CSS3 transforms
// ------------------------------------------
// captchaScale = containerWidth / elementWidth

function scaleCaptcha(elementWidth) {
    // Width of the reCAPTCHA element, in pixels
    var reCaptchaWidth = 304;
    // Get the containing element's width
    var containerWidth = $('.container').width();

    // Only scale the reCAPTCHA if it won't fit
    // inside the container
    if(reCaptchaWidth > containerWidth) {
        // Calculate the scale
        var captchaScale = containerWidth / reCaptchaWidth;
        // Apply the transformation
        $('.g-recaptcha').css({
            'transform':'scale('+captchaScale+')'
        });
    }
}

$(function() {

    // Initialize scaling
    scaleCaptcha();

    // Update scaling on window resize
    // Uses jQuery throttle plugin to limit strain on the browser
    $(window).resize( $.throttle( 100, scaleCaptcha ) );

});