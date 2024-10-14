@component('mail::message')
<p style="text-align: center;margin-bottom:5px"><b>A new Dynamics contact was created/updated through a form submission - check the details below:</b></p>

<ul class="gv-calculation-results-ul">
<li style="justify-content: space-between">
<strong>Full Name:</strong>
<span class="value-float-right">{!! $maildata['firstname'] . ' ' . $maildata['lastname'] !!}</span>
</li>
<li style="justify-content: space-between">
<strong>Contact Number:</strong>
<span class="value-float-right">{!! $maildata['telephone1'] !!}</span>
</li>
{{-- <li style="justify-content: space-between">
<strong>Country Code:</strong>
<span class="value-float-right">{!! $maildata['country_code'] !!}</span>
</li> --}}
<li style="justify-content: space-between">
<strong>Email:</strong>
<span class="value-float-right">{!! $maildata['emailaddress1'] !!}</span>
</li>
<li style="justify-content: space-between">
<strong>Submission Page:</strong>
<span class="value-float-right">{!! $maildata['ans_firstpageseen'] !!}</span>
</li>
<li style="justify-content: space-between">
<strong>Subject:</strong>
<span class="value-float-right">{!! $maildata['ans_whatareyoulookingfortext'] !!}</span>
</li>
</ul>

## Message
@component('mail::panel')
    {!! $maildata['ans_message'] !!}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
