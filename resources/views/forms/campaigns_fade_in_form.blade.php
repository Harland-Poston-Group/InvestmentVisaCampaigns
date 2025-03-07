{{-- Form used in the Private Meetings Performance Pages Per Country - Fade In --}}
<div id="form-container-element-banner" class="generic-form-container fade-in-form private-meetings-country-form">
    {{-- Close Button --}}
    {{-- <span class="close-button">X</span> --}}
    {{-- <img class="close-button" src="/assets/img/icons/X-Cancel.svg"> --}}
    <svg class="close-button" xmlns="http://www.w3.org/2000/svg" width="30.805" height="27.168" viewBox="0 0 30.805 27.168">
        <g transform="translate(18033.465 23183.839)">
            <path d="M1.859.118l31.6,2.011A2.193,2.193,0,0,1,35.44,4.148,1.619,1.619,0,0,1,33.7,5.93L2.1,3.92A2.193,2.193,0,0,1,.118,1.9,1.619,1.619,0,0,1,1.859.118Z" transform="translate(-18029.738 -23184) rotate(40)"/>
            <path d="M1.859-.118l31.6-2.011A1.619,1.619,0,0,1,35.2-.346a2.193,2.193,0,0,1-1.977,2.019L1.623,3.683A1.619,1.619,0,0,1-.118,1.9,2.193,2.193,0,0,1,1.859-.118Z" transform="translate(-18032 -23159.574) rotate(-40)"/>
        </g>
    </svg>

    <!-- Flag and text element -->
    <div class="flag-text-container">

        <!-- Flag -->
        <div class="flag-container">
            <div class="flag">
                {{-- <img src="/assets/img/private_meetings/countries/flags/Flag-Philippines-H320px.webp"> --}}
                <!--<img src="/{{-- $country_flag --}}"> -->
                <lottie-player class="anim" src="/Around-The-World.json" background="transparent" speed="1" style="width: 236px; height: 142px;" loop autoplay></lottie-player>
            </div>
        </div>

        <!-- Text -->
        <div class="text">

            <h4 class="title">Invest In Your Future<br>Get Started Now</h4>
            <p class="subtitle">{{--!! __('content.pm_form_subtitle') !!--}}</p>

        </div>

    </div>

    <form id="modal-awareness-form" class="email-validation generic-form catch-submission" action="/thank-you">

        <div class="input-container">

            <input type="text" name="first_name" placeholder="First Name*" required>
            <input type="text" name="last_name" placeholder="Last Name*" required>

        </div>

        {{-- <input type="email" name="email" placeholder="Email*" required> --}}

        {{-- Email Input --}}
        @include('forms.inputs.email')

        <input type="tel" id="phone_number" class="contact-number phone-number-extension" name="phone_number" placeholder="Phone Number*" style="width:100%" required>

        <input type="hidden" name="secondary-address" class="secondary-address" value="">

        {{-- What are you looking for? --}}
        {{-- <label for="visaSelect">What are you looking for?</label> --}}
        {{-- <select id="visaSelect" class="what_are_you_looking_for visa-select" name="what_are_you_looking_for" required>
            <option value="Greece Golden Visa">Greece Golden Visa</option>
            <option value="Business Visa">Business Visa</option>
            <option value="Work visa">Work Visa</option>
            <option value="Retirement">Retirement</option>
            <option value="Other Investment Opportunities">Other Investment Opportunities</option>
        </select> --}}

        {{-- What are you looking for? --}}
        @include('forms.inputs.what_are_you_looking_for')


        {{-- <select id="investment" class="investment_selector" name="investment_amount" required>
            <option selected hidden value="">How much are you willing to Invest?</option>
            <option value="50,000 - 250,000">50,000 - 250,000</option>
            <option value="250,000 - 500,000">250,000 - 500,000</option>
            <option value="500,000 - 1,000,000+">500,000 - 1,000,000+</option>
            <option value="None of the above">None of the above</option>
        </select> --}}

        {{-- Investment Amount --}}
        @include('forms.inputs.investment_amount')

        {{-- <textarea name="message" placeholder="Tell us more so we can provide you with better help." required></textarea> --}}

        {{-- Message --}}
        @include('forms.inputs.message')

        <button
            id="submitButton"
            class="submit-button g-recaptcha"
            type="submit"
            data-sitekey="your_site_key"
            data-callback="onSubmit"
        >BOOK YOUR MEETING</button>

        {{-- Keep me updated Checkbox --}}
        {{-- <div class="checkbox-wrapper">
            <input type="hidden" name="signup" value="0" />
            <input type="checkbox" class="stylize" name="signup" value="1" id="signup3">
            <label class="keep-me-updated-form-span" for="signup3">
                Please keep me updated on Harland and Poston Group news, events and offers.
            </label>
        </div> --}}

        {{-- Keep me updated Checkbox --}}
        @include('forms.inputs.keep_me_updated_checkbox')

        {{-- Consent text --}}
        {{-- <div class="consent-text">
            By submitting this form, you confirm that you agree that your data will be used to contact you. <a class="privacy" href="https://www.investmentvisa.com/privacy-policy" target="_blank">Read More</a>
        </div> --}}

        {{-- Consent text --}}
        @include('forms.content.consent_text')

    </form>

    {{-- <i class="fa fa-times close-button" aria-hidden="true"></i> --}}

</div>
