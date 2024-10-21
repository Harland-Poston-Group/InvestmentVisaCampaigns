// $.noConflict();
document.getElementById('hamburgerMenu').addEventListener('click', function () {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('active');
});

const splide = new Splide('.splide', {
    type: 'loop',
    gap: 60,
    pagination: true,
    arrows: false,
    perPage: 3,
    perMove: 1,
    autoplay: true,
    interval: 6000,
    speed: '500',
    easing: 'ease',
    // Appending the pagination buttons to a specific element
    // pagination: '#testimonial-slider-container',
    breakpoints: {
        991: {
            perPage: 1
        },
    }
    // autoWidth: true,
});

splide.mount();

$(document).ready(function() {

    var form = $('form');

    // Insert the hidden input for the country code extension
    if (form.length > 0) {
        var element = '<div style="opacity: 0; height: 0; overflow: hidden;">\
            <label for="country_code">Extension Phone Number</label>\
            <input id="country_code" type="text" class="extension-input" name="country_code" value="">\
        </div>';

        // var element = '<input type="hidden" class="extension-input" name="country_code" value="">';

        form.append(element);
    }

    // Fetch geolocation data only once
    var geoDataPromise = fetchGeoData();

    // Iterate over each .phone-number-extension input
    $('.phone-number-extension').each(function () {
        var input = this;
        var countryCallingCode;
        var iti = window.intlTelInput(input, {
            initialCountry: "auto",
            // Automatically select the user's country based on their IP address
            separateDialCode: true // Show the country code separately in the input field
        });

        // Use the fetched data once it's available
        geoDataPromise.then(function (data) {
            // ipgeolocation.io
            if (data.country_code2) {
                iti.setCountry(data.country_code2.toUpperCase()); // Set country code based on response
                $(input).closest('form').find('.extension-input').attr('value', data.calling_code);

                // ipapi.co
            } else if (data.country) {
                iti.setCountry(data.country.toUpperCase()); // Set country code based on response
                $(input).closest('form').find('.extension-input').attr('value', data.country_calling_code);
            } else {
                console.log(data);
                console.warn("Unable to determine country code from API response.");
            }
        })["catch"](function (error) {
            console.error("Error fetching geolocation data:", error);
        });
        $(input).on("countrychange", function () {
            console.log("The user changed the selected country");
            /* I'll comment the rest of the code as it may be useful to know specifically the country the person selected */
            countryCallingCode = $(this).siblings('.iti__flag-container').find('.iti__selected-flag').attr('title');
            // countryCallingCode = countryCallingCode.replace(/[^0-9]/g,'');
            // countryCallingCode = "+"+countryCallingCode;

            // Emptying the contact number whenever the person changes the country
            $(this).val("");
            $(this).attr('data-country-code', countryCallingCode);

            // Apply only to the extension input within this form and not other forms in the page
            var form = $(this).closest('form');
            if (form.find(".extension-input").length) {
                // $(".extension-input").attr('value', countryCallingCode);
                // form.find(".extension-input").val(countryCallingCode);
                form.find(".extension-input").attr('value', countryCallingCode);
            }

            //   console.log(countryCallingCode);
        });
    });

    function fetchGeoData() {
        return fetchPrimaryGeoData()["catch"](function () {
            return fetchFallbackGeoData();
        });
    }

    // Function to fetch geolocation data from primary API
    function fetchPrimaryGeoData() {
        return fetch('https://api.ipgeolocation.io/ipgeo?apiKey=55e4b1ac2c0b4e05ad22deb513fe9bcd').then(function (response) {
            if (response.status === 429) {
                console.warn("Received 429 status code from primary API");
                throw new Error("Rate limit exceeded");
            }
            return response.json();
        })["catch"](function (error) {
            console.error("Error fetching geolocation data from primary API:", error);
            throw error;
        });
    }

    // Function to fetch geolocation data from fallback API
    function fetchFallbackGeoData() {
        return fetch('https://ipapi.co/json/').then(function (response) {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })["catch"](function (error) {
            console.error("Error fetching geolocation data from fallback API:", error);
            throw error;
        });
    }


    $(window).on('scroll', function() {
        // Check if the window width is less than 768px (for mobile)
        if ($(window).width() < 768) {

            if ($(this).scrollTop() > 120) {
                $('#top-header').addClass('sticky');
            } else {
                $('#top-header').removeClass('sticky');
            }
        } else {
            // Remove the sticky class if the window is resized to be larger than 768px
            $('#top-header').removeClass('sticky');
        }
    });


   // $("lottie-player").addClass("lottie-custom");

    let currentUrl = window.location.href;

    // Check if the URL contains '/campaign'
    if (currentUrl.indexOf("/campaign") !== -1) {
        // Set a new title for the page
        document.title = "Investment Visa - Residency and Citizenship";
    }

    if (currentUrl.indexOf("/thankyou") !== -1) {
        // Set a new title for the page
        document.title = "Before you leave...";
    }

    $('#campaign-form.thank-you-form').insertBefore('#footer-thank-you').addClass('col-12');

    $('.address-block').html(function(_, html) {
        // Replace "Terms & Conditions | Privacy Policy" with linked text
        return html.replace('Terms & Conditions | Privacy Policy',
            '<a href="https://www.investmentvisa.com/privacy-policy" target="_blank">Terms & Conditions</a> | <a href="https://www.investmentvisa.com/privacy-policy" target="_blank">Privacy Policy</a>'
        );
    });
});
    $(document).ready(function() {

        const blacklist = [
            "free visa",
            "jobless",
            "work parmit",
            "work permit",
            "uber",
            "need job",
            "need a job",
            "job",
            "jobs",
            "encountered an error",
            "unsubscribe",
            "marketing emails",
            "language settings",
            "unable to access my account",
            "sponsor visa",
            "sponsorship visa",
            "tourist visa",
            "work visa",
            "fuck",
            "shit",
            "sshit"
        ];
        $('textarea').on('input', function() {
            let content = $(this).val();
            let foundBlacklisted = false;

            // Check if any blacklisted word/sentence exists
            $.each(blacklist, function(index, word) {
                var regex = new RegExp('\\b' + word + '\\b', 'gi'); // Create regex for each blacklisted word
                if (regex.test(content)) {
                    foundBlacklisted = true;
                    alert("You have written '" + word + "' Investment Visa does not offer services in regard to '" + word + "'.");
                    /*
                    if(word === 'work visa')
                    {
                        alert("You have written Work Visa. Investment Visa does not offer services in regard to Work Visas.");
                    }
                    else {
                        alert("The word or sentence '" + word + "' is not allowed.");

                    }
                    */
                    // Remove the word/sentence from the content
                    content = content.replace(regex, '');
                }
            });

            // Update the textarea with the filtered content
            if (foundBlacklisted) {
                $('textarea').val(content); // Update if a blacklisted word was found
            }
        });
    });


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
document.addEventListener('DOMContentLoaded', function() {
    // Capture referrer and location data
    let referrer = document.referrer;

    let locationData = {};

    /*
    fetch('http://ip-api.com/json/')
        .then(response => response.json())
        .then(data => {
            locationData.country = data.country;
            locationData.city = data.city;
            locationData.region = data.regionName;
            locationData.timezone = data.timezone;
            locationData.query = data.query;
            // Attach form submit event after location data is available
            document.getElementById('campaign-form').addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);

                // Append referrer and location data to the formData
                formData.append('referrer', referrer);
                formData.append('country', locationData.country);
                formData.append('city', locationData.city);
                formData.append('region', locationData.region);
                formData.append('timezone', locationData.timezone);
                formData.append('IP', locationData.query);

                fetch('send-email.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        // Show Toastify toast message
                        Toastify({
                            text: data,
                            duration: 5000, // 5 seconds
                            gravity: "top", // top or bottom
                            position: "center", // left, center, or right
                            backgroundColor: "#6A257A", // customize color
                        }).showToast();
                        // Reset the form after successful submission
                        this.reset();
                    })
                    .catch(error => console.error('Error:', error));
            });
        })
        .catch(err => console.error('Error getting location data:', err));
    */
});


/*
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('campaign-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        fetch('send-email.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                // Show Toastify toast message
                Toastify({
                    text: data,
                    duration: 5000, // 5 seconds
                    gravity: "top", // top or bottom
                    position: "center", // left, center, or right
                    backgroundColor: "#6A257A", // green for success
                }).showToast();
                // Reset the form after successful submission
                this.reset();
            })
            .catch(error => console.error('Error:', error));
    });
});

document.addEventListener("DOMContentLoaded", function() {
    // Detect referrer
    let referrer = document.referrer;
    console.log("Referrer: ", referrer);

    fetch('http://ip-api.com/json/')
        .then(response => response.json())
        .then(data => {
            let country = data.country;
            let city = data.city;
            let regionName = data.regionName;
            let timezone = data.timezone;
            console.log("Region: ", regionName);
            console.log("Country: ", country);
            console.log("City: ", city);
            console.log("Time Zone: ", timezone);
        })
        .catch(err => console.error(err));
});
*/

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');

        // Check if targetId is not just '#'
        if (targetId !== '#') {
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.documentElement.scrollTop > 20) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    }

    scrollToTopBtn.addEventListener('click', function() {
        // console.log('scrollToTopBtn');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

$(window).on('scroll', function() {
    const scrollPosition = $(this).scrollTop();
     // console.log('this Scroll position:', scrollPosition);

    if (scrollPosition >= 100) {
        $('#top-header').addClass('active');
    }

    if (scrollPosition >= 600) {
        $('.right-button-scroll').fadeIn().addClass('active');
    }
    else {
        $('.right-button-scroll').hide().removeClass('active');
        $('#hidden-form').removeClass('active');
        $('#top-header').removeClass('active');

    }
});


$(document).ready(function() {

    $(".nav-menu a").on( "click", function(e) {
        e.preventDefault();
        $('.nav-menu').removeClass('active');
    });

    $('#top-menu .container-fluid').removeClass('container-fluid').addClass('container');

    const newDiv = $('<div class="col-12"></div>');

    // Wrap the content of .footer-iv with the new div
    $('.footer-iv').wrapInner(newDiv);

    $(".right-button-scroll").on( "click", function(e) {
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
});

$(document).ready(function(){

    $('a.btn-close-form').on( "click", function(e) {
        $('#hidden-form').removeClass('active');
    });

    const divsToWrap = $('.video-mask, .header-mask'); // Adjust the selectors to match your divs

    // Wrap the selected divs with a new div
    divsToWrap.wrapAll('<div class="video-wrapper"></div>');


    if($(window).width() < 767)
    {
        $(".right-button-scroll").on( "click", function(e) {
            e.preventDefault();
            $('#hidden-form').addClass('active');
        });


        $('body').addClass('mobile');
        $(".header-mask").attr("src", "/images/headermask-mobile.png").appendTo('.video-container');
        $('#cards-row .card-container').removeClass('col-12').addClass('col-6');
        $('.bottom-cards .card-container').removeClass('col-12').addClass('col-6');
        $('#cards-row .card-container').slice(0, 2).wrapAll('<div class="row"></div>');
        $('#cards-row .card-container').slice(-2).wrapAll('<div class="row"></div>');
        $('.bottom-cards .card-container').wrapAll('<div class="bottom-cards-inner row"></div>');
        $('.title-bottom').insertAfter('.img-bottom');
        $('.title-left').insertAfter('.img-left');

    } else {
        $('body').removeClass('mobile');
        $(".header-mask").attr("src", "/images/headermask.png");
        $('#navbar').removeClass('col-sm-8').addClass('col-sm-12');
        $('#cards-row .card-container').removeClass('col-6').addClass('col-12');
        $('.title-bottom').insertBefore('.img-bottom');
        $('.title-left').insertBefore('.img-left');
    }

    $('.navbar-toggler').on('click', function() {
        $('#navbar').toggleClass('show');
    });

    $(".top-video-block").wrap("<div class='video-container'></div>");

    const url = window.location.href;
    // Example: Extract the path name
    const pathname = window.location.pathname;

    // You can also extract other parts of the URL if needed
    // var hostname = window.location.hostname;
    // var searchParams = new URLSearchParams(window.location.search);
    // var someParam = searchParams.get('someParam');

    // Add class to the body based on the path
    $('body').addClass(pathname.replace(/\//g, 'page-'));

    // Example: Add class based on specific URL condition
    /*
    if (url.includes('admin')) {
        $('body').addClass('admin-page');
    }
    */

    const alert = $('<div id="campaign-info" class="alert alert-warning alert-dismissible fade show mx-auto position-fixed" role="alert"><a class="btn-close" data-dismiss="alert" aria-label="Close"></a>You have selected <b>\'Work Visa\'</b><br>Investment Visa does not offer services in regards to Work Visas.</div>');

    $(".enquiry_subject").on("change", function() {
        const val = $(this).val();

        if (val === "Work visa") {
            $(".form-send-bt").prop("disabled", true);
            alert.prependTo('.video-wrapper').show();
            $(".alert").addClass("show");

        } else {
            $(".form-send-bt").prop("disabled", false);
            $('.alert').removeClass('show').hide();
        }
    });

    $("input#phone").on("keypress keyup blur", function(event) {
        // 1. Check for invalid characters
        var hasInvalidChars = /[^0-9+()-]/.test($(this).val());
        //$(this).val($(this).val().replace(/\s/g, "-"));
        // 2. Modify input value (same as before)
        $(this).val($(this).val().replace(/[^0-9+()-]/g, ""));

        console.log('tel');

        // 3. Add/remove error message based on validity
        if (hasInvalidChars) {
            $(this).addClass("error"); // Add error class to input field
            let msg = 'No Letters Allowed.'
            $('<div class="alert alert-danger error-message m-0 p-1 px-2 small" role="alert"><span class="small">'+ msg +'</span></div>').insertAfter(this);
            // $(".error-message").show(); // Show error message element
        } else {
            $(this).removeClass("error"); // Remove error class
            $(".error-message").hide().css("display", "none"); // Hide error message element
        }
    });

});

// Form submission
$("#campaign-form").on("submit", function(e){

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
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
        data: this_form,
        success:function(response){
            if (response){
                //   $('#success-message').text(response.success).css({"color":"green"});

                // Notify(response.success, null, null, 'success');

                // // Clean form
                // $("#get-in-touch-with-us-form")[0].reset();
                // grecaptcha.reset(); // Reset the reCAPTCHA widget

                console.log('success: ' + response);

                Toastify({
                    text: 'Thank you for your enquiry. We\'ll be in contact, shortly',
                    duration: 5000, // 5 seconds
                    gravity: "top", // top or bottom
                    position: "center", // left, center, or right
                    backgroundColor: "#6A257A", // customize color
                }).showToast();

                // Reset the form after successful submission
                // this_form_element.reset();

            }else{
                // $('#success-message').text(response.error).css({"color":"red"});

                // Notify(response.error, null, null, 'error');
                // enquire_button.attr('disabled', false);
                // grecaptcha.reset(); // Reset the reCAPTCHA widget
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
            this_form_element[0].reset();
            // Redirect the user to the /thankyou page after completion


            // window.location.href = "/thank-you";

            if (window.location.hash !== '#debug') {
                window.location.href = "/thank-you";
            }
        }
    });

});
/*
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    }
});
*/
var urlParams = new URLSearchParams(window.location.search);

// Function to add hidden fields dynamically
function addHiddenField(name, value) {
    if (value !== null && value !== "") {
        $('<input>').attr({
            type: 'hidden',
            name: name,
            value: value
        }).appendTo('#campaign-form');
    }
}

// Add UTM parameters as hidden fields to the form
addHiddenField('utm_source', urlParams.get('utm_source'));
addHiddenField('utm_medium', urlParams.get('utm_medium'));
addHiddenField('utm_campaign', urlParams.get('utm_campaign'));
addHiddenField('utm_term', urlParams.get('utm_term'));
addHiddenField('utm_content', urlParams.get('utm_content'));
