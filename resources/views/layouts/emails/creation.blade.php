@extends ('layouts.emails.layout')

@section('title')
Hello!
@endsection

@section('content')
<p>
    Your account has been created just recently and you're now ready to access it!
</p>

<p>To access your account, go to the <a href="{{route ('login') }}">login</a> page and enter the credentials below:</p>

<code style="font-size:large;">
    <span style="font-family: Arial;">Username:</span> {{ $req->username }}<br>
    <span style="font-family: Arial;">Password:</span> {{ $req->password }}
</code>
@endsection