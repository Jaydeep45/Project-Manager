$(document).ready(function () {
    
$('.clients-carousel').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 4000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    smartSpeed: 1100,
    margin: 30,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        991: {
            items: 2
        },
        1200: {
            items: 2
        },
        1920: {
            items: 2
        }
    }
});
$('.slide-carousel').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 4000,
    animateOut: 'fadeOut',
    animateIn: 'easeIn',
    smartSpeed: 1500,
    margin:  546,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        991: {
            items: 2
        },
        1200: {
            items: 2
        },
        1920: {
            items: 2
        }
    }
});

$('#loginForm').validate({
    rules: {
        'user_email': 'required',
        'user_psw': 'required',
    },
    messages: {
        'user_email': '*Please enter a email',
        'user_psw': '*Please enter a password',
    }
});
$('#SignUp').validate({
    rules: {
        'user_name': {
            'required': true
        },
        'user_email':  {
            'required': true,
            'validate_email': true,
            'remote': {
				url: "checkemail.php",
				type: "post",
			},
        },
        'user_psw': 'required',
        'user_phone': {
            'required': true,
            'phone_regex': true,
        },
    },
    messages: {
        'user_name': '*Please enter your name',
        'user_email': {
            'required': '*Please enter your email',
            'validate_email': '*Please enter a valid email',
            'remote': '*Email already exists',
        },
        'user_psw': '*Please enter a password',
        'user_phone': {
            'required': "Please enter your phone number",
        },
    }
});
$('#contactForm').validate({
    rules: {
        'user_name': {
            'required': true
        },
        'user_email':  {
            'required': true,
            'validate_email': true,
        },
        'user_message': 'required',
    },
    messages: {
        'user_name': '*Please enter your name',
        'user_email': {
            'required': '*Please enter your email',
            'validate_email': '*Please enter a valid email',
        },
        'user_message': '*Please write something',
    }
});
});
jQuery.validator.addMethod("phone_regex", function(value, element) {
	return this.optional(element) || /^[7-9][0-9]{9}$/i.test(value);
}, "*Phone Number with only 0-9 and should start with 7-9. length: 10"); // phone number check
jQuery.validator.addMethod("password_regex", function(value, element) {
	return this.optional(element) || /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,30}$/i.test(value);
}, "*Password should have minimum 8 and maximum 30 character (1 [a-z A-Z 0-9 special character])"); // password check
jQuery.validator.addMethod("validate_email", function(value, element) {
	return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);	
}, "*Please enter a valid Email."); // email check 
