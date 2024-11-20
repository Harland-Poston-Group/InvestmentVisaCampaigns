$(document).ready(function () {

    // Assigning elements to variables
    let noAnswerNotification = $('#no-answer-notification');
    let multistepSection = $('#multistep-form-section');
    let formLastStepSection = $('#form-last-step-section')
    let backgroundFade = $('.background-fade');

    // Return to previous form question
    $("body").on("click", ".prev-btn", function (e) {

        e.preventDefault();

        // Find the current question container
        var currentQuestion = $(this).closest(".question");

        // Hide the notification since the user has already moved to the next question
        noAnswerNotification.hide();

        // If this is the last question - jump to form conclusion
        if ( currentQuestion.prev('.question').hasClass('first-step') ) {

            backgroundFade.css({'opacity':'0'});

        }else{

            backgroundFade.css({'opacity':'1'});

        }

        // Hide the current question
        currentQuestion.hide();

        // // Show the next question
        currentQuestion.prev(".question").show();

    });

    // Proceed to next form question
    $("body").on("click", ".next-btn", function (e) {

        e.preventDefault();

        // Find the current question container
        var currentQuestion = $(this).closest(".question");
        
        // Check if at least one input is selected
        if ( currentQuestion.find("input:checked").length > 0 || currentQuestion.find("input").length < 1 ) {

            // Hide the notification since the user has already moved to the next question
            noAnswerNotification.hide();

            // If this is the last question - jump to form conclusion
            if ( currentQuestion.next('.question').hasClass('last-step') ) {

                backgroundFade.css({'opacity':'0'});

            }else{

                backgroundFade.css({'opacity':'1'});

            }

            /* Jump to next question */
        
            // Hide the current question
            currentQuestion.hide();

            // Show the next question
            currentQuestion.next(".question").show();


        } else {

            // Show the notification letting the user know he hasn't answered
            noAnswerNotification.fadeIn();

        }

    });

    // Form Submission
    $('#multistep-form').on('submit', function(event){

        event.preventDefault();

        const form = $(this);
        const form_serialized = $(this).serialize();
        let submitButton = form.find("button[type=submit]");
        let loadingSpinner = form.find('.submit-loading-spinner');
        const submitButtonText = submitButton.text();
        const currentQuestion = $(this).find(".question:visible");

        // console.log(currentQuestion);
        // console.log(currentQuestion.next('.question'));

        // Insert a loading spinner and change the text of the button
        if( submitButton.length > 0 ){

            submitButton.html('Submitting... <span id="spinner"><svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve" width="20px" height="20px"><path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" /></path></svg></span>');

        }

        // Disable the button
        submitButton.prop('disabled', true);

        $.ajax({
            // url: "/form-submission.php",
            url: "/multistep-form-submission",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_serialized,
            success:function(response){

                if (response){
                    console.log('success: ' + response);

                    // Hide the current question
                    // currentQuestion.hide();

                    // // Show the next question
                    // currentQuestion.next(".question").show();
                    
                }else{
                    console.log('error: ' + response);
                }

            },
            error: function error(xhr, status, errorMessage) {
                console.log("RESPONSE: , error: " + errorMessage);
            },
            complete: function() {

                // Revert the button text and remove the spinner
                submitButton.html(submitButtonText);
                // submitButton.prop('disabled', false);

                // Redirect the user to the /thankyou page after completion


                // window.location.href = "/thank-you";

                if (window.location.hash !== '#debug') {
                    window.location.href = "/thank-you";
                }
            }
        });

    })

});
