    <!-- Favicon(s) -->
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon96x96.png" sizes="96x96">

    <!-- Favicons optimized for Apple devices -->
    <!-- <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon72x72.png" > -->
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/favicon/favicon114x114.png" >
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favicon/favicon152x152.png" >
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/favicon180x180.png">

    <!-- Setting the meta theme color - Color which mobile devices tabs will have when visiting the website -->
    <meta name="theme-color" content="#D9AB4D"/>

    {{-- Hubspot tracking code --}}
    <script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/4623514.js"></script>

    <!-- Microsoft Clarity -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "8cbky6xbea");
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NMFQZNH');</script>
    <!-- End Google Tag Manager -->

    {{-- Microsoft Ads --}}
    <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"187135592", enableAutoSpaTracking: true};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
            forms.forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    const emailField = form.querySelector('input[type="email"]');
                    const phoneField = form.querySelector('input[type="tel"]');

                    const email = emailField ? emailField.value : '';
                    const phone = phoneField ? phoneField.value : '';

                    console.log(email);
                    console.log(phone);

                    // Microsoft Ads Enhanced Conversion Tracking
                    window.uetq = window.uetq || [];
                    window.uetq.push('set', {
                        'pid': {
                            'em': email,
                            'ph': phone,
                        },
                    });

                    console.log('Enhanced Conversion tracking executed.');
                });
            });
        });
    </script>

    <script>
        window.uetq = window.uetq || [];
        window.uetq.push("event", "submit_lead_form", {});
    </script>
    {{-- End of Microsoft Ads --}}

    {{-- Reddit Pixel --}}
    <script>
    !function(w,d){if(!w.rdt){var p=w.rdt=function(){p.sendEvent?p.sendEvent.apply(p,arguments):p.callQueue.push(arguments)};p.callQueue=[];var t=d.createElement("script");t.src="https://www.redditstatic.com/ads/pixel.js",t.async=!0;var s=d.getElementsByTagName("script")[0];s.parentNode.insertBefore(t,s)}}(window,document);rdt('init','a2_f49yu2lbsak7');rdt('track', 'PageVisit');
    </script>

    <link rel="stylesheet" href="{{ mix('/assets/css/app.css') }}?v={{ uniqid() }}">
    <script src="{{ mix('/assets/js/app.js') }}?v={{ uniqid() }}" defer></script>

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/76c891ceee.js" crossorigin="anonymous"></script>
