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
    <!-- <link rel="stylesheet" href="{{ mix('/assets/css/always_on.css') }}"> -->
    <!-- <link rel="stylesheet" href="/assets/css/private-meetings.css"> -->

        @vite('/resources/scss/always_on.scss') <!-- Include SCSS via Vite -->
        @vite('resources/scss/private-meetings.scss') <!-- Include SCSS via Vite -->
        @vite('resources/css/private-meetings.css" />')

        @vite('resources/js/private-meetings.js" />')


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
            {{-- <img src="/assets/img/lindsey-lawrence-headshot.webp"> --}}
            <img src="/{{ $cta_agent_image }}">
        </div>

        {{-- <div class="text">Talk To Us</div> --}}
        {{-- <div class="text">Hi, how can we help?</div> --}}
        <div class="text">Questions?<br>Talk to an expert</div>

    </div>

    {{-- Fade-In Booking Section --}}
    <section id="fade-in-booking-section">

        <div class="background-image-container">
            <img class="background-image" src="/assets/img/private_meetings/Form-Window@1xDTP.webp">
        </div>

        <div class="container">

            {{-- <h1>This is a test!</h1> --}}

            {{-- Portugal Homes Logo --}}
            <img class="fade-in-logo animate__animated animate__fadeInRight animate__delay-1s" src="/assets/img/brands/iv-logo-color-posit-h-80px.png">

            @include('forms.private_meetings_fade_in_form')

        </div>
    </section>

    {{-- Banner --}}
    <section id="private-meetings-banner" class="">
<div class="slider-mask">
    <img class="mask" src="/assets/img/private_meetings/Hero-Slid-Mask-@2x-DTP.webp">
</div>
        {{-- Image Slider --}}
        <div class="image-slider-wrapper">
            <div class="splide banner-image-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Slide 1 -->
                        <div class="image-slide splide__slide">

                            <img src="/assets/img/private_meetings/Hero-PT-Pena-W1920px-DTP.webp">

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

                            <img src="/assets/img/private_meetings/Hero-PT-Lx-1920px-DTP.webp">

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

                            <img src="/assets/img/private_meetings/Hero-PT-Alg-W1920px-DTP.webp">

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

                            <img src="/assets/img/private_meetings/Hero-Pt-Porto-W19200px-DTP.webp">

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

            </div>
        </div>

        <div class="container banner-container">

            <a class="logo-link">

                @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )

                    {{-- Logo in Chinese --}}
                    <img id="banner-logo" src="/assets/img/brands/iv-logo-color-posit-h-80px.png">

                @else

                    {{-- Default Logo --}}
                    <img id="banner-logo" src="/assets/img/brands/iv-logo-color-posit-h-80px.png">

                @endif

            </a>

            <div id="form-container-element-banner" class="generic-form-container private-meetings-country-form">
                <!-- Flag -->
                <div class="flag-container">
                    <div class="flag">
                        {{-- <img src="/assets/img/private_meetings/countries/flags/Flag-Philippines-H320px.webp"> --}}
                        <!-- <img src="/{{ $country_flag }}"> -->
                        <lottie-player src="/Around-The-World.json" background="transparent" speed="1" style="width: 236px; height: 142px;" loop autoplay></lottie-player>
                    </div>
                </div>
                <!-- Flag and text element -->
                <div class="flag-text-container my-4">
                    @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                        <style>
                            .flag-text-container .text .title{
                                margin-bottom: 10px!important;
                                font-weight: 600!important;
                                letter-spacing: 3px;

                            }

                            .flag-text-container .text .title,
                            .flag-text-container .text .subtitle{
                                color: #4682B4;
                            }

                            .generic-form-container input::placeholder,
                            .generic-form-container select,
                            .generic-form-container textarea::placeholder{
                                color: #4682B4!important;
                            }
                        </style>

                    @endif

                    <!-- Text -->
                    <div class="text">

                        <h4 class="title">{!! __('content.pm_form_title') !!}</h4>
                        <p class="subtitle">{!! __('content.pm_form_subtitle') !!}</p>

                    </div>

                </div>

                <form id="modal-awareness-form" class="email-validation generic-form private-meetings-form catch-submission">

                    <div class="input-container">

                        <input type="text" name="first_name" placeholder="{{ __('content.form_first_name_placeholder') }}*" required>
                        <input type="text" name="last_name" placeholder="{{ __('content.form_last_name_placeholder') }}*" required>

                    </div>

                    {{-- <input type="email" name="email" placeholder="Email*" required> --}}

                    {{-- Email Input --}}
                    <div class="email-input-container">
                        <input type="email" id="email_address" name="email_address" placeholder="{{ __('content.form_email_placeholder') }}*" style="width:100%" required>

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

                    <input type="tel" id="phone_number" class="contact-number phone-number-extension" name="phone_number" placeholder="{{ __('content.form_phone_number_placeholder') }}*" style="width:100%" required>

                    <input type="hidden" name="secondary-address" class="secondary-address" value="">

                    {{-- What are you looking for? --}}
                    {{-- <label for="visaSelect">What are you looking for?</label> --}}
                    <select id="visaSelect" class="what_are_you_looking_for visa-select" name="what_are_you_looking_for" required>
                        <option selected hidden value="">{{ __('content.form_enquiry_subject_placeholder') }}</option>
                        <option value="Portugal Golden Visa">{{ __('content.portugal_golden_visa') }}</option>
                        <option value="Portugal D2 Visa">{{ __('content.portugal_d2_visa') }}</option>
                        <option value="Work visa">{{ __('content.work_visa') }}</option>
                        <option value="Retirement">{{ __('content.retirement') }}</option>
                        <option value="Investment Opportunities">{{ __('content.investment_opportunities') }}</option>
                    </select>
                    <div id="" class="alert alert-warning alert-dismissible fade work-visa-message hidden" role="alert">
                        <a class="btn-close" data-dismiss="alert" aria-label="Close"></a>
                        {!! __('content.form_ph_does_not_offer_services_in_work_visas') !!}
                    </div>

                    <textarea name="message" placeholder="{{ __('content.form_message_placeholder') }}"></textarea>

                    <span class="visas-disclaimer">{!! __('content.form_visas_disclaimer') !!}</span>

                    <button
                        id="submitButton"
                        class="submit-button g-recaptcha"
                        type="submit"
                        data-sitekey="your_site_key"
                        data-callback="onSubmit"
                    >{{ __('content.form_enquire_button_placeholder') }}</button>

                    {{-- Keep me updated Checkbox --}}
                    <div class="checkbox-wrapper">
                        <input type="hidden" name="signup" value="0" />
                        <input type="checkbox" class="stylize" name="signup" value="1" id="signup">
                        <label class="keep-me-updated-form-span" for="signup">
                            {{ __('content.form_newsletter_checkbox_placeholder') }}
                        </label>
                    </div>

                    {{-- Consent text --}}
                    <div class="consent-text">
                        {!! __('content.form_privacy_policy_placeholder') !!}
                    </div>

                </form>

                {{-- <i class="fa fa-times close-button" aria-hidden="true"></i> --}}

            </div>

        </div>
    </section>

    {{-- What's in it for you? --}}
    <section id="whats-in-it-for-you-section">

        {{-- Left Title Banner --}}
        @include('partials.private_meetings.section_title', [
            'title' =>  __('content.residency_in_portugal_banner_title'),
            'subtitle' => __('content.residency_in_portugal_banner_subtitle')
        ])

        <div class="container">

            <!-- List of topics -->
            <div class="topics-list">

                @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )

                    <style>
                        #whats-in-it-for-you-section .container .topics-list .item .element .content{
                            font-weight: 400;
                        }

                        .left-title-banner .container .text-container .subtitle{
                            font-weight: 300;
                            letter-spacing: 2px
                        }

                        .left-title-banner .container .text-container .title{
                            letter-spacing: 5px
                        }

                    </style>

                @endif

                {{-- <div class="row"> --}}

                    <!-- Item -->
                    <div class="item">
                        <img alt="{{ __('content.residency_in_portugal_d2_business_visa') }}" class="topics-icon" src="/assets/img/private_meetings/icons/ICO-Bright-Future.svg">
                        <div class="title">{!!  __('content.residency_in_portugal_d2_business_visa') !!}</div>

                        <div class="element">
                            <span class="expand-button">+</span>
                            <div class="content">{{ __('content.residency_in_portugal_d2_business_visa_content') }}</div>
                        </div>

                    </div>

                    <!-- Item -->
                    <div class="item">
                        <img alt="{{ __('content.residency_in_portugal_golden_visa') }}" src="/assets/img/private_meetings/icons/Lifestyle.svg" class="topics-icon">
                        <div class="title">{!!  __('content.residency_in_portugal_golden_visa') !!}</div>
                        <div class="element">
                            <span class="expand-button">+</span>
                            <div class="content">{{ __('content.residency_in_portugal_golden_visa_content') }}</div>
                        </div>

                        {{-- <div class="content">Invest in qualified Portuguese funds and pave the way to your European citizenship.</div> --}}

                    </div>

                    <!-- Item -->
                    <div class="item">
                        <img alt="{{ __('content.residency_in_portugal_residency_and_citizenship_by_investment') }}" src="/assets/img/private_meetings/icons/Safety.svg" class="topics-icon">
                        <div class="title">{!! __('content.residency_in_portugal_residency_and_citizenship_by_investment') !!}</div>
                        <div class="element">
                            <span class="expand-button">+</span>
                            <div class="content">{{ __('content.residency_in_portugal_residency_and_citizenship_by_investment_content') }}</div>
                        </div>
                        {{-- <div class="content">Explore investment programs in Europe with the guidance of one of our 16 expert advisors.</div> --}}

                    </div>
                    <!-- Item -->
                    <div class="item">
                        <img alt="{{ __('content.residency_in_portugal_real_estate_investment') }}" src="/assets/img/private_meetings/icons/ICO-Global-Mobility.svg" class="topics-icon">
                        <div class="title">{!! __('content.residency_in_portugal_real_estate_investment') !!}</div>
                        <div class="element">
                            <span class="expand-button">+</span>
                            <div class="content">{{ __('content.residency_in_portugal_real_estate_investment_content') }}</div>
                        </div>
                        {{-- <div class="content">Testing the text</div> --}}
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>

    {{-- X Meetings --}}
    <section id="private-meetings-booking-sections">
        <div class="container">
            <div class="row">
                <div class="col-md-5 right-overflow-image">
                    {{-- <img src="/assets/img/private_meetings/countries/country_image/Philippines-W888px-DTP.webp"> --}}
                    <img class="country-flag" src="/{{ $country_flag }}">
                    <img src="/{{ $country_pm_image }}">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 meetings-list-wrapper">
                    @if( app()->getLocale() == 'zh'  )
                        {{-- Left Title Banner --}}
                        @include('partials.private_meetings.section_title', [
                            'title' =>  __('content.meetings_in_prc'),
                            'title_detail' =>   '',
                            'subtitle' =>   '',
                            'class' =>  'private-meetings-label',
                        ])
                    @elseif( app()->getLocale() == 'twn' )
                        {{-- Left Title Banner --}}
                        @include('partials.private_meetings.section_title', [
                            'title' =>  __('content.meetings_in_taiwan'),
                            'title_detail' =>   '',
                            'subtitle' =>   '',
                            'class' =>  'private-meetings-label',
                        ])
                    @else

                        {{-- Left Title Banner --}}
                        @include('partials.private_meetings.section_title', [
                            'title' =>  __('content.country_name'),
                            'title_detail' =>   __('content.schedule_your_meeting'),
                            'subtitle' =>   '',
                            'class' =>  'private-meetings-label',
                        ])
                    @endif

                    <!-- h3 class="book-meeting-title">{{-- __('content.pre_book_your_spot_now') --}}</h3 -->

                    {{-- List of Meetings --}}
                    <div class="meetings-list">

                        {{-- Meeting Item --}}
                        {{-- <div class="meeting-item">

                            <span class="city-name">Manila</span>
                            <span class="date">Date to be defined</span>

                            <button class="book-button">BOOK</button>

                        </div> --}}

                        {{-- Iterate Countries Private Meeting Cities --}}
                        @foreach ( $country_pm as $city )

                            <div class="meeting-item">

                                <span class="city-name">{{ $city['name'] }}</span>
                                <span class="date">{{ $city['duration'] }}</span>

                                <button class="book-button">{{ __('content.book') }}</button>

                            </div>

                        @endforeach

                    </div>

                </div>





            </div>

        </div>

    </section>

    {{-- Take the Opportunity --}}
    <section id="take-the-opportunity-section" class="animate__animated animate__bounceInUp animate__delay-2s">
        <!--<img class="salesman-image" src="/assets/img/private_meetings/lister/1-CTA-RD-DTP-Back.webp" style="opacity:0;">-->
        <div class="container">

            <div class="row">

                {{-- Left Content --}}
                <div class="col-md-6">

                    <div class="cta-content">

                        <h3 class="title">{!! __('content.take_the_opportunity') !!}</h3>

                        <h5 class="subtitle">{!! __('content.get_the_best_advice') !!}</h5>

                        <button class="schedule-button popup-fade-in-form">{{ __('content.schedule_a_meeting') }}</button>

                    </div>

                    @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                        <style>
                            #take-the-opportunity-section .cta-content .subtitle{
                                font-weight: 400;
                                letter-spacing: 2px;
                            }

                            #take-the-opportunity-section .salesman-area-wrapper .salesman-intro .name,
                            #take-the-opportunity-section .salesman-area-wrapper .salesman-intro .position{
                                letter-spacing: 6px
                            }
                        </style>
                    @endif

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
                        <h6 class="name">{{ __('content.salesman_name') }}</h6>
                        <h6 class="position">{{ __('content.salesman_position') }}</h6>
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

    {{-- Why Portugal Homes --}}
    <section id="why-portugal-homes-section-pm">
        {{-- Left Title Banner --}}
        {{--
        @include('partials.private_meetings.section_title', [
            'title' => __('content.why_portugal_homes'),
            'class' => 'why-portugal-homes'
        ])
--}}
        <div class="container">
            <h2 class="title mb-5 animate__animated animate__fadeInDown animate__delay-2s">{{__('content.why_portugal_homes')}}</h2>

            <div class="row why-portugal-homes">
                <div class="col-12 col-sm-3">
                    <h4 class="mb-4">Personalized <br>Assessment</h4>
                    <p>
                        Get a comprehensive evaluation of your financial goals and discover how Investment Visa can support your international expansion plans.
                    </p>
                </div>
                <div class="col-12 col-sm-3">
                    <h4 class="mb-4">Expert <br>Guidance</h4>
                    <p>
                        Our experienced professionals who specialize in global investment programs. will give you step-by-step advice on the application process, legal requirements, and the best programs suited for you.
                    </p>
                </div>
                <div class="col-12 col-sm-3">
                    <h4 class="mb-4">Tailored Investment <br>Strategies</h4>
                    <p>
                        Understand which investment options (real estate, bonds, government funds, etc.) align with your risk profile and wealth-building objectives.
                    </p>
                </div>
                <div class="col-12 col-sm-3">
                    <h4 class="mb-4">Confidential <br>and Discreet</h4>
                    <p>
                        Your privacy is our top priority. Our meetings are fully confidential, ensuring you receive bespoke advice in a secure and trusted environment.
                    </p>
                </div>

            </div>

            {{-- List of Reasons --}}
            <div class="list-of-reasons container">
                <div class="row" style="position:relative; z-index:2; display: none;">
                    <div class="col-12 col-sm-6">
                        <div class="description left">
                            <h3 class="title">{{ __('content.100%_sucess_rate_title') }}</h3>
                            <h5 class="subtitle">{{ __('content.100%_sucess_rate_description') }}</h5>
                        </div>
                        <img src="/assets/img/always_on_campaign/Image@2x.png">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="description right">
                            <h5 class="subtitle">{{ __('content.+90_nationalities_description') }}</h5>
                            <h3 class="title">{{ __('content.+90_nationalities_title') }}</h3>
                        </div>
                        <img src="/assets/img/always_on_campaign/WorkedWith@2x.png">
                    </div>
                </div>
                <div class="row" style="position:relative; z-index:1;">
                    <div class="col-12 col-sm-12">
                        <!--
                        <div class="description bottom">
                            <h3 class="title">{{ __('content.local_experts_title') }}</h3>
                            <h5 class="subtitle">{{-- __('content.local_experts_description')  --}}</h5>
                        </div>
                        -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <img class="list-of-reasons-bottom-image w-100" src="/assets/img/always_on_campaign/World-Map-@2xDTP.webp">
        </div>
    </section>

    {{-- Testimonials - Private Meetings --}}
    <section id="testimonials-section-pm">

        {{-- Left Title Banner --}}
        {{--
        @include('partials.private_meetings.section_title', [
            'title' => __('content.hear_it_from_our_clients'),
            'class' => 'testimonials-pm'
        ])
        --}}
        <div class="container">
            <h3 class="title testimonials-title">
                {!! __('content.hear_it_from_our_clients') !!}
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
                                        <span class="client-name">Mark Williamson</span>
                                        <br>
                                        @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                                            <span class="client-location" style="display: block;margin-top:3px;">美国</span>
                                        @else
                                            <span class="client-location">USA</span>
                                        @endif
                                        <img class="country-flag" src="/assets/img/countries/flags/usa.png">
                                    </div>
                                    <div class="content">
                                        <i class="fa-solid fa-quote-left"></i>
                                        Ryan, our investment advisor was very helpful with the Golden Visa process and buying the property from day one. We feel we can trust Portugal Homes, and this is the main issue when you want to invest in a foreign country. All the staff were professional and friendly.
                                    </div>
                                </div>
                            </div>
                              {{-- Testimonial --}}
                              <div class="testimonial splide__slide">
                                  <div class="testimonial-card">
                                      <div class="client-details">
                                          <span class="client-name">Margarette Chang</span>
                                          <br>
                                          @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                                              <span class="client-location" style="display: block;margin-top:3px;">香港</span>
                                          @else
                                              <span class="client-location">Hong Kong</span>
                                          @endif
                                          <img class="country-flag" src="/assets/img/countries/flags/hk.png">
                                      </div>
                                      <div class="content">
                                          <i class="fa-solid fa-quote-left"></i>
                                          Good website and communication. Excellent, knowledgeable. We were really pleased with Matthew and would recommend him highly. If we had decided to stay in Portugal instead of moving to the USA, I am sure he would have found us a great place. Thank you.                                      </div>
                                  </div>
                              </div>

                              {{-- Testimonial --}}
                              <div class="testimonial splide__slide">
                                  <div class="testimonial-card">
                                      <div class="client-details">
                                          <span class="client-name">Craig Wilson</span>
                                          <br>
                                          @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
                                              <span class="client-location" style="display: block;margin-top:3px;">英国</span>
                                          @else
                                              <span class="client-location">UK</span>
                                          @endif
                                          <img class="country-flag" src="/assets/img/countries/flags/uk.png">
                                      </div>
                                      <div class="content">
                                          <i class="fa-solid fa-quote-left"></i>
                                          The process was very quick and clear. I got all the information I needed in the first hour. The experience was perfect.
                                      </div>
                                  </div>
                              </div>

                              {{-- Testimonial --}}
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
                              {{-- Testimonial --}}
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
                          </ul>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Footer --}}
    @include('components.footer-pm')

    {{-- Form Element --}}
    <div id="form-container-element" class="generic-form-container">

        {{-- <h3 class="gold bolder form-title">Discover how expat life in Portugal can become a reality</h3> --}}

        <form id="modal-awareness-form" class="email-validation generic-form private-meetings-form catch-submission">

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
            <div id="" class="alert alert-danger work-visa-message"><h5>You have selected Work Visa.</h5>Portugal Homes does not offer services in regards to Work Visas.</div>

            <textarea name="message" placeholder="Leave us a message..."></textarea>

            <span class="visas-disclaimer">{!! __('content.form_visas_disclaimer') !!}</span>

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
