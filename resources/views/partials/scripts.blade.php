    @if (env('APP_ENV') == 'production')

        <!-- Microsoft Clarity -->
        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "jfky1xya3k");
        </script>

        <!-- Meta Pixel Code -->
            <script>
                !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                    n.queue=[];t=b.createElement(e);t.async=!0;
                    t.src=v;s=b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '163126273522999');
                fbq('track', 'PageView');
            </script>
            <noscript>
                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=163126273522999&ev=PageView&noscript=1"/>
            </noscript>
        <!-- End Meta Pixel Code -->

        <!-- Meta Pixel Code -->
            <script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', ' https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '678459207652433'); fbq('track', 'PageView'); </script>
            <noscript>
                <img height="1" width="1" style="display:none" src=" https://www.facebook.com/tr?id=678459207652433&ev=PageView&noscript=1" />
            </noscript>
        <!-- End Meta Pixel Code -->

        <!-- Twitter conversion tracking base code --> <script> !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments); },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js' , a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script'); twq('config','ogkqf'); </script> <!-- End Twitter conversion tracking base code -->

        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-N5WRRKQX');
        </script>
        <!-- End Google Tag Manager -->

    @endif

    {{-- FontAwesome --}}
    {{-- <script src="https://kit.fontawesome.com/76c891ceee.js" crossorigin="anonymous"></script> --}}
    <script src="https://kit.fontawesome.com/d1a59e9898.js" crossorigin="anonymous"></script>