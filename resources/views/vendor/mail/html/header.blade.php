@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
<img src="https://campaigns.investmentvisa.com/assets/img/logos/logo.png" class="logo" style="" alt="Investment Visa Logo">
{{-- @else
{{ $slot }}
@endif --}}
</a>
</td>
</tr>
