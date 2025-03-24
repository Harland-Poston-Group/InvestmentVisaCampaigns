@extends('layouts.generic_layout')

<!-- Push custom scripts -->
@push('scripts')

    {{-- Notify JS --}}
    <script src="/assets/js/notify.js"></script>

    <link rel="stylesheet" href="/css/greece_gv_real_estate.css">
    <script src="/assets/js/greece_gv_real_estate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- Intl Tel Input --}}
    <link rel="stylesheet" href="/assets/css/country-code-plugin/intlTelInput.css">

    <!-- Scripts that will mount the plugin that will add the user's country extension to the phone number input -->
    <script src="/assets/js/country-code-plugin/intlTelInput.js"></script>
    <script src="/assets/js/country-code-plugin/utils.js"></script>
    <script src="/assets/js/country-code-plugin/tel-input-script.js"></script>
    {{-- End of Intl Tel Input --}}

@endpush

@section('content')

    {{-- Header --}}
    <header>
        <div class="container">

            <div class="logo-wrapper">
                <img src="/assets/img/logos/logo.png">
            </div>

        </div>
    </header>

    {{-- Intro Section --}}
    <section id="intro-section">
        <div class="container">

            <div class="row">

                {{-- Content Column --}}
                <div class="col-md-6">

                    <div class="content">

                        <h1 class="title">Greece Golden Visa via Real Estate</h1>

                        <h3 class="subtitle">Hassle-free EU-Residency<br> starting at €250,000</h3>

                        <p class="cta-description">Browse through our vast Greek real estate portfolio and find a property that suits your investment needs.</p>

                        <div class="cta-button download-guide">
                            Download Golden Visa Guide
                        </div>

                    </div>

                </div>

                {{-- Slider Column --}}
                <div class="col-md-6">

                    <div class="splide property-images-slider" aria-label="Property Images Slider">

                        <div class="splide__track">
                            <ul class="splide__list">

                                {{-- Slide --}}
                                <li class="splide__slide">
                                    <img src="/assets/img/always_on_campaign/Advisors-GH-SH-MM-Standing-W770px.webp">
                                </li>

                                {{-- Slide --}}
                                <li class="splide__slide">
                                    <img src="/assets/img/always_on_campaign/Advisors-GH-SH-MM-Standing-W770px.webp">
                                </li>

                                {{-- Slide --}}
                                <li class="splide__slide">
                                    <img src="/assets/img/always_on_campaign/Advisors-GH-SH-MM-Standing-W770px.webp">
                                </li>

                                {{-- Slide --}}
                                <li class="splide__slide">
                                    <img src="/assets/img/always_on_campaign/Advisors-GH-SH-MM-Standing-W770px.webp">
                                </li>


                            </ul>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </section>

    {{-- Grid of info regarding Greece GV --}}
    <section id="greece-gv-info-section">
        <div class="container">

            <div class="items-container">

                {{-- Item --}}
                <div class="item">

                    <h4 class="title">
                        Starting at €250,000
                    </h4>

                    <span class="description">Real Estate Investment & high capital gains</span>

                </div>

                {{-- Item --}}
                <div class="item">

                    <h4 class="title">
                        30+ years of experience
                    </h4>

                    <span class="description">Investment and property advisors with up to 30 years of experience.</span>

                </div>

                {{-- Item --}}
                <div class="item">

                    <h4 class="title">
                        2,000+ Clients
                    </h4>

                    <span class="description">Advised succesfully over more than 20 years.</span>

                </div>

                {{-- Item --}}
                <div class="item">

                    <h4 class="title">
                        250+ Golden Visas
                    </h4>

                    <span class="description">250+ EU-Golden Visas issued since 2023.</span>

                </div>


            </div>

        </div>
    </section>

    <section id="categories-grid-section">
        <div class="container">

            <div class="items-container">

                {{-- Golden Visa --}}
                <div class="item">

                    <div class="content">

                        <div class="title">Golden Visa</div>

                        <div class="description">The Ultimate Fact Sheet to Unlocking<br> the Greek Golden Visa Program</div>

                    </div>

                    <div class="cta-button download-guide">
                        Download Guide
                    </div>

                </div>

                {{-- Real Estate Investments --}}
                <div class="item">

                    <div class="content">

                        <div class="title">Real Estate Investments</div>

                        <div class="description">Explore a wide selection of properties in Greece, perfect for investment or securing your Golden Visa</div>

                    </div>

                    <div class="cta-button">
                        Check Golden Visa Properties
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- Book a meeting --}}
    <section id="book-a-meeting-section">
        <div class="container">

            <div class="grid">

                {{-- Content --}}
                <div class="content-column">

                    <h3>Book a meeting and learn more on:</h3>

                    <ul>
                        <li>Advantages of investing in Greek real estate</li>
                        <li>Investment process and required documentation</li>
                        <li>Potential risks and challenges to consider</li>
                    </ul>

                    <div class="cta-button">
                        We call back in less than 24h
                    </div>

                    <span class="get-proper-evaluation">* Get a proper internal evaluation of your case's success potential.</span>

                </div>

                {{-- Sales Rep --}}
                <div class="rep-container">

                    <div class="image-content-container">

                        <div class="rep-info">
                            <span class="name">Simon Hobson</span>
                            <span class="position">Investment Advisor</span>
                        </div>

                        <img src="/assets/img/reps/simon-standing.png">
                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- Horizontal Purple Line --}}
    <div id="horizontal-absolute-line"></div>

    {{-- Footer --}}
    <footer>
        <div class="container">

            {{-- Footer Contents Container --}}
            <div class="contents-container">

                <div class="terms-conditions-container">

                    <a>Terms & Conditions</a>
                    <div class="separator"></div>
                    <a>Privacy Policy</a>

                </div>

                <div class="copyright-disclaimer">2025 Investment Visa. Investment Visa is part of the Harland & Poston Group.</div>

                <div class="countries-container">

                    <span>Portugal</span>
                    <span>UK</span>
                    <span>Greece</span>
                    <span>UAE</span>
                    <span>Hong Kong</span>

                </div>

            </div>

        </div>
    </footer>

    {{-- Modal Brochure Download Form --}}
    <div class="modal-form-global-container brochure-modal-container">

        {{-- Modal Element --}}
        <div class="modal-element">

            <h3 class="modal-title">Download Brochure</h3>
            <p class="modal-subtitle">Fill in the required fields, and get the files by email and messenger</p>

            {{-- Form --}}
            <form id="brochure-download-form" class="brochure-download-form">

                @csrf

                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="tel" name="phone_number" class="phone-number-extension" placeholder="Phone Number" required>
                <input type="email" name="email_address" placeholder="Email" required>

                <button type="submit">Download</button>

                <a class="brochure-link" style="display:none" href="/assets/ebooks/USInvestorsGuide_PH_2024.pdf" target="_blank"></a>
                <input style="display:none" name="brochure-link" value="fact_sheet">
            </form>
        </div>

    </div>

    {{-- Abandon Popup --}}
    <div class="modal-form-global-container abandon-popup">

        <div class="modal-element">

            <h2 class="title">Before you leave...</h2>

            <img src="/assets/img/content/santorini-popup.jpg" style="width:100%">

            <p class="cta-text">Are you curious about the Greece Golden Visa?<br> Please download our brochure to know more</p>

            {{-- Form --}}
            <form id="brochure-download-form" class="brochure-download-form">

                @csrf

                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="tel" name="phone_number" class="phone-number-extension" placeholder="Phone Number" required>
                <input type="email" name="email_address" placeholder="Email" required>

                <button type="submit">Download Guide</button>

                <a class="brochure-link" style="display:none" href="/assets/ebooks/USInvestorsGuide_PH_2024.pdf" target="_blank"></a>
                <input style="display:none" name="brochure-link" value="fact_sheet">
            </form>

            {{-- <div class="cta-button download-guide">Download Guide</div> --}}

        </div>

    </div>

@endsection