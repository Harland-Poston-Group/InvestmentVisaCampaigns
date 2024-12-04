import 'animate.css';

jQuery(function() {

    var bannerForm = $('.banner-form-container .generic-form-container');
    var ctaForm = $('.cta-form-container .generic-form-container');
    var mobileMenu = $('.mobile-menu');
    var mobileMenuButton = $('.mobile-menu-button');
    var mobileMenuCloseButton = $('.mobile-menu-close-button');
    var ctaFormContainer = $('.cta-form-container');

    function bannerLoadAnimation(){

        let bannerContent = $('.rollover-element');
        let bannerSubtitle = $('.banner-subtitle');
        // $('html').toggleClass('no-scroll');
        // let bannerContentHeight = bannerContent.outerHeight();


        // Clone the element
        let clone = bannerContent.clone()
        .css({
            visibility: 'hidden', // Make it invisible
            position: 'absolute', // Remove it from the flow
            height: 'auto', // Let it expand naturally
            width: bannerContent.width() // Match the original element's width
        })
        .appendTo('body #banner-section');

        setTimeout(() => {

            bannerSubtitle.addClass('animate__animated animate__fadeInLeft');
            bannerForm.addClass('animate__animated animate__fadeInRight');
            $('html').toggleClass('no-scroll');


        }, 1500); // Add it temporarily to the DOM

        // Get the natural height
        // let naturalHeight = clone.outerHeight() + 15; // Use .height() if padding/border are irrelevant
        let naturalHeight = clone.outerHeight(); // Use .height() if padding/border are irrelevant

        // Remove the clone
        clone.remove();

        // Animate the original element to its natural height
        bannerContent.animate({ height: naturalHeight }, 500); // 500ms animation

    }

    // Place the form in the correct top position
    function formDesktopPosition(){

        let bannerContent = $('.rollover-element');
        let bannerContentTop = bannerContent.offset().top;
        let bannerContentPaddingTop = parseFloat(bannerContent.css('padding-top'));

        // Add padding-top to the top offset to place the form below the padding
        let formTopPosition = bannerContentTop + bannerContentPaddingTop;


        bannerForm.css({'top':formTopPosition});

        // console.log(bannerContentTop);

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
    removeFormPlaceholders(ctaForm);

    // Place the form in the correct top position
    formDesktopPosition();

    /* MOBILE FUNCTIONS */

        // Open mobile menu
        mobileMenuButton.on('click', function(){

            mobileMenu.fadeIn();

            mobileMenuButton.hide();
            mobileMenuCloseButton.show();

        });

        // Close mobile menu
        mobileMenuCloseButton.on('click', function(){

            mobileMenu.fadeOut();

            mobileMenuCloseButton.hide();
            mobileMenuButton.show();

        });

    /* END OF MOBILE FUNCTIONS */

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

    if( $('#greece-finest-properties-section .property-slider').length ){

        let properties_slider = new Splide('.property-slider', {
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
            drag: true,
            breakpoints: {
                991: {
                    perPage: 2,
                    // type: 'loop',
                    // drag: true,
                },
                768: {
                    gap:'15px',
                },
                576: {
                    perPage: 1,
                }
            }
        }).mount();

        /* Using custom elements to skip sliders */
        var leftArrow = $("#investments-section .left-arrow");
        var rightArrow = $("#greece-finest-properties-section .right-arrow");

        // Function to update arrow states
        function updateArrowState() {
            // if (investments_slider.index === 0) {
            //     leftArrow.addClass('disabled'); // Add 'disabled' class to left arrow
            // } else {
            //     leftArrow.removeClass('disabled'); // Remove 'disabled' class from left arrow
            // }

            if (properties_slider.index >= properties_slider.length - properties_slider.options.perPage) {
                rightArrow.addClass('disabled'); // Add 'disabled' class to right arrow
            } else {
                rightArrow.removeClass('disabled'); // Remove 'disabled' class from right arrow
            }
        }

        // Initial state check
        updateArrowState();

        // Update arrows on move or mount
        properties_slider.on('mounted move', function () {
            updateArrowState();
        });

        // Custom arrow click events
        rightArrow.on('click', function(){
            properties_slider.go('>');
        });
        leftArrow.click(function () {
            properties_slider.go('<');
        });

    }

    // Slide to section
    $('a.linkSlide').on('click',function(){


        // event.preventDefault();
        var target = $($.attr(this, 'href'));
        console.log(target);
        var fixedHeaderHeight = $('#header').outerHeight() + 20;
        console.log(fixedHeaderHeight);
        var offset = target.offset().top;
        console.log(offset);

        // Calculate the distance between the target and the top of the viewport
        var distanceToTarget = offset - $(window).scrollTop();

        // Check if the target is below 100vh
        if (distanceToTarget > window.innerHeight) {
            // If the target is below 100vh, apply the offset compensation
            offset -= fixedHeaderHeight;
        } else {
            // If the target is above 100vh, apply a minimum offset of 125px
            offset = Math.max(offset - fixedHeaderHeight, offset - 125);
        }

        // Scroll to the target item
        $('html, body').animate({ scrollTop: offset }, 800);

        // Check if the mobile menu is open, if it is, close it and re-show menu button
        if ( mobileMenu.is(':visible') ) {
            mobileMenu.fadeOut();
            mobileMenuCloseButton.hide();
            mobileMenuButton.show();
        }


        return false;
    });

    /* HEADER SCROLL POSITION FIXED */
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            scrollHeader()
        };

        // Get the header
        // var header = document.getElementById("header");
        var header = document.getElementById("header");
        // var headerElement = document.getElementById("header");
        // Hover menus that we want to append to the header if it is with a position:fixed
        // var hoverMenus = document.getElementsByClassName("dropdown-menu");
        var body = document.body;

        var headerHeight = header.clientHeight;
        // console.log(headerHeight);

        // Get the offset position of the navbar
        var sticky = header.offsetTop + headerHeight;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function scrollHeader() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
                body.style.marginTop = headerHeight + "px";
            } else {
                header.classList.remove("sticky");
                body.style.marginTop = '0px';
            }
        }
    /* END OF HEADER SCROLL POSITION FIXED */

    /* CTA SIDE FORM FUNCTIONS */

        // Check visibility on scroll
        $(window).on('scroll', function () {
            // Get #banner-section position
            var bannerSection = $('#banner-section');
            var bannerTop = bannerSection.offset().top;
            var bannerBottom = bannerTop + bannerSection.outerHeight();

            // Get #footer position
            var footer = $('footer');
            var footerTop = footer.offset().top;

            // Get viewport positions
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            // Check if #banner-section is out of viewport
            var isBannerOutOfView = bannerBottom <= viewportTop || bannerTop >= viewportBottom;

            // Check if #footer is visible
            var isFooterVisible = footerTop < viewportBottom;

            // Logic for fading in/out the call-to-action
            if (isBannerOutOfView && !isFooterVisible) {
                // Banner is out of view and footer is not visible, show the CTA
                $('.call-cta-wrapper').fadeIn();

                // Align horizontal line if on mobile
                if (isMobile()) {
                    alignHorizontalLine();
                }
            } else {
                // Either banner is in view or footer is visible, hide the CTA
                $('.call-cta-wrapper').fadeOut();
            }
        });

        // Open side form from side CTA click
        $('#call-cta, #book-a-free-consultation-section .button-container button').on('click', function(){

            ctaFormContainer.toggleClass('hidden');

        });

        $('.cta-form-container .close-button-span').on('click', function(){

            ctaFormContainer.toggleClass('hidden');

        })

        // Horizontal line in call cta bar
        function alignHorizontalLine() {
            let callCta = $('#call-cta'); // Element whose bottom we need to calculate
            let line = $('.call-cta-wrapper .horizontal-line'); // Line to align

            // Get the bottom value of #call-cta relative to the parent
            let ctaBottom = parseFloat(callCta.css('bottom')); // Get bottom value directly from CSS

            // Calculate the bottom value for the horizontal line
            let lineBottom = ctaBottom + callCta.outerHeight() / 2 - line.outerHeight() / 2;

            // Apply the calculated bottom value to the horizontal line
            line.css('bottom', `${lineBottom}px`);
        }

        // Mark's banner
        function alignHorizontalLineContactUsBanner() {
            // Get the section and button container elements
            const $section = $('#book-a-free-consultation-section');
            const $buttonContainer = $section.find('.button-container button');
            const $horizontalLine = $section.find('.horizontal-line');

            // Get the position of button container relative to the parent section
            const buttonOffset = $buttonContainer.position().top; // Position relative to parent container

            // Calculate the center of the button container
            const buttonHeight = $buttonContainer.outerHeight();
            const centerPosition = buttonOffset + (buttonHeight / 2);

            // Set the horizontal line position to match the center of the button container
            $horizontalLine.css({
                position: 'absolute',
                top: centerPosition + 'px',
            });
        }


        // Book a free consultation - align to the middle of the button position
        if( $('#book-a-free-consultation-section').length > 0 ){

            alignHorizontalLineContactUsBanner();
            $(window).on('resize', alignHorizontalLineContactUsBanner);

        }

        // Align on page load and window resize
        alignHorizontalLine();

        // Align lines on resize
        $(window).on('resize', alignHorizontalLine);

        $(window).on('click', function (e) {
            const element = $('.form-container-element.cta-form-container');

            // Check if the element is visible and within the viewport
            if (element.is(':visible') && isElementInViewport(element)) {
                // Check if the click was outside the element
                if (!$(e.target).closest('.form-container-element.cta-form-container form').length) {

                    // If in desktop
                    if( !isMobile() ){
                        // Add the 'hidden' class
                        element.addClass('hidden');
                    }

                }
            }
        });

        // Helper function to check if an element is within the viewport
        function isElementInViewport(el) {
            const rect = el[0].getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Check if the user is in a mobile screen
        function isMobile(){

            if($("body").width() < 768){
                return true;
            }else{
                return false;

            }

        }

})
