@extends ('layouts.emails.layout')

@section('title')
Hello!
@endsection

@section('content')


<p>
    You have successfully change your password!
</p>

<p>To access your account, go to the <a href="{{route ('login') }}">Login</a> page and enter the credentials below:</p>

<code style="font-size:large;">
    <span style="font-family: Arial;">Username:</span> {{ $req->username }}<br>
    <span style="font-family: Arial;">New Password:</span> {{ $req->password }}
</code>

@endsection