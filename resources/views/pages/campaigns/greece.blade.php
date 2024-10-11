<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns Investment Visa</title>

    <meta name="robots" content="noindex">

    <link rel="icon" href="{{ asset('/assets/img/favicon32x32.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @if ( app()->getLocale() == 'zh' || app()->getLocale() == 'twn' )
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@100..900&display=swap" rel="stylesheet">

        <style>
            body{
                font-family: "Noto Sans SC", sans-serif!important;
                font-optical-sizing: auto;
                font-style: normal;
            }
        </style>
    @endif


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Twitter conversion tracking base code -->


    {{-- Intl Tel Input --}}

    <link rel="stylesheet" href="/assets/css/country-code-plugin/intlTelInput.css">

    <!-- Scripts that will mount the plugin that will add the user's country extension to the phone number input -->
    <script src="/assets/js/country-code-plugin/intlTelInput.js"></script>
    <script src="/assets/js/country-code-plugin/utils.js"></script>
    <script src="/assets/js/country-code-plugin/tel-input-script.js"></script>

    {{-- <script src="/assets/js/us-awareness.js"></script> --}}

    {{-- End of Intl Tel Input --}}

    {{-- Always On CSS File --}}
    <!-- <link rel="stylesheet" href="{{-- mix('/assets/css/campaigns.css') --}}"> -->
    <!-- <link rel="stylesheet" href="/assets/css/private-meetings.css"> -->

    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Compiled CSS for app -->
    <link rel="stylesheet" href="{{ mix('css/always_on.css') }}"> <!-- Compiled CSS for always_on -->
    <link rel="stylesheet" href="{{ mix('css/campaigns.css') }}"> <!-- Compiled CSS for campaigns -->
    {{-- <link rel="stylesheet" href="{{ mix('css/private-meetings.css') }}">--}} <!-- Compiled CSS for private_meetings -->

    <script src="{{ mix('js/app.js') }}" defer></script> <!-- Compiled JS for app -->
    <script src="{{ mix('js/campaigns.js') }}" defer></script> <!-- Compiled JS for campaigns -->


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-820557028">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-820557028');
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- reCAPTCHA --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcKdz4qAAAAAJC3DRRkweeIdwtKXmI9Gk0IThXq"></script>
    <script>

        // reCAPTCHA v3 enterprise (API returns scores based on 1.0 and 0.0 where 1.0 is a score positive that a user is human whereas scores closer to 0 indicate that
        // the system detects that the user is most likely a BOT)
        function recaptchaFunction(e) {
            e.preventDefault(); // Prevent the form from submitting immediately

            const form = e.target; // Reference the form that triggered the event

            const secondaryAddress = form.querySelector('.secondary-address');

            if (secondaryAddress && secondaryAddress.value !== '') {
                return;
            }

            grecaptcha.enterprise.ready(async () => {
                try {
                    // Try to get the reCAPTCHA token
                    const token = await grecaptcha.enterprise.execute('6LcKdz4qAAAAAJC3DRRkweeIdwtKXmI9Gk0IThXq', { action: 'LOGIN' });

                    // If token is successfully generated, append it to the form as a hidden input
                    const input = document.createElement('input');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('name', 'g-recaptcha-response');
                    input.setAttribute('value', token);
                    form.appendChild(input);


                    // Now submit the form programmatically
                    form.submit();
                } catch (error) {
                    // Handle errors, such as reCAPTCHA failing or network issues
                    alert('ReCAPTCHA failed. Please try again.');
                    console.error('ReCAPTCHA Error:', error);
                    // Form submission will remain blocked since form.submit() isn't called
                }
            });
        }
    </script>

    {{-- @include('components.includes') --}}

</head>


{{-- Body --}}
<body class="awarenesss-page">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="
    https://www.googletagmanager.com/ns.html?id=GTM-NMFQZNH"
            height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

{{-- Fixed element CTA --}}
<div id="learn-more-cta" class="popup-fade-in-form">

    <div id="test-click" class="fixed-cta-overlay"></div>

    <div class="image-container">
        {{-- <img src="/assets/img/KATE-G.webp"> --}}
        {{-- <img src="/assets/img/alice-cta.webp"> --}}
        <img src="/assets/img/lindsey-lawrence-headshot.webp">

    </div>

    {{-- <div class="text">Talk To Us</div> --}}
    <div class="text">Hi, how can we help?</div>

</div>

{{-- Fade-In Booking Section --}}
<section id="fade-in-booking-section">

    <div class="background-image-container">
        <img class="background-image" src="/assets/img/campaigns/greece/GR-Form-Wallp@1x.webp">
    </div>

    <div class="container">

        {{-- <h1>This is a test!</h1> --}}

        {{-- Portugal Homes Logo --}}
        <img class="fade-in-logo animate__animated animate__fadeInDownBig" src="/assets/img/brands/iv-logo-color-posit-h-80px.png">

        @include('forms.campaigns_fade_in_form')

    </div>
</section>
<!-- Navbar -->
{{--
<nav id="campaign-navbar" class="navbar navbar-expand-lg navbar-light sticky-top d-block d-sm-none">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Brand</a> -->
        <!-- Hamburger icon that toggles the menu -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <button class="btn btn-close-nav text-dark float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Close">
                <span>&times;</span>
            </button>
            <ul class="navbar-nav">
                <img class="nav-logo" src="/assets/img/campaigns/greece/iv-logo-color-posit-h-80px.png">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Book a Meeting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials-section-pm">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#take-the-opportunity-section">How We Can Help</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
--}}
{{-- Banner --}}
<section id="private-meetings-banner" class="">

    <div class="slider-mask d-block d-sm-none">
        <img class="mask" src="/assets/img/private_meetings/Hero-Slid-Mask-@2x-DTP.webp">
    </div>

    {{-- Image Slider --}}
    <div class="image-slider-wrapper d-block mobile-hidden">
        <div class="splide banner-image-slider">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- Slide 1 -->
                    <div class="image-slide splide__slide">

                        <img src="/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp">

                        <div class="container">
                            {{-- <div > --}}
                            <div class="slider-text-container hidden">
                                <h3 class="slider-title">{!! __('content.slide_sintra_title') !!}</h3>
                                <h4 clas="slider-subtitle">{{ __('content.slide_sintra_subtitle') }}</h4>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="image-slide splide__slide">

                        <img src="/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp">
                        <div class="container">

                            {{-- <div class="slider-title"> --}}
                            <div class="slider-text-container hidden">
                                <h3 class="slider-title">{!! __('content.slide_lisbon_title') !!}</h3>
                                <h4 clas="slider-subtitle">{{ __('content.slide_lisbon_subtitle') }}</h4>
                            </div>
                            {{-- </div> --}}

                        </div>

                    </div>

                    <!-- Slide 3 -->
                    <div class="image-slide splide__slide">

                        <img src="/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp">
                        <div class="container">

                            {{-- <div class="slider-title"> --}}
                            <div class="slider-text-container hidden">
                                <h3 class="slider-title">{!! __('content.slide_algarve_title') !!}</h3>
                                <h4 class="slider-subtitle">{{ __('content.slide_algarve_subtitle') }}</h4>
                            </div>
                            {{-- </div> --}}

                        </div>

                    </div>

                    <!-- Slide 4 -->
                    <div class="image-slide splide__slide">

                        <img src="/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp">
                        <div class="container">

                            {{-- <div class="slider-title"> --}}
                            <div class="slider-text-container hidden">
                                <h3 class="slider-title">{!! __('content.slide_porto_title') !!}</h3>
                                <h4 class="slider-subtitle">{{ __('content.slide_porto_subtitle') }}</h4>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <div class="slider-mask">
            <img class="mask" src="/assets/img/campaigns/greece/Hero-Mask.png">
        </div>
    </div>
    {{-- Moblide Hero --}}
    <div class="image-slider-mobile d-block d-sm-none">
        <img id="mobile-hero" src="/assets/img/campaigns/greece/GR-Scene-Med-Mob.webp">
    </div>

    <div class="container banner-container">

        <a class="logo-link">
                {{-- Default Logo --}}
                <img id="banner-logo" src="/assets/img/campaigns/greece/iv-logo.svg">

        </a>
        {{-- Left Title Banner --}}
        <div class="left-title-banner {{ $class ?? '' }}">

            <div class="container">

                <div class="text-container">
                    <h3 class="title animate__animated animate__fadeInLeft">
                        Unlock Your European Dream<br> With the Greece Golden Visa
                    </h3>
                </div>

                <div class="white-element"></div>

            </div>

        </div>
        <div id="form-container-element-banner" class="generic-form-container private-meetings-country-form">
            <!-- Flag -->
            <div class="flag-container">
                <div class="flag">
                    <lottie-player class="anim" src="/Around-The-World.json" background="transparent" speed="1" style="width: 236px; height: 142px;" loop autoplay></lottie-player>
                </div>
            </div>
            <!-- Flag and text element -->
            <div class="flag-text-container my-4">
                <!-- Text -->
                <div class="text">
                    <h4 class="title text-center">Invest In Your Future<br>Get Started Now</h4>
                </div>

            </div>

            <form id="modal-awareness-form" class="email-validation generic-form private-meetings-form" action="/thank-you-submission" onsubmit="recaptchaFunction(event)">

                <div class="input-container">
                    <div class="col-6">
                        <label for="first_name">First Name *</label>
                        <input type="text" name="first_name" placeholder="" required>
                    </div>
                    <div class="col-6">
                        <label for="last_name">Last Name *</label>
                        <input type="text" name="last_name" placeholder="" required>
                    </div>
                </div>

                {{-- <input type="email" name="email" placeholder="Email*" required> --}}

                {{-- Email Input --}}
                <div class="email-input-container">
                    <label for="email_address">E-mail Address *</label>
                    <input type="email" id="email_address" name="email_address" placeholder="" style="width:100%" required>

                    {{-- Zero Bounce status code --}}
                    <span class="zerobounce-status">Invalid email</span>

                    {{-- Loading Spinning Icon --}}
                    <svg class="email-validation-spinner" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <style>
                            .spinner_qM83{
                                animation:spinner_8HQG 1.05s infinite
                            }
                            .spinner_oXPr{
                                animation-delay:.1s
                            }
                            .spinner_ZTLf{
                                animation-delay:.2s
                            }
                            @keyframes spinner_8HQG{0%,57.14%{animation-timing-function:cubic-bezier(0.33,.66,.66,1);transform:translate(0)}28.57%{animation-timing-function:cubic-bezier(0.33,0,.66,.33);transform:translateY(-6px)}100%{transform:translate(0)}}
                        </style>
                        <circle class="spinner_qM83" cx="4" cy="12" r="3"/><circle class="spinner_qM83 spinner_oXPr" cx="12" cy="12" r="3"/><circle class="spinner_qM83 spinner_ZTLf" cx="20" cy="12" r="3"/>
                    </svg>

                </div>
                <label for="phone_number">Phone Number *</label>
                <input type="tel" id="phone_number" class="contact-number phone-number-extension" name="phone_number" placeholder="" style="width:100%" required>

                <input type="hidden" name="secondary-address" class="secondary-address" value="">

                {{-- What are you looking for? --}}
                <label for="visaSelect">What are you looking for?</label>
                <select id="visaSelect" class="what_are_you_looking_for visa-select" name="what_are_you_looking_for" required>
                    <option selected hidden value="">What are you looking for?</option>
                    <option value="Portugal Golden Visa">Portugal Golden Visa</option>
                    <option value="Portugal D2 Visa">Portugal D2 Visa</option>
                    <option value="Work visa">Work Visa</option>
                    <option value="Retirement">Retirement</option>
                    <option value="Investment Opportunities">Investment Opportunities</option>
                </select>
                <div id="" class="alert alert-warning alert-dismissible fade work-visa-message hidden" role="alert">
                    <a class="btn-close" data-dismiss="alert" aria-label="Close"></a>
                    <h5>You have selected Work Visa.</h5>Investment Visa does not offer services in regards to Work Visas.
                </div>
                <label for="message">Message</label>
                <textarea name="message" placeholder=""></textarea>
                <span class="visas-disclaimer">Investment Visa <b>does not</b> provide Work Visas, Tourism Visas, or Temporary Visas.</span>
                <button
                    id="submitButton"
                    class="submit-button g-recaptcha"
                    type="submit"
                    data-sitekey="your_site_key"
                    data-callback="onSubmit"
                >BOOK YOUR MEETING</button>

                {{-- Keep me updated Checkbox --}}
                <div class="checkbox-wrapper">
                    <input type="hidden" name="signup" value="0" />
                    <input type="checkbox" class="stylize" name="signup" value="1" id="signup">
                    <label class="keep-me-updated-form-span" for="signup">
                        Please keep me updated on Harland and Poston Group news, events and offers.
                    </label>
                </div>

                {{-- Consent text --}}
                <div class="consent-text">
                    By submitting this form, you confirm that you agree that your data will be used to contact you. <a class="privacy" href="https://www.investmentvisa.com/privacy-policy" target="_blank">Read More</a>
                </div>

            </form>

            {{-- <i class="fa fa-times close-button" aria-hidden="true"></i> --}}

        </div>


    </div>
</section>

{{-- What's in it for you? --}}
<section id="whats-in-it-for-you-section">
    <div class="container">

        <!-- List of topics -->
        <div class="row">
            <div class="col-12">
                <h2 class="title my-5">Experience the Mediterranean Lifestyle<br>and Secure Your Future In Europe</h2>
            </div>
            <div class="col-12 col-sm-4 item">
                <img alt="greece" src="/assets/img/campaigns/greece/LIFST-Gr@1x.webp">
                <div class="itemdesc">
                    <h3 class="item-title mb-3">Stable<br>Environment</h3>
                    <p class="desctext">Greece offers a high quality of life, a favorable climate, and friendly communities.</p>
                </div>

            </div>
            <div class="col-12 col-sm-4 item">
                <img alt="greece" src="/assets/img/campaigns/greece/RA-Greece@2x.webp">
                <div class="itemdesc">
                <h3 class="item-title mb-3">Investment<br>Opportunities</h3>
                <p class="desctext">Invest in one of Europe’s most promising real estate markets and secure a future for you and your family.</p>
                </div>
            </div>
            <div class="col-12 col-sm-4 item">
                <img alt="greece" src="/assets/img/campaigns/greece/EU-Flag@2x.webp">
                <div class="itemdesc">
                <h3 class="item-title mb-3">Access To the<br> Schengen Area</h3>
                <p class="desctext">Enjoy seamless travel across 26 European countries with your Golden Visa.</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- X Meetings --}}
<section id="private-meetings-booking-sections" class="finest-properties animate__animated animate__fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title mt-5 mb-3">Greece’s Finest Properties Await</h2>
                <p class="desctext">Experience unparalleled luxury and timeless beauty with our exclusive selection of<br> homes, perfectly suited for your Golden Visa investment in Greece.</p>
            </div>
        </div>
    </div>
    <div id="property-slider-section" class="container mt-5">
        <div class="splide properties-slider" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Archimedes 10" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv8126-archimedes-10" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Moschato, a suburb of Athens, Greece, offers several advantages that make it an attractive place to live and invest.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/art1.png">
                                </div>
                                <div class="content">
                                    <h2>
                                        Archimedes 10
                                    </h2>
                                    <span class="property-price">from €215.000,00</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Piraeus Tron" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv1091-keratsini-apartments" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Discover the epitome of modern and comfortable living at these brand new 1 and 2 bedroom apartments in the highly sought-after neighborhood of Keratsini.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/kera10.png">
                                </div>
                                <div class="content">
                                    <h2>
                                        Piraeus Tron
                                    </h2>
                                    <span class="property-price">from €294.000,00</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="City Living" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv1628-city-living" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Peristeri is a suburb of Athens, Greece, though is it's own municipitality and is known for its modern infrastructure, amenities, and convenient location.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/240429_P2_BACK-min.jpg">
                                </div>
                                <div class="content">
                                    <h2>
                                        City Living
                                    </h2>
                                    <span class="property-price">from €250.000,00</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Peristeri Kopiou" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv1629-peristeri-kopiou" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Spacious apartments with outdoor spaces in lively Peristeri, the location is as close as you can be to central Athens.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/240403_P1_ROAD_-min.jpg">
                                </div>
                                <div class="content">
                                    <h2>
                                        Peristeri Kopiou
                                    </h2>
                                    <span class="property-price">from €250.000,00</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Hibiscus" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv8127-hibiscus" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Egaleo, a suburb located to the west of central Athens, Greece, has several features that make it an attractive place for both living and investing.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/ism.png">
                                </div>
                                <div class="content">
                                    <h2>
                                        Hibiscus
                                    </h2>
                                    <span class="property-price">from €200.000,00</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Mosaic Apartments" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv8128-mosaic-apartments" target="_blank">
                        <div class="property-card">
                            <div class="property-details">
                                <div class="property-description">
                                    Introducing Mosaic Apartments, an exquisite residential development nestled in the vibrant district of Ilioupoli, Athens. This unique project embodies the perfect blend of urban lifestyle and natural beauty.
                                </div>
                                <img class="property-image w-100" src="/assets/img/campaigns/greece/zaf.png">
                            </div>
                            <div class="content">
                                <h2>
                                    Mosaic Apartments
                                </h2>
                                <span class="property-price">from €192.000,00</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Aurora Residence" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv8144-aurora-residence" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Aurora Residence is a thoughtfully designed residential project located in a quiet and sparsely populated area of Argyroupoli, offering an ideal balance of tranquility and convenience.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/1.jpg">
                                </div>
                                <div class="content">
                                    <h2>
                                        Aurora Residence
                                    </h2>
                                    <span class="property-price">from €250.000,00</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Property --}}
                    <div class="property splide__slide col-4">
                        <a title="Aurora Residence" class="property-link" href="https://www.investmentvisa.com/properties/greece/iv8130-discovery-residences" target="_blank">
                            <div class="property-card">
                                <div class="property-details">
                                    <div class="property-description">
                                        Markopoulo, located near Athens in Greece, has gained attention as a favorable place to live and invest.
                                    </div>
                                    <img class="property-image w-100" src="/assets/img/campaigns/greece/1.jpg">
                                </div>
                                <div class="content">
                                    <h2>
                                        Discovery Residences
                                    </h2>
                                    <span class="property-price">from €236.740,00</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Property
                    <div class="property splide__slide col-4">
                        <a title="Glyfada Ellinikon" class="property-link" href="https://www.investmentvisa.com/properties/" target="_blank">
                        <div class="property-card">
                            <div class="property-details">
                                <img class="property-image w-100" src="/assets/img/campaigns/greece/2-min 2.png">
                            </div>
                            <div class="content">
                                <h2>
                                    Glyfada Ellinikon
                                </h2>
                                <span class="property-price">from € 192.000</span>
                            </div>
                        </div>
                        </a>
                    </div>--}}
                    {{-- Property
                    <div class="property splide__slide col-4">
                        <a title="Voula 120" class="property-link" href="https://www.investmentvisa.com/properties/" target="_blank">
                        <div class="property-card">
                            <div class="property-details">
                                <img class="property-image w-100" src="/assets/img/campaigns/greece/1.1-min (9).png">
                            </div>
                            <div class="content">
                                <h2>
                                    Voula 120
                                </h2>
                                <span class="property-price">from €540.000,00</span>
                            </div>
                        </div>
                        </a>
                    </div>--}}
                    {{-- Property
                    <div class="property splide__slide col-4">
                        <a title="Residences Acropolis" class="property-link" href="https://www.investmentvisa.com/properties/" target="_blank">
                        <div class="property-card">
                            <div class="property-details">
                                <img class="property-image w-100" src="/assets/img/campaigns/greece/m4.png">
                            </div>
                            <div class="content">
                                <h2>
                                    Residences Acropolis
                                </h2>
                                <span class="property-price">from €165.000,00</span>
                            </div>
                        </div>
                        </a>
                    </div>--}}
                </ul>
            </div>
        </div>
    </div>
</section>


{{-- Take the Opportunity --}}
<section id="take-the-opportunity-section" class="animate__animated animate__bounceInUp animate__delay-2s">
    <div class="fakebg"></div>
    <!--<img class="salesman-image" src="/assets/img/private_meetings/lister/1-CTA-RD-DTP-Back.webp" style="opacity:0;">-->
    <div class="container">

        <div class="row">

            {{-- Left Content --}}
            <div class="col-md-6">

                <div class="cta-content">

                    <h3 class="title">Ready to Start Your Journey?</h3>

                    <h5 class="subtitle">Take the first step towards your European lifestyle with the Greece Golden<br>
                        Visa. Contact us today to learn more about the application process and <br>how we can assist you in making Greece your new home!
                    </h5>

                    <button class="schedule-button popup-fade-in-form">CONTACT US NOW</button>

                </div>
            </div>

            {{-- Seller's Image --}}
            <div class="col-md-6 salesman-area-wrapper" style="position: relative;">

                {{-- Salesman Name --}}
                <div class="salesman-intro">

                    @if( app()->getLocale() == 'zh' || app()->getLocale() == 'twn' )
                        <style>
                            .salesman-intro{
                                writing-mode: vertical-rl;
                                text-orientation: mixed;
                                display: flex;
                                flex-direction: column-reverse;
                            }
                        </style>
                    @endif
                    <h6 class="name">Mark Wills</h6>
                    <h6 class="position">Investment Advisor</h6>
                </div>

                {{-- Salesman Image --}}
                <img class="salesman-image" src="/assets/img/private_meetings/lister/RD@2xDTP.webp" style="opacity:0;">

                {{-- Background pattern --}}
                <!--
                    <img class="background-image desktop-image" src="/assets/img/private_meetings/Pattern-W1018px-DTP.webp">
                    <img class="background-image mobile-image" src="/assets/img/private_meetings/Pattern-W576px-Mob.webp">
                    -->
            </div>

        </div>

    </div>
</section>

{{-- Testimonials - Private Meetings --}}
<section id="testimonials-section-pm">

    <div class="container">
        <h3 class="title testimonials-title">
            What Our Clients Say About Us
        </h3>
        {{-- Testimonials Content --}}
        <div class="testimonials-content">

            {{-- Mobile Testimonials Slider --}}
            <div class="splide testimonials-slider" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        {{-- Testimonial --}}
                        <div class="testimonial splide__slide">
                            <div class="testimonial-card">
                                <div class="client-details">
                                    <img alt="testimonial image" class="testimonial-img" src="/assets/img/campaigns/greece/APetrus@2x.webp">
                                </div>
                                <div class="content">
                                    <img class="quotemark" src="/assets/img/campaigns/greece/Quotation-Marks.svg">
                                    <!--<i class="fa-solid fa-quote-left"></i>-->
                                    Obtaining my Golden Visa was a life-changing decision. Greece has become our second home, and the lifestyle is unmatched.                                </div>
                                <span class="client-name">Alexander Petrus</span>

                            </div>
                        </div>
                        {{-- Testimonial --}}
                        <div class="testimonial splide__slide">
                            <div class="testimonial-card">
                                <div class="client-details">
                                    <img alt="testimonial image" class="testimonial-img" src="/assets/img/campaigns/greece/BSaab@2x.webp">
                                </div>
                                <div class="content">
                                    <img class="quotemark" src="/assets/img/campaigns/greece/Quotation-Marks.svg">
                                    <!--<i class="fa-solid fa-quote-left"></i>-->
                                    The process was easy, and the support we received made all the difference. I can't recommend the Greece Golden Visa enough.
                                </div>
                                <span class="client-name">Beniel Saab</span>

                            </div>
                        </div>

                        {{-- Testimonial --}}
                        <div class="testimonial splide__slide">
                            <div class="testimonial-card">
                                <div class="client-details">
                                    <img alt="testimonial image" class="testimonial-img" src="/assets/img/campaigns/greece/NJoyce@2x.webp">
                                </div>
                                <div class="content">
                                    <img class="quotemark" src="/assets/img/campaigns/greece/Quotation-Marks.svg">
                                    <!--<i class="fa-solid fa-quote-left"></i>-->
                                    Greece has given my family and me a lifestyle we never dreamed possible. The beautiful landscapes and welcoming atmosphere make every day feel like a vacation.
                                </div>
                                <span class="client-name">Neena Joyce</span>

                            </div>
                        </div>

                        {{-- Testimonial
                        <div class="testimonial splide__slide">
                            <div class="testimonial-card">
                                <div class="client-details">
                                    <span class="client-name">Razaul Al Kaaby</span>
                                    <br>
                                    @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                                        <span class="client-location" style="display: block;margin-top:3px;">阿联酋</span>
                                    @else
                                        <span class="client-location">UAE</span>
                                    @endif
                                    <img class="country-flag" src="/assets/img/countries/flags/uae.webp">
                                </div>
                                <div class="content">
                                    <i class="fa-solid fa-quote-left"></i>
                                    George Hobson is a pleasant young man, came across as knowledgeable, experienced, hardworking, honest & disciplined; I felt very comfortable in easily making my investment.
                                </div>
                            </div>
                        </div>
                        --}}
                        {{-- Testimonial
                        <div class="testimonial splide__slide">
                            <div class="testimonial-card">
                                <div class="client-details">
                                    <span class="client-name">Cai HuiLin</span>
                                    <br>
                                    @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                                        <span class="client-location" style="display: block;margin-top:3px;">中国</span>
                                    @else
                                        <span class="client-location">China</span>
                                    @endif
                                    <img class="country-flag" src="/assets/img/countries/flags/chn.jpg">
                                </div>
                                <div class="content">
                                    <i class="fa-solid fa-quote-left"></i>
                                    Thank you very much for your help. I'm glad to have chosen Portugal Homes as my property management agent.
                                </div>
                            </div>
                        </div>
                        --}}
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- Footer --}}
@include('components.footer-cp')

{{-- Form Element--}}
<div id="form-container-element" class="generic-form-container">

    {{-- <h3 class="gold bolder form-title">Discover how expat life in Portugal can become a reality</h3> --}}

    <form id="modal-awareness-form" class="email-validation generic-form private-meetings-form" action="/thank-you-submission" onsubmit="recaptchaFunction(event)">

        <input type="text" name="first_name" placeholder="First Name*" required>
        <input type="text" name="last_name" placeholder="Last Name*" required>


        {{-- <input type="email" name="email" placeholder="Email*" required> --}}

        {{-- Email Input --}}
        <div class="email-input-container">
            <input type="email" id="email_address" name="email_address" placeholder="Email*" style="width:100%" required>

            {{-- Zero Bounce status code --}}
            <span class="zerobounce-status">Invalid email</span>

            {{-- Loading Spinning Icon --}}
            <svg class="email-validation-spinner" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <style>
                    .spinner_qM83{
                        animation:spinner_8HQG 1.05s infinite
                    }
                    .spinner_oXPr{
                        animation-delay:.1s
                    }
                    .spinner_ZTLf{
                        animation-delay:.2s
                    }
                    @keyframes spinner_8HQG{0%,57.14%{animation-timing-function:cubic-bezier(0.33,.66,.66,1);transform:translate(0)}28.57%{animation-timing-function:cubic-bezier(0.33,0,.66,.33);transform:translateY(-6px)}100%{transform:translate(0)}}
                </style>
                <circle class="spinner_qM83" cx="4" cy="12" r="3"/><circle class="spinner_qM83 spinner_oXPr" cx="12" cy="12" r="3"/><circle class="spinner_qM83 spinner_ZTLf" cx="20" cy="12" r="3"/>
            </svg>

        </div>

        <input type="tel" id="phone_number" class="contact-number phone-number-extension" name="phone_number" placeholder="Contact Number*" style="width:100%" required>

        <input type="hidden" name="secondary-address" class="secondary-address" value="">

        {{-- What are you looking for? --}}
        {{-- <label for="visaSelect">What are you looking for?</label> --}}
        <select id="visaSelect" class="what_are_you_looking_for visa-select" name="what_are_you_looking_for" required>
            <option selected hidden value="">What are you looking for?</option>
            <option value="Portugal Golden Visa">Portugal Golden Visa</option>
            <option value="Portugal D2 Visa">Portugal D2 Visa</option>
            <option value="Work visa">Work Visa</option>
            <option value="Retirement">Retirement</option>
            <option value="Investment Opportunities">Investment Opportunities</option>
        </select>
        <div id="" class="alert alert-danger work-visa-message">
            <h5>You have selected Work Visa.</h5>
            Portugal Homes does not offer services in regards to Work Visas.
        </div>

        <textarea name="message" placeholder="Leave us a message..."></textarea>

        <span class="visas-disclaimer">Investment Visa <b>does not</b> provide Work Visas, Tourism Visas, or Temporary Visas.</span>

        <button id="submitButton" class="submit-button" type="submit">Contact Us - We Call Back</button>

        {{-- Keep me updated Checkbox --}}
        <div class="checkbox-wrapper">
            <input type="hidden" name="signup" value="0" />
            <input type="checkbox" class="stylize" name="signup" value="1" id="signup2">
            <label class="keep-me-updated-form-span" for="signup2">
                Please keep me updated on Harland and Poston Group news, events and offers.
            </label>
        </div>

        {{-- Consent text --}}
        <div class="consent-text">
            Please note that Investment Visa will use the above details to contact you only. By submitting this form, you confirm that you agree to our website terms of use, our privacy policy and consent to cookies being stored on your computer
        </div>

    </form>

    <i class="fa fa-times close-button" aria-hidden="true"></i>

</div>

{{-- Section Anchor Links Element --}}
<div id="section-anchor-links-element">

    <div class="wrapper">

        <div class="container">

            <div class="links-wrapper">

                <div class="link" data-scroll-section="benefits-of-living-in-portugal-section">Benefits</div>
                <div class="link" data-scroll-section="investment-visa-options-section">How to</div>
                <div class="link" data-scroll-section="ph-selling-points-section">Why Us</div>
                <div class="link" data-scroll-section="testimonials-section">Testimonials</div>

            </div>

        </div>

    </div>

</div>

{{-- Down Cheron --}}
<div class="double-down-chevron-bottom">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.293 6.293a1 1 0 0 1 1.414 0L12 11.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414zm0 6a1 1 0 0 1 1.414 0L12 17.586l5.293-5.293a1 1 0 0 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z"/>
    </svg>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>


    !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
    },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js',
        a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
    twq('config','nzuo1');
</script>
<!-- End Twitter conversion tracking base code -->
<script type="text/javascript"> _linkedin_partner_id = "7237345"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script>
<script type="text/javascript"> (function(l) {
        if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])}; window.lintrk.q=[]}
        var s = document.getElementsByTagName("script")[0];
        var b = document.createElement("script");
        b.type = "text/javascript";b.async = true;
        b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
        s.parentNode.insertBefore(b, s);})
    (window.lintrk);
</script>
<noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=7237345&fmt=gif"/>
</noscript>
</body>


</html>
