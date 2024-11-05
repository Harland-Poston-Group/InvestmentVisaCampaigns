<div id="hidden-form">
    <form name="add-blog-post-form" method="post" action="/store-form" id="campaign-form" class="IDM0XXP2SKWKUUH10 modal-form">
        <a href="#" class="btn-close-form">
            <svg class="btn-close-form" xmlns="http://www.w3.org/2000/svg" width="30.805" height="27.168" viewBox="0 0 30.805 27.168">
                <g transform="translate(18033.465 23183.839)">
                    <path d="M1.859.118l31.6,2.011A2.193,2.193,0,0,1,35.44,4.148,1.619,1.619,0,0,1,33.7,5.93L2.1,3.92A2.193,2.193,0,0,1,.118,1.9,1.619,1.619,0,0,1,1.859.118Z" transform="translate(-18029.738 -23184) rotate(40)"/>
                    <path d="M1.859-.118l31.6-2.011A1.619,1.619,0,0,1,35.2-.346a2.193,2.193,0,0,1-1.977,2.019L1.623,3.683A1.619,1.619,0,0,1-.118,1.9,2.193,2.193,0,0,1,1.859-.118Z" transform="translate(-18032 -23159.574) rotate(-40)"/>
                </g>
            </svg>
        </a>
        {{-- <i class="far fa-times-circle"></i> --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h2 data-raw-content="true" class="form-title text-center">Get Started Now</h2>
        <h4 data-raw-content="true" class="form-subtitle text-center">Find the best Investment Visa options</h4>
        <div class="form-group row">
            <div class="col-6"><input type="text" name="first_name" required="" placeholder="First Name *" id="first_name" class="form-control IDM0XXP2STIRSKF11"></div>
            <div class="col-6"><input type="text" name="last_name" required="" placeholder="Last Name *" id="last_name" class="form-control IDM0XXP2SUWIXAF12"></div>
        </div>
        <div class="form-group row">
            <div class="col-12"><input type="email" name="email" required="" placeholder="Email Address *" id="email" class="form-control IDM0XXP2SUXVC5U13"></div>
        </div>
        <div class="form-group row">
            <div class="col-12"><input type="tel" name="phone_number" placeholder="Phone Number" id="phone_number" class="form-control contact-number phone-number-extension"></div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <select name="enquiry_subject" id="enquiry_subject" class="form-control minimal enquiry_subject">
                    <option selected hidden value="">What are you looking for?</option>
                    <option value="Business Visa">Business Visa</option>
                    <option value="Greece Golden Visa">Golden Visa</option>
                    <option value="Other Investment Opportunities">Investment Opportunities</option>
                    <option value="Retirement">Retirement</option>
                    <option value="Work visa">Work Visa</option>
                </select></div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-12">
                <textarea name="message" placeholder="Leave us a message..." id="message" class="form-control IDM0XXP2SXKESE916"></textarea>
            </div>
        </div>
        <input type="hidden" name="petname" id="petname">
        <div class="form-group row">

            <div class="col-12 col-md-8">
                {{-- Keep me updated Checkbox --}}
                <div class="checkbox-wrapper">
                    <input type="hidden" name="signup" value="0" />
                    <input type="checkbox" class="stylize" name="signup" value="1" id="signup">
                    <label class="keep-me-updated-form-span" for="signup">
                        Please keep me updated on Harland and Poston Group news, events and offers.
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-4 text-end">
                <button type="submit" data-raw-content="true" id="form-bt" class="btn btn-primary form-send-bt">Submit</button>
            </div>
            <div class="col-12 px-3 my-2">
                <div class="desctext">
                    By submitting this form, you confirm that you agree that your data will be used to contact you. <a class="privacy" href="https://www.investmentvisa.com/privacy-policy" target="_blank">Read More</a>
                </div>
            </div>
        </div>
    </form>
</div>
