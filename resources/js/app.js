import './bootstrap.js';
import Alpine from 'alpinejs';

import 'animate.css';

window.Alpine = Alpine;
Alpine.start();

jQuery('#why-portugal-homes-section-pm').addClass('animate-on-scroll');

const sections = document.querySelectorAll('.animate-on-scroll');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeIn');
            observer.unobserve(entry.target);
        }
    });
});

sections.forEach(section => {
    observer.observe(section);
});

$(document).ready(function() {

    // const newDiv = $('<div class="col-12"></div>');

    // Wrap the content of .footer-iv with the new div
    // $('.footer-iv').wrapInner(newDiv);

    $('a.btn-close-form').on( "click", function(e) {
        $('#hidden-form').removeClass('active');
    });

    $(".right-button-scroll").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    $(".popup-modal").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    $(".enquire-button").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    $(".meeting-button").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    // Form submission
    $("#campaign-form, .generic-form-submission, .catch-submission").on("submit", function(e){

        e.preventDefault();

        var this_form = $(this).serialize();
        var this_form_element = $(this);

        let submitButton = this_form_element.find('button[type=submit]');

        if( submitButton.length > 0 ){

            submitButton.html('Submitting... <span id="spinner"><svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve" width="20px" height="20px"><path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" /></path></svg></span>');

        }

        // Disable the button
        submitButton.prop('disabled', true);


        $.ajax({
            // url: "/form-submission.php",
            url: "/form-submission",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: this_form,
            success:function(response){
                if (response){
                    console.log('success: ' + response);
                }else{
                    console.log('error: ' + response);
                }
            },
            error: function error(xhr, status, errorMessage) {
                console.log("RESPONSE: , error: " + errorMessage);
            },
            complete: function() {
                // Revert the button text and remove the spinner
                submitButton.html('Submit');
                submitButton.prop('disabled', false);
                // this_form_element[0].reset();
                // Redirect the user to the /thankyou page after completion


                // window.location.href = "/thank-you";

                if (window.location.hash !== '#debug') {
                    window.location.href = "/thank-you";
                }
            }
        });

    });

    $('.card-residency').on('click', function(){

        if( $('.simon-campaigns-form').length > 0 ){

            let target = $('.simon-campaigns-form');
    
            let scrollTarget = target.position().top;

            console.log(scrollTarget);
    
            $('html, body').animate({
                scrollTop: scrollTarget - 20 // Adjust for headers if needed
            }, 10);
        }

    })
});
