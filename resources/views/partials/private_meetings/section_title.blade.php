{{-- Left Title Banner --}}
<div class="left-title-banner {{ $class ?? '' }}">

    <div class="container">

        <div class="text-container">
            <h3 class="title animate__animated animate__fadeInUpBig">
                {!! $title !!}

                @if( isset($title_detail) && !empty($title_detail) )
                    <span class="centered-dot">·</span>
                    <span class="title-detail">{!! $title_detail !!}</span>
                @endisset

            </h3>
            <p class="subtitle animate__animated animate__fadeInLeft animate__delay-1s">{!! $subtitle ?? '' !!}</p>
        </div>

        <div class="white-element"></div>

    </div>

</div>
