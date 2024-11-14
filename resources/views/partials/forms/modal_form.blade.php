<div id="hidden-form">
    <form name="add-blog-post-form" method="post" action="/store-form" id="campaign-form" class="generic-form-submission modal-form">
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
            <div class="col-6"><input type="text" name="first_name" required="" placeholder="First Name *" id="first_name" class="form-control"></div>
            <div class="col-6"><input type="text" name="last_name" required="" placeholder="Last Name *" id="last_name" class="form-control"></div>
        </div>
        <div class="form-group row">
            <div class="col-12">

                {{-- Email Input --}}
                @include('forms.inputs.email')
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">

                {{-- Phone Number --}}
                @include('forms.inputs.phone_number')

            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">

                {{-- What are you looking for? --}}
                @include('forms.inputs.what_are_you_looking_for')
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">

                {{-- Investment Amount --}}
                @include('forms.inputs.investment_amount')

            </div>
        </div>

        <div class="form-group row mb-2">
            <div class="col-12">

                {{-- Message --}}
                @include('forms.inputs.message')
            </div>
        </div>
        <input type="hidden" name="petname" id="petname">
        <div class="form-group row">

            <div class="col-12 col-md-4">

                <!-- Keep me updated Checkbox -->
                {{-- @include('forms.inputs.keep_me_updated_checkbox') --}}
                {{-- @include('forms.content.consent_text') --}}

            </div>

            <div class="col-12 col-md-8 text-end">
                <button type="submit" data-raw-content="true" id="form-bt" class="btn btn-primary form-send-bt">Submit</button>
            </div>

            <div class="col-12 px-3 my-2">

                {{-- Consent text --}}
                @include('forms.content.consent_text')

            </div>
        </div>
    </form>
</div>
