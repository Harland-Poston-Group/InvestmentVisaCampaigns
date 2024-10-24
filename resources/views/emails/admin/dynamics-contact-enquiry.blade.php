@component('mail::message')
<p style="text-align: center;margin-bottom:5px"><b>A new Dynamics contact was created through a form submission - check the details below:</b></p>

<ul class="gv-calculation-results-ul">
<li style="justify-content: space-between">
<strong>Full Name:</strong>
<span class="value-float-right">{!! $maildata['firstname'] . ' ' . $maildata['lastname'] !!}</span>
</li>
<li style="justify-content: space-between">
<strong>Contact Number:</strong>
<span class="value-float-right">{!! $maildata['telephone1'] !!}</span>
</li>
@isset($maildata['ans_countrycode'])
<li style="justify-content: space-between">
<strong>Country Code:</strong>
<span class="value-float-right">{!! $maildata['ans_countrycode'] !!}</span>
</li>
@endisset
<li style="justify-content: space-between">
<strong>Email:</strong>
<span class="value-float-right">{!! $maildata['emailaddress1'] !!}</span>
</li>
<li style="justify-content: space-between">
<strong>Submission Page:</strong>
<span class="value-float-right">{!! $maildata['ans_firstpageseen'] !!}</span>
</li>
@isset( $maildata['utm_source'] )
<li style="justify-content: space-between">
<strong>UTM Source:</strong>
<span class="value-float-right">{!! $maildata['utm_source'] !!}</span>
</li>
@endisset
@isset( $maildata['utm_campaign'] )
<li style="justify-content: space-between">
<strong>UTM Campaign:</strong>
<span class="value-float-right">{!! $maildata['utm_campaign'] !!}</span>
</li>
@endisset
@isset( $maildata['utm_medium'] )
<li style="justify-content: space-between">
<strong>UTM Medium:</strong>
<span class="value-float-right">{!! $maildata['utm_medium'] !!}</span>
</li>
@endisset
@isset( $maildata['ans_whatareyoulookingfortext'] )
<li style="justify-content: space-between">
<strong>Subject:</strong>
<span class="value-float-right">{!! $maildata['ans_whatareyoulookingfortext'] !!}</span>
</li>
@endisset
</ul>

@isset( $maildata['ans_message'] )
## Message
@component('mail::panel')
    {!! $maildata['ans_message'] !!}
@endcomponent
@endisset

Thanks,<br>
{{ config('app.name') }}
@endcomponent
