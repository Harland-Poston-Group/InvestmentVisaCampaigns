<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Visa - Residency and Citizenship</title>
    <link rel="stylesheet" href="/css/style.css" />

    <link rel="icon" type="image/png" href="/images/favicon32x32.png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <meta property="og:title" content="Investment Visa - Residency and Citizenship" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Unlock Your European Dream With the Greece Golden Visa" />
    <meta property="og:image" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />
    <meta property="og:url" content="https://campaigns.investmentvisa.com/residency-and-citizenship" />
    <meta property="og:site_name" content="Investment Visa" />
    <meta property="og:locale" content="en_US" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Grant of Residency or Citizenship on the Basis of an Investment" />
    <meta name="twitter:image" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />

    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <meta name="description" content="Grant of Residency or Citizenship on the Basis of an Investment" />
    <meta name="msapplication-TileImage" content="https://campaigns.investmentvisa.com/assets/img/campaigns/greece/GR-Scene-Med-DTP.webp" />

    <meta property="og:video" content="https://campaigns.investmentvisa.com/video/IV-Vid-Site-Story-Generic-Invest-5kbs-Dktp.webm" />
    <meta property="og:video:type" content="video/webm" />
    <meta property="og:video:width" content="1200" />
    <meta property="og:video:height" content="630" />

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">


    {{-- Intl Tel Input --}}
    <link rel="stylesheet" href="/assets/css/country-code-plugin/intlTelInput.css">

    <!-- Scripts that will mount the plugin that will add the user's country extension to the phone number input -->
    <script src="/assets/js/country-code-plugin/intlTelInput.js"></script>
    <script src="/assets/js/country-code-plugin/utils.js"></script>
    {{--<script src="/assets/js/country-code-plugin/tel-input-script.js"></script> --}}
    {{-- moved to script.js --}}

    {{-- Includes --}}
    @include('partials.scripts')

    {{-- App.js --}}
    <script src="/js/app.js" defer></script>

    {{-- App.css --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/scp.css">

    {{-- mix('/assets/css/app.css') }}
    {{ mix('/assets/css/scp.css') }}
    {{ mix('css/scp.css') --}}
</head>
<body class="page-residency-and-citizenship">

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5WRRKQX" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<section id="top-header">
    <div class="container">
        <header class="header row">
            <div class="col-6 col-sm-2">
                <div class="logo">
                    <a href="/" style="color: #fff; text-decoration: none;">
                        <img src="/assets/img/campaigns/simon/Logo-Invest-Visa-W-Endossed.svg">
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-10">

            </div>
        </header>
    </div>
</section>

<section id="top-banner">
    <img src="/assets/img/campaigns/simon/Portugal.webp" alt="Residency and Citizenship" class="header-image">
    <div class="residency-form-container">

        {{-- Header form --}}
        <form name="add-blog-post-form" method="post" action="/store-form" id="campaign-form" class="generic-form-submission header-form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2 class="form-title text-center">Fill the form for more info on exclusive offers from our company</h2>
            <!--<h4 class="form-subtitle text-center">CONTACT US AND FIND OUT HOW</h4>-->

            <div class="form-group row mb-2">
                <div class="col-6">
                    <label>First Name  *</label>
                    <input type="text" name="first_name" required="" placeholder="First Name *" id="first_name" class="form-control">
                </div>
                <div class="col-6">
                    <label>Last Name  *</label>
                    <input type="text" name="last_name" required="" placeholder="Last Name *" id="last_name" class="form-control">
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class="col-12">
                    <label>Email  *</label>
                    {{-- <input type="email" name="email" required="" placeholder="Email Address *" id="email" class="form-control IDM0XXP2SUXVC5U13"> --}}

                    {{-- Email Input --}}
                    @include('forms.inputs.email')
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class="col-12">
                    <label>Phone Number  *</label>
                    {{-- <input type="tel" name="phone_number" placeholder="Phone Number" id="phone_number" class="form-control contact-number phone-number-extension"> --}}
                    {{-- Phone Number --}}
                    @include('forms.inputs.phone_number')
                </div>
            </div>
            <!--
            <div class="form-group row">
                <div class="col-12">
                    {{-- <select name="enquiry_subject" id="enquiry_subject" class="form-control minimal enquiry_subject">
                        <option selected hidden value="">What are you looking for?</option>
                        <option value="Business Visa">Business Visa</option>
                        <option value="Greece Golden Visa">Golden Visa</option>
                        <option value="Other Investment Opportunities">Investment Opportunities</option>
                        <option value="Retirement">Retirement</option>
                        <option value="Work visa">Work Visa</option>
                    </select> --}}

                    {{-- What are you looking for? --}}
                    {{-- @include('forms.inputs.what_are_you_looking_for') --}}
                </div>
            </div>
            -->
            <div class="form-group row">
                <div class="col-12">
                    <label>I have a minimum of €500K to invest *</label>
                    {{-- Investment Amount --}}
                    @include('forms.inputs.minimum_invest')

                </div>
            </div>
            <!--
            <div class="form-group row mb-2">
                <div class="col-12">
                    {{-- <textarea name="message" placeholder="Leave us a message..." id="message" class="form-control IDM0XXP2SXKESE916"></textarea> --}}

                    {{-- Message --}}
                    {{-- @include('forms.inputs.message')  --}}
                </div>
            </div>
            -->
            <input type="hidden" name="petname" id="petname">
            <div class="form-group row align-center">

                <div class="col-12 col-md-4">
                    {{-- Keep me updated Checkbox --}}
                    {{-- <div class="checkbox-wrapper">
                        <input type="hidden" name="signup" value="0" />
                        <input type="checkbox" class="stylize" name="signup" value="1" id="signup">
                        <label class="keep-me-updated-form-span" for="signup">
                            Please keep me updated on Harland and Poston Group news, events and offers.
                        </label>
                    </div> --}}

                    {{-- Keep me updated Checkbox --}}
                    {{-- @include('forms.inputs.keep_me_updated_checkbox') --}}
                </div>

                {{-- Submit button --}}
                <div class="col-12 col-md-12 text-center">
                    <button type="submit" data-raw-content="true" id="form-bt" class="btn btn-primary form-send-bt">Contact Us Now</button>
                </div>

                <div class="col-12 px-3 my-2">
                    {{-- <div class="desctext">
                        By submitting this form, you confirm that you agree that your data will be used to contact you. <a class="privacy" href="https://www.investmentvisa.com/privacy-policy" target="_blank">Read More</a>
                    </div> --}}

                    {{-- Consent text --}}
                    @include('forms.content.consent_text')
                </div>


            </div>
        </form>
    </div>
    <div class="header-title">
        <div class="country-name">Portugal</div>
        <h1>Golden Visa</h1>
        <h4 class="subtitle">
            from <b>€500K</b>
        </h4>
        <ul id="header-list" class="mt-5">
            <li>
                <div class="icon">
                    <img src="/assets/img/campaigns/simon/arrow.png" alt="list arrow" class="list-arrow">
                </div>
                <div class="list-content">
                    European Residency by Investment & future Citizenship
                </div>
            </li>
            <li>
                <div class="icon">
                    <img src="/assets/img/campaigns/simon/arrow.png" alt="list arrow" class="list-arrow">
                </div>
                <div class="list-content">
                    Include your family for a visa-free Schengen travel
                </div>
            </li>
        </ul>
    </div>
</section>
<section id="cards-info">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h2 id="cards-title" class="mb-5 text-center">OTHER PROGRAMS AVAILABLE FOR YOU</h2>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card-residency portugal h-100">
                    <h1 class="card-title">
                        <span class="one">PORTUGAL</span><br><span class="two">RBI & Citizenship</span>
                    </h1>
                    <div class="info">
                        From <b>€155K</b><br> in stagement payments
                        <img src="/assets/img/campaigns/simon/pt-flag.webp" alt="list arrow" class="list-arrow">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card-residency greece h-100">
                    <h1 class="card-title">
                        <span class="one">GREECE</span><br><span class="two">GOLDEN VISA</span>
                    </h1>
                    <div class="info">
                        From <b>€250K</b> via<br> property investment
                        <img src="/assets/img/campaigns/simon/gr-flag.webp" alt="list arrow" class="list-arrow">
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-4">
                <div class="card-residency portugal h-100">
                    <h1 class="card-title">
                        <span class="one">PORTUGAL</span><br><span class="two">RBI & CBI</span>
                    </h1>
                    <div class="info">
                        <b>10%</b> fixed returns<br> on part of the investment
                        <img src="/assets/img/campaigns/simon/pt-flag.webp" alt="list arrow" class="list-arrow">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12">
                <div class="cards-bottom-info py-4 my-5">
                    <h2 class="text-center">
                        With a <b>100%</b> success rate, <b>2,000+</b> clients, and <b>75+</b> experts<br> <b>we deliver seamless and trusted service globally</b>.
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-content">
                <a title="Mail us" href="mailto:info@investmentvisa.com">info@investmentvisa.com</a>
                <a title="Visit our website" href="https://info@investmentvisa.com" target="_blank">www.investmentvisa.com</a>
                <div class="bottom-nav">
                    <a title="Terms and Privacy" href="https://www.investmentvisa.com/privacy-policy" target="_blank">Terms | Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>


</section>
{{-- Modal Form --}}
@include('partials.forms.modal_form')


{{-- Footer
@include('components.footer-cp')
--}}
<button id="scrollToTopBtn" title="Go to top">
    <img src="/images/GoTopArrow.png">
</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/notify.js"></script>
<script src="/js/script.js"></script>

<!-- Notifications Element -->
<div id="notifications"></div>

{{-- Bottom Mobile Bar --}}
@include('partials.bottom_fixed_cta')

<script>
    function getParam(p) {
        var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }

    function getExpiryRecord(value) {
        var expiryPeriod = 90 * 24 * 60 * 60 * 1000; // 90 day expiry in milliseconds

        var expiryDate = new Date().getTime() + expiryPeriod;
        return {
            value: value,
            expiryDate: expiryDate
        };
    }

    function addGclid() {
        var gclidParam = getParam('gclid');
        var gclidFormFields = ['gclid_field', 'foobar']; // all possible gclid form field ids here
        var gclidRecord = null;
        var currGclidFormField;

        var gclsrcParam = getParam('gclsrc');
        var isGclsrcValid = !gclsrcParam || gclsrcParam.indexOf('aw') !== -1;

        gclidFormFields.forEach(function (field) {
            if (document.getElementById(field)) {
                currGclidFormField = document.getElementById(field);
            }
        });

        if (gclidParam && isGclsrcValid) {
            gclidRecord = getExpiryRecord(gclidParam);
            localStorage.setItem('gclid', JSON.stringify(gclidRecord));
        }

        var gclid = gclidRecord || JSON.parse(localStorage.getItem('gclid'));
        var isGclidValid = gclid && new Date().getTime() < gclid.expiryDate;

        if (currGclidFormField && isGclidValid) {
            currGclidFormField.value = gclid.value;
        }
    }
    window.addEventListener('load', addGclid);
</script>

</body>
</html>
