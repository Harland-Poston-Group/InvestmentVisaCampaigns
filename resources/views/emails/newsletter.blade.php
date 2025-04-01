<p><strong>New Message from Web Advisor:</strong></p>
<p>Email: {{ $details['email'] ?? 'No Email Provided' }}</p>

<p><strong>Filters:</strong></p>
<ul>
    @foreach(($details['filters'] ?? []) as $key => $value)
        <li>{{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}</li>
    @endforeach
</ul>

