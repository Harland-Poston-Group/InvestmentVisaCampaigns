$(function() {

    /* Banner Text Slider */
    if( $(".property-images-slider").length ){

        var property_slider = new Splide('.property-images-slider', {
            type: 'loop',
            perPage: 1,
            perMove: 1,
            autoplay: true,
            // type: "fade",
            speed: 1000,
            interval: 4000,
            rewind: true,
            easing: 'ease',
            drag:false,
            arrows: false,
            pagination:false,
            // Appending the pagination buttons to a specific element
            // pagination: '#testimonial-slider-container',
            breakpoints: {
                991: {
                    perPage: 1
                },
            }
            // autoWidth: true,
        }).mount();
    }

    // Align purple line
    let el = $('#book-a-meeting-section .content-column');
    let horizontalLine = $('#horizontal-absolute-line');
    let elementTop = el.offset().top;

    // Get the actual height of the element (excludes margin)
    let elementHeight = el.outerHeight(false); // includes padding & borders, excludes margins by default

    // Calculate exact bottom position (excluding bottom margin)
    let elementBottom = elementTop + elementHeight + 15;

    horizontalLine.css('top', `${elementBottom}px`);

    console.log('Element bottom position:', elementBottom);
    // End of purple line alignment

    // Insert a loading spinner in all forms with a button type=submit
    $('form').each(function () {
        const submitBtn = $(this).find('button[type="submit"]');

        if (submitBtn.length > 0) {
            submitBtn.append('<i class="submit-loading-spinner fas fa-spinner fa-spin"></i>');
        }
    });

    /* Open modal forms */
    let downloadGuideButton = $('.download-guide');
    let guideDownloadForm = $('#brochure-download-form');
    let modalGlobalContainer = $('.modal-form-global-container');

    // Button click
    downloadGuideButton.on('click', function(){
        modalGlobalContainer.fadeIn();
    })

    guideDownloadForm.on('submit', function(e){

        e.preventDefault();

        let form = $(this)[0]; // Get the raw DOM element
        let formData = new FormData(form); // Create FormData object
        let submitButton = $(this).find('button[type=submit]');
        let loadingSpinner = $(this).find('.submit-loading-spinner');

        // AJAX Request
        $.ajax({
            url: "/download-brochure-submission",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Let the browser set it, including boundary for multipart/form-data
            beforeSend: function () {

                // Disable the submit button to prevent multiple clicks
                submitButton.prop('disabled', true);
                loadingSpinner.css({'display':'inline-block'});

            },
            success: function(response) {

                // if (response) {
                //     console.log('success: ' + response);
                // } else {
                //     console.log('error: ' + response);
                // }

                console.log(response);

                // Open
                // const openPopup = window.open('assets/ebooks/USInvestorsGuide_PH_2024.pdf', '_blank');


                // // Some browsers may block the window.open, we're going for a fallback in that case
                // if( openPopup === null ){

                //     // Trigger hidden link click
                //     $('.brochure-link')[0].click();

                // // Popup wasn't blocked
                // }else{
                // }

                // FadeOut the entire modal
                modalGlobalContainer.fadeOut();

                Notify('Thank you for your application. We\'ll be in touch, shortly', null, null, 'success');

            },
            error: function(xhr, status, errorMessage) {

                Notify('There was an error submitting the form. Please reach us via email', null, null, 'success');
                console.log("RESPONSE: , error: " + errorMessage);

            },
            complete: function() {

                submitButton.prop('disabled', false);
                loadingSpinner.hide();

                form.reset();
                $("#cv-file-name").text('Allowed files: pdf,doc,docx,jpg,jpeg,png');

                if (window.location.hash !== '#debug') {
                    // window.location.href = "/thank-you";
                }
            }
        });
    })

    // Fade out the global container if not clicked in the modal element
    modalGlobalContainer.on('click', function(e) {
        if ($(e.target).is('.modal-form-global-container')) {
            $(this).fadeOut(300); // Fade out in 300ms
        }
    });

    // Close modal container on the ESC key click
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            const $modal = $('.modal-form-global-container');

            if ($modal.is(':visible')) {
                $modal.fadeOut(300);
            }
        }
    });

});