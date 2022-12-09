@extends ('layouts.emails.layout')

@section('title')
Hello!
@endsection

@section('content')

<p>
    We're sending you this email because you requested a password reset. Click on the button below to create a new password:
</p>

<div class="form-group text-center">
    <button href="{{route ('new-password') }}" class="btn btn-outline-custom w-50 btn-sm font-weight-bold">Set a new password</button>
</div>

<p>
    If you didn't request a password reset, you can ignore this email. Your password will not be change.
</p>

@endsection