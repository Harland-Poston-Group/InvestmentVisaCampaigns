{{-- Form used in the Private Meetings Performance Pages Per Country - Fade In --}}
<div id="form-container-element-banner" class="generic-form-container private-meetings-country-form">

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
                <lottie-player src="/Around-The-World.json" background="transparent" speed="1" style="width: 236px; height: 142px;" loop autoplay></lottie-player>
            </div>
        </div>

        <!-- Text -->
        <div class="text">

            <h4 class="title">{!! __('content.pm_form_title') !!}</h4>
            <p class="subtitle">{!! __('content.pm_form_subtitle') !!}</p>

        </div>

    </div>

    <form id="modal-awareness-form" class="email-validation generic-form catch-submission">

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
            <option value="Portugal Golden Visa">Portugal Golden Visa</option>
            <option value="Portugal D2 Visa">Portugal D2 Visa</option>
            <option value="Work visa">Work Visa</option>
            <option value="Retirement">Retirement</option>
            <option value="Investment Opportunities">Investment Opportunities</option>
        </select>
        <div id="" class="alert alert-warning alert-dismissible fade work-visa-message hidden" role="alert">
            <a class="btn-close" data-dismiss="alert" aria-label="Close"></a>
            {!!  __('content.form_ph_does_not_offer_services_in_work_visas') !!}
        </div>

        <textarea name="message" placeholder="{{ __('content.form_message_placeholder') }}"></textarea>

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
            <input type="checkbox" class="stylize" name="signup" value="1" id="signup3">
            <label class="keep-me-updated-form-span" for="signup3">
                {{ __('content.form_newsletter_checkbox_placeholder') }}
            </label>
        </div>

        {{-- Consent text --}}
        <div class="consent-text">
            {{ __('content.form_privacy_policy_placeholder') }}
        </div>

    </form>

    {{-- <i class="fa fa-times close-button" aria-hidden="true"></i> --}}

</div>
