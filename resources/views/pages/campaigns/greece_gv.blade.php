<!DOCTYPE html>
<html class="no-scroll" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Visa - {{ translate('Greece Golden Visa', $lang) }}</title>

    <link rel="icon" type="image/png" href="/images/favicon32x32.png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- OG Meta Tags --}}
    <meta property="og:title" content="Investment Visa - {{ translate('Greece Golden Visa', $lang) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ translate('Unlock Your European Dream With the Greece Golden Visa', $lang) }}" />
    <meta property="og:image" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />
    <meta property="og:url" content="https://campaigns.investmentvisa.com/residency-and-citizenship" />
    <meta property="og:site_name" content="Investment Visa" />
    <meta property="og:locale" content="en_US" />

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{ translate('Grant of Residency or Citizenship on the Basis of an Investment', $lang) }}" />
    <meta name="twitter:image" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />

    <meta name="description" content="{{ translate('Grant of Residency or Citizenship on the Basis of an Investment', $lang) }}" />


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
    <link rel="stylesheet" href="/css/app.css?v={{ uniqid() }}">
    <link rel="stylesheet" href="/css/greece_gv.css?v={{ uniqid() }}">

</head>

{{-- @dump(App::getLocale()) --}}

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
                        <a href="#greece-finest-properties-section" class="section-anchor linkSlide">{{ translate('Real Estate Options', $lang) }}</a>
                        <a href="#book-a-free-consultation-section" class="section-anchor linkSlide">{{ translate('Start Your Journey', $lang) }}</a>
                        <a href="#testimonials-gv-page-revamp-section" class="section-anchor linkSlide">{{ translate('Testimonials', $lang) }}</a>

                    </div>

                    {{-- Language Picker --}}
                    @include('components.language.language-picker')

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
                            <a href="#greece-finest-properties-section" class="section-anchor linkSlide">{{ translate('Real Estate Options', $lang) }}</a>
                        </div>

                        {{-- Horizontal Line (separator) --}}
                        <div class="horizontal-line"></div>

                        <div class="container">
                            <a href="#book-a-free-consultation-section" class="section-anchor linkSlide">{{ translate('Start Your Journey', $lang) }}</a>
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
                                <h1>{{ translate('Get your Greece Golden Visa', $lang) }}</h1>
                                <h2>{{ translate('With a minimum €250,000 Real Estate Investment', $lang) }}</h2>
                            </div>

                        </div>
                        <div class="col-md-5"></div>

                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-7 banner-column">

                    {{-- <h4 class="banner-subtitle">
                        <strong>Invest €250k</strong> and diversify your portfolio, gain the freedom to travel, and secure a Plan B for your family.
                    </h4> --}}

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
                    @include('forms.inputs.message', ['placeholder' => translate('Tell us more so we can provide you with better help.', $lang)])
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

                <h2 class="title">{{ translate('Experience the Mediterranean Lifestyle<br> and Secure Your Future in Europe', $lang) }}</h2>

                <div class="benefits-wrapper">
                    <div class="row">

                        {{-- Item --}}
                        <div class="col-md-4 col-12 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/pool_family-compressed.webp">

                            {{-- Title --}}
                            <h3>{{ translate('Stable Environment', $lang) }}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Greece offers high quality of living, a favorable climate, and friendly communities.', $lang) }}</p>

                        </div>

                        {{-- Item --}}
                        <div class="col-md-4 col-12 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/beach_side-compressed.webp">

                            {{-- Title --}}
                            <h3>{{ translate('Investment Opportunities', $lang) }}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Invest in one of Europe\'s most promising real estate markets and secure a future for you and your family.', $lang) }}</p>

                        </div>

                        {{-- Item --}}
                        <div class="col-md-4 col-12 item">

                            {{-- Image --}}
                            <img src="/assets/img/greece_gv/eu-flag-compressed.webp">

                            {{-- Title --}}
                            <h3>{{ translate('Schengen Area Access', $lang) }}</h3>

                            {{-- Description --}}
                            <p>{{ translate('Enjoy seamless travel across 29 European countries with your Golden Visa.', $lang) }}</p>

                        </div>

                    </div>
                </div>

            </div>
        </section>

        {{-- Our Top Picks Programs --}}
        <section id="greece-finest-properties-section" class="section-inner-padding">
            <div class="container">

                <div class="title-arrow-container">

                    <h2 class="title">{{ translate('Greece\'s Finest Properties Await', $lang) }}</h2>

                    {{-- Arrow --}}
                    {{-- @include('partials.arrows.right_arrow') --}}
                    @include('partials.arrows.right_arrow_v2')
                </div>

            </div>

                <div class="properties-container">

                    {{-- Side Fade Elements --}}
                    <div class="left-fade"></div>
                    <div class="right-fade"></div>

                    <div class="container">

                        @php

                            $properties = [
                                [
                                    'name' => 'Aphrodisia Beahfront',
                                    'description' => 'In the heart of Crete, Greece. Nestled along the pristine coastline, this exclusive property development offers a remarkable blend of contemporary luxury, stunning views of the Mediterranean Sea',
                                    'from_price' => '373.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv1081-aphrodisia-beachfront-gv250',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV1081-Crete/Aphrodisia%20Beachfront.jpg'
                                ],
                                [
                                    'name' => 'Santorini Views',
                                    'description' => 'Modern beachfront apartment with stunning ocean views, perfect for a relaxing vacation in Portugal.',
                                    'from_price' => '505.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv1085-santorini-views',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV1085-/Santorini%20Image.jpg'
                                ],
                                [
                                    'name' => 'Molos Seaside Villas',
                                    'description' => 'Introducing an exquisite new development on the picturesque island of Paros, Greece, where modern sophistication meets Mediterranean charm.',
                                    'from_price' => '256.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv1084-molos-seaside-villas-gv250',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV1084-Paros/Molos%20Image%202.jpg'
                                ],
                                [
                                    'name' => 'The Brooklyn Block',
                                    'description' => 'The Brooklyn Block is an exceptional new residential development located in the vibrant neighborhood of Agios Dimitrios, Athens.',
                                    'from_price' => '250.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv8159-the-brooklyn-block',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV8159-Athens/GrigoriouMoschopoulou8.jpg'
                                ],
                                [
                                    'name' => 'Piraeus Marina Hotel',
                                    'description' => 'Live in a luxurious penthouse with all the facilities of a 5* Hotel in Piraeus, Athens.',
                                    'from_price' => '565.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv8102-piraeus-marina-hotel-c-block-residential',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV8102-Athens/1.2-min.png'
                                ],
                                [
                                    'name' => 'Apollonia Suites',
                                    'description' => 'Located in the charming area of Piraeus, this area is distinguished by its winding streets, lush greenery, and Mediterranean ambiance.',
                                    'from_price' => '250.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv8066-apollonia-suites',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV8066-Athens/K1.png'
                                ],
                                [
                                    'name' => 'Grenville IV Residence',
                                    'description' => 'Strategically positioned in a pine-tree location in the northeastern part of Athens, Grenville IV Residence is an exquisite residential development.',
                                    'from_price' => '259.000',
                                    'link' => 'https://www.investmentvisa.com/properties/greece/iv1604-grenville-iv-residence',
                                    'image' => 'https://www.investmentvisa.com/images/Properties/IV1604-Athens/1_B2_LIVING_1-min.jpg'
                                ],
                            ];

                        @endphp

                        <div class="splide property-slider">

                            <div class="splide__track">
                                <ul class="splide__list">

                                    @foreach ($properties as $property)

                                        <div class="property-card splide__slide">

                                            <div class="property-image-container">
                                                <a href="{{ $property['link'] }}" target="_blank">
                                                    <img class="property-image" src="{{ $property['image'] }}">
                                                </a>
                                            </div>

                                            <h4>
                                                <a href="{{ $property['link'] }}" target="_blank">{{ $property['name'] }}</a>
                                            </h4>
                                            <h6>from € {{ $property['from_price'] }}</h6>

                                            <p>{{ translate($property['description'], $lang) }}</p>

                                        </div>

                                    @endforeach


                                    {{-- <div class="right-fade"></div> --}}

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </section>

        {{-- Book a Consultation --}}
        <section id="book-a-free-consultation-section">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 content-column">

                        <h2>{{ translate('Ready to get started?<br> Book a Free Consultation today.', $lang) }}</h2>
                        <h3 class="subtitle">{{ translate('Take the first step towards your European lifestyle with the Greece Golden Visa.', $lang) }}</h3>

                        {{-- Contact Us --}}
                        <div class="button-container">
                            <button>
                                {{ translate('Contact Us', $lang) }}
                            </button>
                        </div>

                    </div>

                    <div class="col-md-4 image-container">

                        {{-- <div class="content-wrapper"> --}}

                            {{-- Rep Name / Position --}}
                            <div class="rep-name-position">
                                <h5>Mark Wills</h5>
                                <p>{{ translate('Investment Advisor', $lang) }}</p>
                            </div>

                            <img src="/assets/img/greece_gv/mark-wills.png">

                        {{-- </div> --}}

                    </div>

                </div>
            </div>

            {{-- Horizontal purple line --}}
            <div class="horizontal-line"></div>

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
                                <h5 class="testimonial-text">{{ translate('Greece has given my family and me a lifestyle we never dreamed possible. The beautiful landscapes and welcoming atmosphere make every day feel like a vacation.', $lang) }}</h5>

                                <span class="client-name">Neena Joyce</span>

                            </div>

                            {{-- Item --}}
                            <div class="splide__slide item">

                                @include('partials.quote_marks')
                                <h5 class="testimonial-text">{{ translate('The process was easy, and the support we received made all the difference. I can\'t recommend the Greece Golden Visa enough.', $lang) }}</h5>

                                <span class="client-name">Beniel Saab</span>

                            </div>

                            {{-- Item --}}
                            <div class="splide__slide item">

                                @include('partials.quote_marks')
                                <h5 class="testimonial-text">{{ translate('Obtaining my Golden Visa was a life-changing decision. Greece has become our second home, and the lifestyle is unmatched.', $lang) }}</h5>

                                <span class="client-name">Alexander Petrus</span>

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

                <div class="footer-logo">
                    <img src="/assets/img/logos/logo-white.svg">
                </div>

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

                        </div>

                    </div>

                    {{-- Column --}}
                    <div class="col-md-5 email-locations-column">

                        <div class="footer-column">

                            <span class="footer-email">
                                <a href="mailto:info@investmentvisa.com">info@investmentvisa.com</a>
                            </span>

                            <div class="country-list">

                                <span>Portugal ·</span>
                                <span>UK ·</span>
                                <span>Greece ·</span>
                                <span>UAE ·</span>
                                <span>Hong Kong</span>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-5 privacy-policy-column">

                        <div class="terms-privacy-wrapper">

                            <a>{{ translate('Terms & Conditions', $lang) }}</a>
                            <div class="vertical-separator"></div>
                            <a href="https://www.investmentvisa.com/privacy-policy">{{ translate('Privacy Policy', $lang) }}</a>

                        </div>

                    </div>

                    <div class="col-md-5">
                        <span class="trademark">© {{ date('Y') }} {{ translate('Investment Visa. Investment Visa is part of the Harland & Poston Group.', $lang) }}</span>
                    </div>

                </div>

                {{-- IV Logo (big) --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="footer-big-transparent-logo" width="183" height="173" viewBox="0 0 183 173" fill="none">
                    <path opacity="0.2" d="M126.452 73.8035L181.924 75.5266C182.116 75.5304 182.303 75.5825 182.468 75.6777C182.632 75.7728 182.768 75.9077 182.861 76.0689C182.955 76.2301 183.003 76.412 183 76.5965C182.997 76.7809 182.944 76.9615 182.847 77.1202L174.946 90.2674C172.073 95.0458 167.903 98.9848 162.881 101.664C157.859 104.342 152.173 105.66 146.432 105.476L124.14 104.799L135.898 122.981C138.928 127.664 140.577 133.051 140.668 138.564C140.76 144.078 139.29 149.512 136.416 154.285L128.516 167.432C128.419 167.591 128.282 167.724 128.116 167.817C127.951 167.91 127.763 167.96 127.572 167.962C127.38 167.965 127.191 167.92 127.023 167.831C126.855 167.743 126.714 167.614 126.613 167.457L97.3375 122.194C95.6072 119.516 94.6655 116.437 94.6126 113.285C94.5596 110.133 95.3974 107.027 97.0368 104.296L109.946 82.8572L110.137 82.5185C111.776 79.7913 114.155 77.5429 117.02 76.0132C119.885 74.4836 123.129 73.7301 126.406 73.8334L126.452 73.8035ZM148.532 51.7073C148.224 52.2088 148.059 52.7796 148.055 53.3618C148.051 53.9441 148.207 54.5171 148.507 55.0227C148.808 55.5284 149.242 55.9487 149.766 56.241C150.291 56.5334 150.886 56.6873 151.492 56.6873L171.192 56.7371C171.793 56.7364 172.383 56.5845 172.904 56.2966C173.424 56.0086 173.857 55.5946 174.159 55.0958C174.461 54.597 174.622 54.0308 174.626 53.4538C174.629 52.8767 174.475 52.3089 174.178 51.8069L164.38 35.358C164.081 34.8584 163.649 34.4435 163.13 34.155C162.61 33.8665 162.02 33.7146 161.42 33.7146C160.82 33.7146 160.23 33.8665 159.711 34.155C159.191 34.4435 158.759 34.8584 158.46 35.358L148.573 51.7173L148.532 51.7073ZM157.122 133.235C158.688 134.109 160.488 134.517 162.295 134.409C164.102 134.3 165.835 133.679 167.274 132.624C168.714 131.57 169.796 130.129 170.383 128.484C170.971 126.838 171.037 125.063 170.574 123.381C170.111 121.7 169.139 120.188 167.781 119.037C166.424 117.887 164.742 117.148 162.947 116.915C161.153 116.683 159.327 116.966 157.701 117.731C156.074 118.495 154.72 119.705 153.81 121.208C153.204 122.206 152.809 123.31 152.648 124.455C152.487 125.6 152.562 126.764 152.87 127.881C153.178 128.998 153.712 130.046 154.441 130.965C155.171 131.883 156.082 132.655 157.122 133.235ZM85.5796 122.279C87.3098 119.6 88.2515 116.521 88.3045 113.37C88.3574 110.218 87.5196 107.111 85.8803 104.381L85.6884 104.042L72.79 82.5982C71.1541 79.8739 68.7796 77.6269 65.9193 76.0966C63.059 74.5662 59.8202 73.8099 56.5478 73.9081L1.07625 75.5764C0.884254 75.5802 0.696658 75.6323 0.532144 75.7275C0.36763 75.8226 0.231941 75.9575 0.138592 76.1187C0.0452438 76.2799 -0.00250533 76.4618 0.000101278 76.6463C0.00270788 76.8307 0.0555792 77.0113 0.153449 77.17L8.05425 90.3172C10.927 95.0956 15.0971 99.0346 20.1192 101.713C25.1412 104.392 30.8265 105.71 36.5676 105.526L58.8599 104.849L47.0658 123.031C44.0355 127.714 42.3867 133.1 42.2953 138.614C42.204 144.128 43.6737 149.561 46.5473 154.335L54.4481 167.482C54.5444 167.641 54.682 167.774 54.8474 167.867C55.0129 167.959 55.2005 168.01 55.3921 168.012C55.5837 168.015 55.7727 167.969 55.9407 167.881C56.1087 167.792 56.25 167.664 56.3508 167.507L85.6262 122.244L85.5796 122.279ZM104.243 168.095L94.4395 151.661C94.1384 151.159 93.7051 150.743 93.1831 150.453C92.6612 150.163 92.0691 150.011 91.4663 150.011C90.8635 150.011 90.2714 150.163 89.7495 150.453C89.2275 150.743 88.7942 151.159 88.4931 151.661L78.6068 168.02C78.3049 168.519 78.1455 169.086 78.1445 169.663C78.1436 170.241 78.3012 170.808 78.6015 171.308C78.9018 171.808 79.334 172.223 79.8547 172.512C80.3754 172.8 80.966 172.951 81.567 172.95L101.267 173C101.868 172.999 102.458 172.847 102.979 172.559C103.499 172.272 103.932 171.857 104.234 171.359C104.536 170.86 104.697 170.294 104.7 169.717C104.704 169.14 104.55 168.572 104.253 168.07L104.243 168.095ZM29.1956 121.362C28.2959 119.853 26.9504 118.634 25.3292 117.859C23.7081 117.084 21.8841 116.788 20.088 117.009C18.2918 117.23 16.6042 117.957 15.2385 119.099C13.8728 120.242 12.8904 121.747 12.4155 123.426C11.9406 125.104 11.9945 126.88 12.5704 128.53C13.1464 130.179 14.2185 131.627 15.6511 132.69C17.0838 133.754 18.8127 134.386 20.6191 134.506C22.4256 134.626 24.2286 134.229 25.7999 133.364C27.9007 132.2 29.4368 130.284 30.0729 128.036C30.7091 125.787 30.3937 123.388 29.1956 121.362ZM36.1788 17.0864L62.3593 64.0726C63.9048 66.8484 66.2061 69.1688 69.0175 70.7862C71.8288 72.4036 75.0447 73.2571 78.3216 73.2557H104.528C107.806 73.258 111.023 72.4049 113.835 70.7875C116.647 69.1701 118.95 66.8491 120.496 64.0726L146.676 17.0864C146.767 16.9243 146.812 16.7422 146.808 16.5581C146.803 16.3739 146.749 16.1942 146.65 16.0364C146.551 15.8786 146.411 15.7482 146.244 15.6582C146.077 15.5681 145.888 15.5214 145.696 15.5227H129.9C124.153 15.5167 118.513 17.011 113.582 19.846C108.651 22.681 104.615 26.75 101.905 31.618L91.3963 50.4822L80.9137 31.618C78.2039 26.75 74.1677 22.681 69.2368 19.846C64.3058 17.011 58.6655 15.5167 52.9188 15.5227H37.1275C36.9364 15.5228 36.7485 15.5705 36.5822 15.6609C36.4158 15.7513 36.2766 15.8815 36.178 16.0388C36.0795 16.1961 36.0249 16.3752 36.0196 16.5588C36.0143 16.7423 36.0584 16.9241 36.1477 17.0864H36.1788ZM34.3591 51.792L24.5557 35.358C24.2561 34.8584 23.8247 34.4435 23.305 34.155C22.7854 33.8665 22.1957 33.7146 21.5955 33.7146C20.9953 33.7146 20.4057 33.8665 19.886 34.155C19.3663 34.4435 18.935 34.8584 18.6353 35.358L8.72302 51.792C8.42116 52.2912 8.26173 52.858 8.2608 53.4353C8.25988 54.0126 8.41751 54.5799 8.71777 55.08C9.01803 55.5801 9.4503 55.9952 9.97097 56.2836C10.4916 56.5719 11.0822 56.7232 11.6832 56.7222L31.3834 56.7719C31.9841 56.7713 32.5742 56.6194 33.0948 56.3314C33.6154 56.0434 34.0483 55.6294 34.3504 55.1306C34.6525 54.6319 34.8133 54.0657 34.8166 53.4886C34.82 52.9116 34.6658 52.3438 34.3695 51.8418L34.3591 51.792ZM82.2668 8.76482C82.2617 10.5032 82.7934 12.2041 83.7945 13.6523C84.7957 15.1005 86.2215 16.2309 87.8915 16.9007C89.5615 17.5706 91.4007 17.7496 93.1767 17.4153C94.9527 17.081 96.5855 16.2483 97.8688 15.0225C99.1521 13.7967 100.028 12.233 100.386 10.5289C100.744 8.82483 100.568 7.05704 99.8806 5.44905C99.1928 3.84107 98.024 2.46512 96.5221 1.49521C95.0203 0.52529 93.2527 0.00496714 91.443 3.54429e-05C89.0157 -0.00657946 86.685 0.912979 84.9634 2.55656C83.2417 4.20013 82.2699 6.43319 82.2617 8.76482H82.2668Z" fill="#F9F7F4"/>
                </svg>

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
                    @include('forms.inputs.message', ['placeholder' => translate('Tell us more so we can provide you with better help.', $lang)])
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
