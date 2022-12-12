@extends ('layouts.emails.layout')

@section('title')
Hello!
@endsection

@section('content')

<p>
    We're sending you this email because you requested a password reset. Click on the link below to create a new password:
</p>

<div class="form-group">
 <a class=" text-center" href="{{route ('new-password', [$token]) }}">Set a new password</a> 
</div>

<p>
    If you didn't request a password reset, you can ignore this email. Your password will not be change.
</p>

@endsection