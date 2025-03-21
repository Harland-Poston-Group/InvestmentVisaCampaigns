@component('mail::message')
<p style="text-align: center;margin-bottom:5px"><b>Hello {{ $maildata['firstname'] }} - thank you for your submission.<br> You can access the brochure by clicking on the button below:</b></p>

@component('mail::button', ['url' => $maildata['brochure-link']])
    See Brochure
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
