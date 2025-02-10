@component('mail::message')
<p style="text-align: center;margin-bottom:5px"><b>Como é que é Migas, tudo?<br> Então não é que um bartolo tentou submeter um formulário com o seguinte email? Ganda tone</b></p>

<ul class="gv-calculation-results-ul">
<li style="justify-content: space-between">
<strong>Email:</strong>
<span class="value-float-right">{!! $maildata !!}</span>
</li>
</ul>



{{-- @isset( $maildata['ans_message'] )
## Message
@component('mail::panel')
    {!! $maildata['ans_message'] !!}
@endcomponent
@endisset --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
