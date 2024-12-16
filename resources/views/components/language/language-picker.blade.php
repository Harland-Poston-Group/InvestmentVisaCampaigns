@php
    $curr_locale = App::getLocale();

    if( $curr_locale === 'ar' ){
        echo '<style>
                body{
                    text-align: right;
                    direction: ltr;
                }
            </style>';
    }

    $locales_array = config('localization.supported_locales_array');
    $locale_data = config('localization.supported_locales_array')[$curr_locale] ?? null;
@endphp

@if( config('localization.supported_locales_array') && !is_null($locale_data) )

    <div class="language-picker nav-wrapper">
        <div class="sl-nav">
        <span class="language">{{ translate('Language:', $lang) }}</span>
        <ul>
            <li>

                {{-- Current Language --}}
                <b class="current-language">{{ translate($locale_data['name'], $lang) }}</b> <i class="fa fa-angle-down" aria-hidden="true"></i>

                {{-- <div class="triangle"></div> --}}

                {{-- List of Countries --}}
                <ul>

                    @foreach ($locales_array as $locale)

                        {{-- @dump($locale['initials']) --}}

                        @php

                            // If it's english, don't insert a URL
                            if( ( $locale['initials'] === 'en') && ( $curr_locale === 'en' ) ){
                                $link = '';
                            }else{
                                $link = route(Route::currentRouteName()) . '/' . $locale['initials'];
                            }

                        @endphp

                        <a href="{{ $link }}">
                            <li class="{{ ($curr_locale === $locale['initials']) ? 'active' : '' }}">
                                {{-- <i class="sl-flag flag-usa"
                                    style="background:url({{ $locale['flag'] }})"
                                ></i> --}}
                                <span>{{ translate($locale['name'], $lang) }}</span>
                            </li>
                        </a>
                        
                    @endforeach

                    {{-- <a href="{{ route('residency-and-citizenship') }}">
                        <li>
                            <i class="sl-flag flag-usa"></i> <span>English</span>
                        </li>
                    </a>
                    <a href="{{ route('residency-and-citizenship') }}/fr">
                        <li>
                            <i class="sl-flag flag-de"></i> <span class="active">French</span>
                        </li>
                    </a> --}}

                </ul>

            </li>
        </ul>
        </div>
    </div>

@endif