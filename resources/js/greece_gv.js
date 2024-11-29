import 'animate.css';

$(document).ready(function () {

    var bannerForm = $('.generic-form-container');

    function bannerLoadAnimation(){

        let bannerContent = $('.rollover-element');
        let bannerSubtitle = $('.banner-subtitle');
        // let bannerContentHeight = bannerContent.outerHeight();


        // Clone the element
        let clone = bannerContent.clone()
        .css({
            visibility: 'hidden', // Make it invisible
            position: 'absolute', // Remove it from the flow
            height: 'auto', // Let it expand naturally
            width: bannerContent.width() // Match the original element's width
        })
        .appendTo('body');

        setTimeout(() => {

            bannerSubtitle.addClass('animate__animated animate__fadeInLeft');
            bannerForm.addClass('animate__animated animate__fadeInRight');

        }, 1500); // Add it temporarily to the DOM

        // Get the natural height
        let naturalHeight = clone.outerHeight() + 15; // Use .height() if padding/border are irrelevant

        // Remove the clone
        clone.remove();

        // Animate the original element to its natural height
        bannerContent.animate({ height: naturalHeight }, 500); // 500ms animation

    }

    // Place the form in the correct top position
    function formDesktopPosition(){

        let bannerContent = $('.rollover-element');
        let bannerContentTop = bannerContent.offset().top;


        bannerForm.css({'top':bannerContentTop});

        console.log(bannerContentTop);

    }

    // Remove placeholders off a form
    function removeFormPlaceholders(form) {

        // Ensure the form is a valid jQuery object
        if (!(form instanceof jQuery) || form.length === 0) {
            console.error("Invalid form passed. Ensure it's a valid jQuery object.");
            return;
        }

        // Remove placeholders from all inputs except textareas
        form.find('input:not([type="textarea"])').each(function () {
            $(this).removeAttr('placeholder');
        });

        // Blank out hidden or disabled <option> elements with empty values
        form.find('select').each(function () {
            $(this).find('option').each(function () {
            const $option = $(this);
            // Check if the option is hidden, disabled, or selected with an empty value
            if (
                $option.val() === '' && // Empty value
                ($option.is('[hidden]') || $option.is('[disabled]') || $option.is('[selected]'))
            ) {
                $option.text(''); // Clear the visible text
            }
            });
        });
    }

    // Load the Banner Animation
    bannerLoadAnimation();

    // Remove the form's placeholders
    removeFormPlaceholders(bannerForm);

    // Place the form in the correct top position
    formDesktopPosition();

    /* Banner Form Submission */
    $(".generic-form-container").on("submit", function(e){

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
                submitButton.html('Book Your Meeting');
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

    // Testimonials Slider
    if( $(".testimonials-wrapper.splide").length ){

        var testimonial_slide = new Splide('.testimonials-wrapper', {
            // type: 'loop',
            type: 'slide',
            perPage: 3,
            perMove: 1,
            autoplay: false,
            interval: 3500,
            gap:'30px',
            speed: '500',
            easing: 'ease',
            arrows: false,
            pagination: false,
            drag: false,
            breakpoints: {
                991: {
                    perPage: 2,
                    type: 'loop',
                    drag: true,
                },
                768: {
                    gap:'15px',
                },
                576: {
                    perPage: 1,
                }
            }
        }).mount();
    }

})
