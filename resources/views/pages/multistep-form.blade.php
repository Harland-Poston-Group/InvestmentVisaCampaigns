<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Residency by Investment</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/assets/js/multistep_form.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- Intl Tel Input --}}

        <link rel="stylesheet" href="/assets/css/country-code-plugin/intlTelInput.css">

        <!-- Scripts that will mount the plugin that will add the user's country extension to the phone number input -->
        <script src="/assets/js/country-code-plugin/intlTelInput.js"></script>
        <script src="/assets/js/country-code-plugin/utils.js"></script>
        <script src="/assets/js/country-code-plugin/tel-input-script.js"></script>

    {{-- End of Intl Tel Input --}}

    <!-- Favicon(s) -->
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon96x96.png" sizes="96x96">

    <!-- Favicons optimized for Apple devices -->
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/favicon/favicon114x114.png" >
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favicon/favicon152x152.png" >
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/favicon180x180.png">

    {{-- Includes --}}
    @include('partials.scripts')

</head>
<body>


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
                            <h2 class="title">Find out which one of our programs<br> is the best fit for your plans</h2>

                            <h4 class="subtitle">Diversify your investments, get freedom of travel and secure<br> a plan B in a stable economy for you and your family.</h4>
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

                                <button class="next-btn purple-bg">Start Golden Visa Quiz @include('partials.arrows.right_arrow')</button>

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
                            <h1 class="name animate__animated animate__fadeInLeft">{{ $question['question_text'] }}</h1>

                            @if( $question['allows_multiple_answers'] )
                                <div class="detail animate__animated animate__fadeInLeft">
                                    <span class="multiple-answers-option">Multiple answers options</span>
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
                                                <span class="custom-label">{{ $answer['answer_text'] }}</span>
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
                                        <button class="next-btn last-question purple-bg">Next @include('partials.arrows.right_arrow')</button>

                                    @else
                                        <button class="next-btn purple-bg">Next @include('partials.arrows.right_arrow')</button>
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
                            <h2 class="title">Thank you for taking the quiz</h2>

                            <h4 class="subtitle">Please fill in your details to finish</h4>
                            <h4 class="subtitle">We will contact you soon to present our best options</h4>
                        </div>

                        {{-- List of questions --}}
                        <div class="list-wrapper animate__animated animate__fadeInUp">
                            <div class="list last-step-form-wrapper">

                                {{-- Personal Data Inputs --}}
                                <div class="personal-data-wrapper">

                                    <div class="input-container">

                                        <div class="wrapper">
                                            <label for="first_name">First Name*</label>
                                            <input type="text" id="first_name" placeholder="" class="form-control" name="first_name" required>
                                        </div>

                                        <div class="wrapper">
                                            <label for="last_name">Last Name*</label>
                                            <input type="text" id="last_name" placeholder="" class="form-control" name="last_name" required>
                                        </div>

                                    </div>

                                    <div class="input-container">

                                        {{-- Email --}}
                                        {{-- @include('forms.inputs.email') --}}
                                        <div class="wrapper">
                                            <div class="email-input-container">
                                                <label>Email Address*</label>
                                                <input type="email" id="email_address" name="email_address" class="form-control" placeholder="" style="width:100%" required>

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
                                        </div>

                                        {{-- Phone Number --}}
                                        {{-- @include('forms.inputs.phone_number') --}}
                                        <div class="wrapper">
                                            <label for="phone_number">Contact Number*</label>
                                            <input type="tel" id="phone_number" class="contact-number phone-number-extension form-control" name="phone_number" placeholder="" style="width:100%" required>
                                        </div>

                                    </div>

                                    <div class="wrapper">
                                        <label for="message">Would you like to share more details with us?</label>
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
                                    <button type="submit" class="submit-btn last-question purple-bg">Complete @include('partials.arrows.right_arrow')</button>

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
                            <h2 class="title">Thank you for your submission</h2>

                            <h4 class="subtitle">We will contact you soon to present our best options</h4>
                        </div>


                    </div>


                </form>

            </div>

        {{-- </div> --}}

            {{-- Answer not picked notification --}}
            <div id="no-answer-notification">
                <span>Please answer the question</span>
            </div>
    </section>

</body>
</html>
