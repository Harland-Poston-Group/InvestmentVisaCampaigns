<footer class="footer-pm">

    <div class="container main-container">

        @php

            $currentUrl = $_SERVER['REQUEST_URI'];

            if (strpos($currentUrl, 'greece-golden-visa') !== false) {
                $page = 'greece_gv';
            } elseif (strpos($currentUrl, 'residency-and-citizenship') !== false) {
                $page = 'residency_and_citizenship';
            } else {
                $page = 'iv_landing_page';
            }

        @endphp

        {{-- Investment Visa Logo --}}
        <div class="ph-footer-logo">
            <a href="https://www.investmentvisa.com/?utm_source=lp_usa_awareness&utm_medium=logo_footer&utm_campaign=usa_awareness">

                @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )

                    {{-- Logo in Chinese --}}
                    <img src="/images/residency/IV-Logo-Color-Negat.png">

                @else

                    {{-- Default Logo --}}
                    <img src="/images/residency/IV-Logo-Color-Negat.png">

                @endif

            </a>
        </div>

        <h5 style="font-size: 14px; margin-bottom: 10px;" class="uppercase mt-4 bold follow-us-text text-white">FOLLOW US</h5>

        {{-- Social Media Icons --}}
        <div class="social-media-container">

            <div class="white-round-div">
                <a href="https://www.facebook.com/hpginvestmentvisa?utm_source=landing_page_{{ $page }}&utm_medium=footer_social&utm_campaign=landing_page_{{ $page }}" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            </div>
            <div class="white-round-div">
                <a href="https://x.com/investment_visa?utm_source=landing_page_{{ $page }}&utm_medium=footer_social&utm_campaign=landing_page_{{ $page }}" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            </div>
            <div class="white-round-div">
                <a href="https://www.instagram.com/investment_visa?utm_source=landing_page_{{ $page }}&utm_medium=footer_social&utm_campaign=landing_page_{{ $page }}" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
            <div class="white-round-div">
                <a href="https://www.linkedin.com/company/investmentvisa?utm_source=landing_page_{{ $page }}&utm_medium=footer_social&utm_campaign=landing_page_{{ $page }}" target="_blank">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </div>
            <div class="white-round-div">
                <a href="https://www.youtube.com/c/HarlandPostonGroup?utm_source=landing_page_{{ $page }}&utm_medium=footer_social&utm_campaign=landing_page_{{ $page }}" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>

        </div>



        {{-- Company information --}}
        <span class="company-info">
            Praça da Alegria 01, 3rd Floor<br> 1250-004 Lisbon - Portugal<br> info@investmentvisa.com<br> +351 213 471 603
        </span>
        <div class="footer-terms-and-conditions my-5"><a href="https://www.investmentvisa.com/privacy-policy">Terms and Conditions</a> | <a href="https://www.investmentvisa.com/privacy-policy">Privacy Policy</a></div>
        <div class="left-span" style="font-size: 12px;">© 2024 Investment Visa. Investment Visa is part of the Harland & Poston Group.</div>
    </div>

    @if( app()->getLocale() == 'twn' || app()->getLocale() == 'zh'  )
        <style>
            body .footer-pm .bottom-bar .left-span{
                font-style: unset
            }
        </style>
    @endif
<!--
    <div class="bottom-bar">
        <div class="container bottom-container">
            <span class="left-span">{--!! __('content.trademark_disclaimer') !!--}</span>
            <span class="footer-terms-and-conditions"><a href="https://www.investmentvisa.com/terms-and-conditions">{{-- __('content.terms_and_conditions') --}}</a> | <a href="https://www.portugalhomes.com/privacy-policy">{{-- __('content.privacy_policy') --}}</a></span>
        </div>
    </div>
-->

    {{-- Notify JS --}}
    <script src="/assets/js/notify.js"></script>

    <!-- Notifications Element -->
    <div id="notifications"></div>

</footer>
