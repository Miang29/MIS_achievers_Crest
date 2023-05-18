@extends ('contact-information.mail.layout')

@section('title')
Hello!
@endsection
@section('content')

<p>
 Thank you for reaching us through our website. {{ $contact->client_name }}
</p>

<code style="font-size:large;">
    <span style="font-family: Arial;">Response to your message:</span> {{ $contact->reply }}<br>
</code>
@endsection