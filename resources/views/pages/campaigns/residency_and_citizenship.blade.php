<!DOCTYPE html>
<html class="no-scroll" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Visa - Golden Visa</title>

    <link rel="icon" type="image/png" href="/images/favicon32x32.png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- OG Meta Tags --}}
    <meta property="og:title" content="Investment Visa - Greece Golden Visa" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Unlock Your European Dream With the Greece Golden Visa" />
    <meta property="og:image" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />
    <meta property="og:url" content="https://campaigns.investmentvisa.com/residency-and-citizenship" />
    <meta property="og:site_name" content="Investment Visa" />
    <meta property="og:locale" content="en_US" />

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Grant of Residency or Citizenship on the Basis of an Investment" />
    <meta name="twitter:image" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />

    <meta name="description" content="Grant of Residency or Citizenship on the Basis of an Investment" />


    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Intl Tel Input --}}
    <link rel="stylesheet" href="/assets/css/country-code-plugin/intlTelInput.css">

    <!-- Scripts that will mount the plugin that will add the user's country extension to the phone number input -->
    <script src="/assets/js/country-code-plugin/intlTelInput.js"></script>
    <script src="/assets/js/country-code-plugin/utils.js"></script>
    <script src="/assets/js/country-code-plugin/tel-input-script.js"></script>
    {{-- moved to script.js --}}

    {{-- Includes --}}
    @include('partials.scripts')

    {{-- App.js --}}
    <script src="/js/app.js" defer></script>
    <script src="/assets/js/greece_gv.js"></script>
    <script src="/assets/js/multistep_form.js"></script>

    {{-- App.css --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/residency_and_citizenship.css?v={{ uniqid() }}">

</head>

    <body>

        {{-- Header --}}
        <header id="header">

            <div class="container">

                <div class="header-inner-wrapper">

                    {{-- Logo --}}
                    <div class="logo-wrapper">
                        <img src="/assets/img/logos/logo-white.svg" id="header-logo">
                    </div>

                    {{-- Mobile Menu Button --}}
                    <p class="mobile-menu-button">{{ translate('Menu', $lang) }}</p>
                    <p class="mobile-menu-close-button">{{ translate('Close', $lang) }}</p>

                    {{-- Sections Options --}}
                    <div class="options-wrapper">

                        <a href="#golden-visa-benefits" class="section-anchor linkSlide">{{ translate('Benefits', $lang) }}</a>
                        <a href="#our-top-picks-section" class="section-anchor linkSlide">{{ translate('Top Picks', $lang) }}</a>
                        <a href="#multistep-form-section" class="section-anchor linkSlide">{{ translate('Take a Quiz', $lang) }}</a>
                        <a href="#testimonials-gv-page-revamp-section" class="section-anchor linkSlide">{{ translate('Testimonials', $lang) }}</a>

                    </div>

                    {{-- @dump(App::getLocale()) --}}

                    @php
                        $curr_locale = App::getLocale();
                        $locales_array = config('localization.supported_locales_array');
                        $locale_data = config('localization.supported_locales_array')[$curr_locale] ?? null;
                    @endphp

                    @if( config('localization.supported_locales_array') && !is_null($locale_data) )

                        <div class="nav-wrapper">
                            <div class="sl-nav">
                            <span class="language">Language:</span>
                            <ul>
                                <li>

                                    {{-- Current Language --}}
                                    <b class="current-language">{{ $locale_data['name'] }}</b> <i class="fa fa-angle-down" aria-hidden="true"></i>

                                    {{-- <div class="triangle"></div> --}}

                                    {{-- List of Countries --}}
                                    <ul>

                                        @foreach ($locales_array as $locale)

                                            {{-- @dump($locale['initials']) --}}

                                            @php

                                                // If it's english, don't insert a URL
                                                if( ( $locale['initials'] === 'en') && ( $curr_locale === 'en' ) ){
                                                    $link = '';
                                                }else{
                                                    $link = route('residency-and-citizenship') . '/' . $locale['initials'];
                                                }

                                            @endphp

                                            <a href="{{ $link }}">
                                                <li class="{{ ($curr_locale === $locale['initials']) ? 'active' : '' }}">
                                                    {{-- <i class="sl-flag flag-usa"
                                                        style="background:url({{ $locale['flag'] }})"
                                                    ></i> --}}
                                                    <span>{{ $locale['name'] }}</span>
                                                </li>
                                            </a>
                                            
                                        @endforeach

                                        {{-- <a href="{{ route('residency-and-citizenship') }}">
                                            <li>
                                                <i class="sl-flag flag-usa"></i> <span>English</span>
                                            </li>
                                        </a>
                                        <a href="{{ route('residency-and-citizenship') }}/fr">
                                            <li>
                                                <i class="sl-flag flag-de"></i> <span class="active">French</span>
                                            </li>
                                        </a> --}}

                                    </ul>

                                </li>
                            </ul>
                            </div>
                        </div>

                    @endif

                </div>

            </div>

            {{-- Mobile Menu --}}
            <div class="mobile-menu">



                    {{-- Sections Options --}}
                    <div class="options-wrapper-mobile">

                        <div class="container">
                            <a href="#golden-visa-benefits" class="section-anchor linkSlide">{{ translate('Benefits', $lang) }}</a>
                        </div>

                        {{-- Horizontal Line (separator) --}}
                        <div class="horizontal-line"></div>

                        <div class="container">
                            <a href="#our-top-picks-section" class="section-anchor linkSlide">{{ translate('Top Picks', $lang) }}</a>
                        </div>

                        {{-- Horizontal Line (separator) --}}
                        <div class="horizontal-line"></div>

                        <div class="container">
                            <a href="#multistep-form-section" class="section-anchor linkSlide">{{ translate('Take a Quiz', $lang) }}</a>
                        </div>

                        {{-- Horizontal Line (separator) --}}
                        <div class="horizontal-line"></div>

                        <div class="container">
                            <a href="#testimonials-gv-page-revamp-section" class="section-anchor linkSlide">{{ translate('Testimonials', $lang) }}</a>
                        </div>

                        {{-- Horizontal Line (separator) --}}
                        <div class="horizontal-line"></div>

                    </div>

                </div>

            </div>

        </header>

        {{-- Banner Section --}}
        <section id="banner-section">

            {{-- Content with sliding background on page load --}}
            <div class="rollover-element">
                <div class="container">
                    <div class="row">

                        <div class="col-md-7 banner-column">

                            <div class="banner-title">
                                <h1>{!! translate('Golden Visa. The Best<br> Investment For Your Future', $lang) !!}</h1>
                            </div>

                        </div>
                        <div class="col-md-5"></div>

                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-7 banner-column">

                    <h4 class="banner-subtitle">
                        {!! translate('<strong>Invest €250k</strong> and diversify your portfolio, gain the freedom to travel, and secure a Plan B for your family.', $lang) !!}
                    </h4>

                </div>

                <div class="col-md-5"></div>

            </div>


        </section>

        {{-- Banner Form --}}
        <div class="container form-container-element banner-form-container">

            {{-- Revamped Form --}}
            <form id="" class="generic-form-container">

                @csrf

                <h3 class="title">{{ translate('Get Started Now', $lang) }}</h3>

                <div class="input-container form-row">

                    {{-- First Name --}}
                    <div class="wrapper">
                        <label for="first_name">{{ translate('First Name', $lang) }} *</label>
                        <input type="text" name="first_name" required>
                    </div>

                    {{-- Last Name --}}
                    <div class="wrapper">
                        <label for="last_name">{{ translate('Last Name', $lang) }} *</label>
                        <input type="text" name="last_name" required>
                    </div>

                </div>

                <div class="input-container form-row">

                    {{-- Email --}}
                    <div class="email-input-container">

                        <label for="email_address">{{ translate('Email Address', $lang) }}*</label>
                        <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email Address*" style="width:100%" required>

                        {{-- Zero Bounce status code --}}
                        <span class="zerobounce-status">{{ translate('Invalid email', $lang) }}</span>

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

                    {{-- Phone Number --}}
                    <div class="wrapper">
                        <label for="last_name">{{ translate('Phone', $lang) }}*</label>
                        @include('forms.inputs.phone_number')
                    </div>

                </div>

                <div class="wrapper form-row">
                    <label for="enquiry_subject">{{ translate('What are you looking for', $lang) }}*</label>
                    @include('forms.inputs.what_are_you_looking_for')
                </div>

                <div class="wrapper form-row">
                    <label>{{ translate('How much are you willing to invest?', $lang) }}*</label>
                    @include('forms.inputs.investment_amount')
                </div>

                <div class="wrapper form-row">
                    <label for="message_textarea">{{ translate('Message us', $lang) }}</label>
                    @include('forms.inputs.message')
                </div>

                {{-- <span class="visas-disclaimer-revamp">Portugal Homes <b>does not</b> provide Work Visas, Tourism Visas, or Temporary Visas.</span> --}}

                <div class="button-row">

                    <div class="horizontal-line"></div>

                    <button class="stylize" type="submit">{{ translate('Book Your Meeting', $lang) }}</button>
                </div>

                <span class="consent-text">{{ translate('By submitting this form, you confirm that you agree that your data will be used to contact you.', $lang) }}</span>

            </form>

        </div>

        {{-- Golden Visa Program Benefits --}}
        <section id="golden-visa-benefits" class="section-inner-padding">
            <div class="container">

                {{-- <h2 class="title">A Golden Visa Program Grants<br> Access to Many Benefits</h2> --}}
                <h2 class="title">{{ translate('A Golden Visa Program Grants Access to Many Benefits', $lang) }}</h2>

                <div class="benefits-wrapper">
                    <div class="row">

                        {{-- Item --}}
                        <div class="col-md-3 col-6 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/beach.jpeg">

                            {{-- Title --}}
                            <h3>{{ translate('Diversify Your Assets', $lang) }}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Expand your assets and build equity by investing in international real estate and investment funds.', $lang) }}</p>

                        </div>

                        {{-- Item --}}
                        <div class="col-md-3 col-6 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/crypt-compressed.webp">

                            {{-- Title --}}
                            <h3>{{ translate('Stable Economies', $lang) }}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Expose your business to new markets and explore dynamic opportunities.', $lang) }}</p>

                        </div>

                        {{-- Item --}}
                        <div class="col-md-3 col-6 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/pool_family-compressed.webp">

                            {{-- Title --}}
                            <h3>{!! translate('Plan B<br> Peace of Mind', $lang) !!}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Safety and quality living, along with top-tier healthcare and education, for you and your family.', $lang) }}</p>

                        </div>

                        {{-- Item --}}
                        <div class="col-md-3 col-6 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/eu-flag-compressed.webp">

                            {{-- Title --}}
                            <h3>{{ translate('Schengen Area Access', $lang) }}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Enjoy seamless travel across 26 European countries with your Golden Visa.', $lang) }}</p>

                        </div>

                    </div>
                </div>

            </div>
        </section>

        {{-- Our Top Picks Programs --}}
        <section id="our-top-picks-section" class="section-inner-padding">
            <div class="container">

                <h2 class="title">{{ translate('Our top pick programs', $lang) }}</h2>

                <div class="top-picks-wrapper">
                    <div class="row">

                        {{-- Item --}}
                        <div class="col-md-4 item">

                            {{-- Title --}}
                            <div class="title">
                                <h4>{{ translate('Greece Golden Visa', $lang) }}</h4>
                            </div>

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/greece-gv-compressed.webp">

                            <div class="program-details">

                                <div class="investment-minimum-wrapper">

                                    <h5>{{ translate('Investment Minimum', $lang) }}</h5>
                                    <span>€ 250.000</span>

                                </div>

                                <div class="process-duration-wrapper">

                                    <h5>{{ translate('Process Duration', $lang) }}</h5>
                                    <span>{{ translate('1 to 3 Months', $lang) }}</span>

                                </div>

                            </div>

                        </div>

                        {{-- Mobile Horizontal Line --}}
                        <div class="mobile-horizontal-line"></div>

                        {{-- Item --}}
                        <div class="col-md-4 item">

                            {{-- Title --}}
                            <div class="title">
                                <h4>{{ translate('Portugal Golden Visa', $lang) }}</h4>
                            </div>

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/portugal-gv-compressed.webp">

                            <div class="program-details">

                                <div class="investment-minimum-wrapper">

                                    <h5>{{ translate('Investment Minimum', $lang) }}</h5>
                                    <span>€ 250.000</span>

                                </div>

                                <div class="process-duration-wrapper">

                                    <h5>{{ translate('Process Duration', $lang) }}</h5>
                                    <span>{{ translate('6 to 18 Months', $lang) }}</span>

                                </div>

                            </div>

                        </div>

                        {{-- Mobile Horizontal Line --}}
                        <div class="mobile-horizontal-line"></div>

                        {{-- Item --}}
                        <div class="col-md-4 item">

                            {{-- Title --}}
                            <div class="title">
                                <h4>{{ translate('UAE Golden Visa', $lang) }}</h4>
                            </div>

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/uae-gv-compressed.webp">

                            <div class="program-details">

                                <div class="investment-minimum-wrapper">

                                    <h5>{{ translate('Investment Minimum', $lang) }}</h5>
                                    <span>AED 750.00</span>

                                </div>

                                <div class="process-duration-wrapper">

                                    <h5>{{ translate('Process Duration', $lang) }}</h5>
                                    <span>{{ translate('2 to 6 Months', $lang) }}</span>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>

        {{-- Multistep Form Progress Section --}}
        <section id="multistep-form-section">
            {{-- <div class="container"> --}}

                {{-- Fade Element --}}
                <div class="background-fade"></div>

                <div class="place-line horizontal-line"></div>

                <div class="multistep-wrapper">

                    <form id="multistep-form" class="col-12">

                        @csrf

                        {{-- Last step of the form (personal data) --}}
                        <div class="form-inner-wrapper question first-step" data-question-id="first">

                            <div class="head animate__animated animate__fadeInLeft logo-row">
                                <div class="head-inner-wrapper">

                                    {{-- Logo --}}
                                    <img src="/assets/img/logos/logo-white.svg">

                                </div>
                            </div>

                            {{-- Question Title --}}
                            {{-- <h1 class="name animate__animated animate__fadeInLeft">Thank you for taking the quiz</h1> --}}
                            <div class="name thank-you-wrapper animate__animated animate__fadeInLeft">
                                <h2 class="title">{!! translate('Find out which one of our programs<br> is the best fit for your plans', $lang) !!}</h2>

                                <h4 class="subtitle">{!! translate('Diversify your investments, get freedom of travel and secure<br> a plan B in a stable economy for you and your family.', $lang) !!}</h4>
                            </div>

                            {{-- List of questions --}}
                            <div class="list-wrapper animate__animated animate__fadeInUp">
                                <div class="list last-step-form-wrapper">

                                    {{-- Personal Data Inputs --}}


                                </div>
                            </div>

                            <div class="bottom-progress-wrapper col-12">

                                {{-- Edit the progress of the form by advancing in it --}}
                                <div class="form-step-advancement-wrapper">

                                    <button class="next-btn purple-bg">{!! translate('Start Golden Visa Quiz', $lang) !!} @include('partials.arrows.right_arrow')</button>

                                </div>

                            </div>

                        </div>

                        {{-- Iterate questions and render whole element --}}
                        @foreach ($multistep_form['questions'] as $question)

                            <div class="form-inner-wrapper question" data-question-id="{{ $question ['id'] }}" style="display: none;">

                                <div class="head logo-row">
                                    <div class="head-inner-wrapper">

                                        {{-- Logo --}}
                                        <img src="/assets/img/logos/logo-white.svg">
                                        {{-- <img class="logo" src="/assets/img/logos/logo.png"> --}}


                                    </div>
                                </div>

                                {{-- Question Title --}}
                                <h2 class="name animate__animated animate__fadeInLeft">{!! translate($question['question_text'], $lang) !!}</h2>

                                @if( $question['allows_multiple_answers'] )
                                    <div class="detail animate__animated animate__fadeInLeft">
                                        <span class="multiple-answers-option">{!! translate('Multiple answers options', $lang) !!}</span>
                                    </div>
                                @endif

                                {{-- List of questions --}}
                                <div class="list-wrapper animate__animated animate__fadeInUp">
                                    <div class="list">

                                        {{-- Iterate Answers --}}
                                        @foreach ($question['answers'] as $answer)

                                            {{-- <label class="askItem">
                                                <input
                                                    type="{{ $question['allows_multiple_answers'] ? 'checkbox' : 'radio' }}"
                                                    name="question_{{ $question['id'] }}[]"
                                                    value="{{ $answer['id'] }}"
                                                />
                                                <span class="itemName">{{ $answer['answer_text'] }}</span>

                                                <span class="checkbox">
                                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 78.369 78.369" xml:space="preserve">
                                                        <path d="M78.049,19.015L29.458,67.606c-0.428,0.428-1.121,0.428-1.548,0L0.32,40.015c-0.427-0.426-0.427-1.119,0-1.547l6.704-6.704c0.428-0.427,1.121-0.427,1.548,0l20.113,20.112l41.113-41.113c0.429-0.427,1.12-0.427,1.548,0l6.703,6.704C78.477,17.894,78.477,18.586,78.049,19.015z"></path>
                                                    </svg>
                                                </span>

                                            </label> --}}

                                            {{-- <div class="answer-option"> --}}

                                                <label class="answer-option">
                                                    <input
                                                        type="{{ $question['allows_multiple_answers'] ? 'checkbox' : 'radio' }}"
                                                        name="question_{{ $question['id'] }}[]"
                                                        value="{{ $answer['id'] }}"
                                                    />
                                                    <span class="custom-circle"></span>
                                                    <span class="custom-label">{{ translate($answer['answer_text'], $lang) }}</span>
                                                </label>

                                            {{-- </div> --}}

                                        @endforeach

                                    </div>
                                </div>

                                <div class="bottom-progress-wrapper col-12">

                                    @php

                                        // Adding one more item to the total number of items so that the progress bar is not full at the last question
                                        // This way, the last step of the form would be the submission itself, makes more sense in the UI
                                        $adjusted_total = $loop->count + 1;

                                    @endphp

                                    {{-- Progress of the form's completion --}}
                                    <div class="progress-container">
                                        {{-- {{ $loop->iteration }}/{{ $adjusted_total }}

                                        <div class="progress-bar" style="--progress-value: {{ ( ($loop->iteration / $adjusted_total) * 100 ) }}%;">
                                            <div class="progress-bar-fill"></div>
                                        </div> --}}

                                        @for ($i = 1; $i <= $adjusted_total; $i++)

                                            @php

                                                if( $i <= $loop->iteration ){
                                                    $active_bg = 'active';

                                                }else{
                                                    $active_bg = '';
                                                }

                                                if( $i == $loop->iteration ){
                                                    $step_active = 'active';
                                                }else{
                                                    $step_active = '';
                                                }

                                            @endphp

                                            <div class="progress-circle-wrapper">
                                                <span class="step-count {{ $step_active }}">{{ $loop->iteration }}/{{ $adjusted_total }}</span>
                                                <div class="progress-circle {{ $active_bg }}"></div>
                                            </div>

                                        @endfor

                                    </div>

                                    {{-- Edit the progress of the form by advancing in it --}}
                                    <div class="form-step-advancement-wrapper">

                                        {{-- Insert back arrow if not in first question --}}
                                        @if( !($loop->first) )
                                            <button class="prev-btn">
                                                @include('partials.arrows.right_arrow')
                                            </button>
                                        @endif

                                        {{-- If this is the last question - present the submit button --}}
                                        @if( $loop->last )
                                            {{-- <button type="submit" class="submit-btn purple-bg">Submit</button> --}}
                                            <button class="next-btn last-question purple-bg">{{ translate('Next', $lang) }} @include('partials.arrows.right_arrow')</button>

                                        @else
                                            <button class="next-btn purple-bg">{{ translate('Next', $lang) }} @include('partials.arrows.right_arrow')</button>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        @endforeach

                        {{-- Last step of the form (personal data) --}}
                        <div class="form-inner-wrapper question last-step" style="display: none;">

                            <div class="head logo-row">
                                <div class="head-inner-wrapper">

                                    {{-- Logo --}}
                                    <img src="/assets/img/logos/logo-white.svg">

                                </div>
                            </div>

                            {{-- Question Title --}}
                            {{-- <h1 class="name animate__animated animate__fadeInLeft">Thank you for taking the quiz</h1> --}}
                            <div class="name thank-you-wrapper animate__animated animate__fadeInLeft">
                                <h2 class="title">{{ translate('Thank you for taking the quiz', $lang) }}</h2>

                                <h4 class="subtitle">{{ translate('Please fill in your details, and we will contact<br> you shortly to present our best options.', $lang) }}</h4>
                                {{-- <h4 class="subtitle">We will contact you soon to present our best options</h4> --}}
                            </div>

                            {{-- List of questions --}}
                            <div class="list-wrapper animate__animated animate__fadeInUp">
                                <div class="list last-step-form-wrapper">

                                    {{-- Personal Data Inputs --}}
                                    <div class="personal-data-wrapper">

                                        <div class="input-container">

                                            <div class="wrapper">
                                                <label for="first_name">{{ translate('First Name', $lang) }}*</label>
                                                <input type="text" id="first_name" placeholder="" class="form-control" name="first_name" required>
                                            </div>

                                            <div class="wrapper">
                                                <label for="last_name">{{ translate('Last Name', $lang) }}*</label>
                                                <input type="text" id="last_name" placeholder="" class="form-control" name="last_name" required>
                                            </div>

                                        </div>

                                        <div class="input-container">

                                            {{-- Email --}}
                                            {{-- @include('forms.inputs.email') --}}
                                            <div class="wrapper">
                                                <div class="email-input-container">
                                                    <label>{{ translate('Email Address', $lang) }}*</label>
                                                    <input type="email" id="email_address" name="email_address" class="form-control" placeholder="" style="width:100%" required>

                                                    {{-- Zero Bounce status code --}}
                                                    <span class="zerobounce-status">{{ translate('Invalid email', $lang) }}</span>

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
                                            </div>

                                            {{-- Phone Number --}}
                                            {{-- @include('forms.inputs.phone_number') --}}
                                            <div class="wrapper">
                                                <label for="phone_number">{{ translate('Contact Number', $lang) }}*</label>
                                                <input type="tel" id="phone_number" class="contact-number phone-number-extension form-control" name="phone_number" placeholder="" style="width:100%" required>
                                            </div>

                                        </div>

                                        <div class="wrapper">
                                            <label for="message">{{ translate('Would you like to share more details with us?', $lang) }}</label>
                                            <textarea id="message" class="form-control" name="message"></textarea>
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <div class="bottom-progress-wrapper col-12">

                                @php

                                    // Adding one more item to the total number of items so that the progress bar is not full at the last question
                                    // This way, the last step of the form would be the submission itself, makes more sense in the UI
                                    // $adjusted_total = $loop->count + 1;

                                @endphp

                                {{-- Progress of the form's completion --}}
                                    {{-- Progress of the form's completion --}}
                                    <div class="progress-container">

                                        @for ($i = 1; $i <= $adjusted_total; $i++)

                                            @php
                                                if( $i == $adjusted_total ){
                                                    $step_active = 'active';
                                                }else{
                                                    $step_active = '';
                                                }
                                            @endphp

                                            <div class="progress-circle-wrapper">
                                                <span class="step-count {{ $step_active }}">{{ $adjusted_total }}/{{ $adjusted_total }}</span>
                                                <div class="progress-circle active"></div>
                                            </div>

                                        @endfor

                                    </div>

                                {{-- Edit the progress of the form by advancing in it --}}
                                <div class="form-step-advancement-wrapper">

                                    {{-- Insert back arrow if not in first question --}}
                                    {{-- @if( !($loop->first) ) --}}
                                        <button class="prev-btn">
                                            @include('partials.arrows.right_arrow')
                                        </button>
                                    {{-- @endif --}}

                                    {{-- If this is the last question - present the submit button --}}
                                    {{-- @if( $loop->last ) --}}
                                        {{-- <button type="submit" class="submit-btn purple-bg">Submit</button> --}}
                                        <button type="submit" class="submit-btn last-question purple-bg">{{ translate('Complete', $lang) }} @include('partials.arrows.right_arrow')</button>

                                    {{-- @else --}}
                                        {{-- <button class="next-btn purple-bg">Next @include('partials.arrows.right_arrow')</button>
                                    @endif --}}

                                </div>

                            </div>

                        </div>

                        {{-- Thank you step --}}
                        <div class="form-inner-wrapper question thank-you-step" style="display: none;">

                            <div class="head logo-row">
                                <div class="head-inner-wrapper">

                                    {{-- Logo --}}
                                    <img src="/assets/img/logos/logo-white.svg">

                                </div>
                            </div>

                            {{-- Question Title --}}
                            {{-- <h1 class="name animate__animated animate__fadeInLeft">Thank you for taking the quiz</h1> --}}
                            <div class="name thank-you-wrapper animate__animated animate__fadeInLeft">
                                <h2 class="title">{{ translate('Thank you for your submission', $lang) }}</h2>

                                <h4 class="subtitle">{{ translate('We will contact you soon to present our best options', $lang) }}</h4>
                            </div>


                        </div>


                    </form>

                </div>

            {{-- </div> --}}

                {{-- Answer not picked notification --}}
                <div id="no-answer-notification">
                    <span>{{ translate('Please answer the question', $lang) }}</span>
                </div>
        </section>

        {{-- Testimonials --}}
        <section id="testimonials-gv-page-revamp-section" class="section-inner-padding">
            <div class="container">

                <h2 class="title">{{ translate('What Our Clients Say About Us', $lang) }}</h2>

                <div class="splide testimonials-wrapper">
                    {{-- <div class="row"> --}}
                    <div class="splide__track">
                        <ul class="splide__list">

                            {{-- Item --}}
                            <div class="splide__slide item">

                                @include('partials.quote_marks')
                                <h5 class="testimonial-text">{{ translate('I couldn\'t be happier with the guidance I received from the Investment Visa team for my Golden Visa in Greece. I highly recommend them to anyone looking for a professional service.', $lang) }}</h5>

                                <span class="client-name">{{ translate('Mr.Demir', $lang) }}</span>

                            </div>

                            {{-- Item --}}
                            <div class="splide__slide item">

                                @include('partials.quote_marks')
                                <h5 class="testimonial-text">{{ translate('We have been impressed with the professionalism and expertise of the Investment Visa team and have therefore decided to appoint the After Sales service as our Tax Representative in Portugal, as it is a request when we applied for the Golden Visa.', $lang) }}</h5>

                                <span class="client-name">Mark Steinberg</span>

                            </div>

                            {{-- Item --}}
                            <div class="splide__slide item">

                                @include('partials.quote_marks')
                                <h5 class="testimonial-text">{{ translate('Could not have asked for a better team. I am very happy and glad we did business with Investment Visa, part of the Harland & Poston Group.', $lang) }}</h5>

                                <span class="client-name">{{ translate('Mr. & Mrs. Chongrak', $lang) }}</span>

                            </div>

                        </ul>
                    </div>

                    {{-- </div> --}}
                </div>

            </div>
        </section>

        {{-- Footer --}}
        <footer class="section-inner-padding">
            <div class="container">
                <div class="row">

                    {{-- Column --}}
                    <div class="col-md-5">

                        <div class="footer-column">

                            <h5>{{ translate('Stay Connected', $lang) }}</h5>

                            <div class="social-media-list">

                                <a href="https://www.facebook.com/hpginvestmentvisa/" target="_blank">Facebook</a>
                                <a href="https://www.instagram.com/investment_visa/" target="_blank">Instagram</a>
                                <a href="https://www.youtube.com/@HarlandPostonGroup" target="_blank">YouTube</a>
                                <a href="https://pt.linkedin.com/company/investmentvisa" target="_blank">LinkedIn</a>
                                <a href="https://x.com/investment_visa" target="_blank">X</a>

                            </div>

                            <div class="terms-privacy-wrapper">

                                <a>{{ translate('Terms & Conditions', $lang) }}</a>
                                <div class="vertical-separator"></div>
                                <a>{{ translate('Privacy Policy', $lang) }}</a>

                            </div>

                        </div>

                    </div>

                    {{-- Column --}}
                    <div class="col-md-5">

                        <div class="footer-column">

                            <span class="footer-email">
                                <a href="mailto:info@investmentvisa.com">info@investmentvisa.com</a>
                            </span>

                            <div class="country-list">

                                <span>{{ translate('Portugal', $lang) }} ·</span>
                                <span>{{ translate('UK', $lang) }} ·</span>
                                <span>{{ translate('Greece', $lang) }} ·</span>
                                <span>{{ translate('UAE', $lang) }} ·</span>
                                <span>{{ translate('Hong Kong', $lang) }}</span>

                            </div>

                            <span class="trademark">© {{ date('Y') }} {{ translate('Investment Visa. Investment Visa is part of the Harland & Poston Group', $lang) }}.</span>

                        </div>

                    </div>

                </div>
            </div>
        </footer>

        {{-- Call CTA --}}
        <div class="call-cta-wrapper">

            <div class="horizontal-line"></div>

            <div id="call-cta">

                <img src="/assets/img/greece_gv/sandy.png">

                <span>{{ translate('Hi, we\'re glad to help you.', $lang) }}</span>

            </div>
        </div>

        {{-- Banner Form --}}
        <div class="form-container-element cta-form-container hidden">

            {{-- Revamped Form --}}
            <form id="" class="generic-form-container">

                @csrf

                <div class="title-close-wrapper">
                    <h3 class="title">{{ translate('Get Started Now', $lang) }}</h3>
                    <span class="close-button-span">{{ translate('Close', $lang) }}</span>
                </div>

                <div class="input-container form-row">

                    {{-- First Name --}}
                    <div class="wrapper">
                        <label for="first_name">{{ translate('First Name', $lang) }} *</label>
                        <input type="text" name="first_name" required>
                    </div>

                    {{-- Last Name --}}
                    <div class="wrapper">
                        <label for="last_name">{{ translate('Last Name', $lang) }} *</label>
                        <input type="text" name="last_name" required>
                    </div>

                </div>

                <div class="input-container form-row">

                    {{-- Email --}}
                    <div class="email-input-container">

                        <label for="email_address">{{ translate('Email Address', $lang) }}*</label>
                        <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email Address*" style="width:100%" required>

                        {{-- Zero Bounce status code --}}
                        <span class="zerobounce-status">{{ translate('Invalid email', $lang) }}</span>

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

                    {{-- Phone Number --}}
                    <div class="wrapper">
                        <label for="last_name">{{ translate('Phone', $lang) }}*</label>
                        @include('forms.inputs.phone_number')
                    </div>

                </div>

                <div class="wrapper form-row">
                    <label for="enquiry_subject">{{ translate('What are you looking for', $lang) }}*</label>
                    @include('forms.inputs.what_are_you_looking_for')
                </div>

                <div class="wrapper form-row">
                    <label>{{ translate('How much are you willing to invest?', $lang) }}*</label>
                    @include('forms.inputs.investment_amount')
                </div>

                <div class="wrapper form-row">
                    <label for="message_textarea">{{ translate('Message us', $lang) }}</label>
                    @include('forms.inputs.message')
                </div>

                {{-- <span class="visas-disclaimer-revamp">Portugal Homes <b>does not</b> provide Work Visas, Tourism Visas, or Temporary Visas.</span> --}}

                <div class="button-row">

                    <div class="horizontal-line"></div>

                    <button class="stylize" type="submit">{{ translate('Book Your Meeting', $lang) }}</button>
                </div>

                <span class="consent-text">{{ translate('By submitting this form, you confirm that you agree that your data will be used to contact you.', $lang) }}</span>

            </form>

        </div>

    </body>

</html>
