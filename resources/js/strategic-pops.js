
// jQuery
$(function() {

    // Check if the user is in a mobile screen
    function isMobile(){

        if($("body").width() < 762){
            return true;
        }else{
            return false;

        }
    }

    // Different popups
    let brochureGlobalContainer = $('.brochure-modal-container');
    let abandonPopup = $('.abandon-popup');
    let guideDownloadForm = $('.brochure-download-form');
    let modalGlobalContainer = $('.modal-form-global-container');
    let isMouseDownInsideModal = false;

    /* Abandon Popup */
    let showExitPopup = true;

    // /greece-golden-visa-program
    if (window.location.pathname === '/greece-golden-visa-program') {

        document.addEventListener('mouseout', function(e) {
            if (
                e.clientY < 0 && showExitPopup
                // &&
                // !getCookie('exit_popup_shown')
            ) {
                // document.getElementById('exit-popup').style.display = 'block';
                abandonPopup.fadeIn();

                // setCookie('exit_popup_shown', 'yes', 7); // Cookie valid for 7 days
                showExitPopup = false;
            }
        });

        // Insert a loading spinner in all forms with a button type=submit
        $('form').each(function () {
            const submitBtn = $(this).find('button[type="submit"]');

            if (submitBtn.length > 0) {
                submitBtn.append('<i class="submit-loading-spinner fas fa-spinner fa-spin"></i>');
            }
        });

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
                    Notify('Thank you for downloading the Greece Golden Visa brochure - please check your inbox', null, null, 'success');
                    // FadeOut the entire modal
                    modalGlobalContainer.fadeOut();



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


        $('.modal-element').on('mousedown', function() {
            isMouseDownInsideModal = true;
        });

        modalGlobalContainer.on('mousedown', function(e) {
            if ($(e.target).is('.modal-form-global-container')) {
                isMouseDownInsideModal = false;
            }
        });

        modalGlobalContainer.on('mouseup', function(e) {
            if (!isMouseDownInsideModal && $(e.target).is('.modal-form-global-container')) {
                $(this).fadeOut(300);
            }
        });

        // Mobile device behavior
        if( isMobile() ){

            // Show popup after 15 seconds
            setTimeout(() => {
                abandonPopup.fadeIn();
            }, 10000);
        }

    }

})