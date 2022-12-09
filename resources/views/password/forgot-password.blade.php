@extends ('password.layout')

@section('title', 'Forgot Password')

@section('content')
<form method="POST" action="{{ route('send-notification') }}"  class="col-lg-12 col-12 col-md-8" style="margin-top:8rem;" >
    <div class="card dark-shadow w-lg-50 w-mb-50 w-100 m-auto">
    {{ csrf_field() }}
    <i class="fa-solid fa-lock fa-lg mt-5"></i>
        <h3 class="mt-3 mx-auto text-1">Forgot Password?</h3>
        <p class="mx-auto">To reset your password please enter your email.</p>
        <div class="input-group mb-3 col-lg-8 mx-auto mt-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
            </div>
            <input type="text" class="form-control" name="email" placeholder="Enter your email" aria-label="Username" aria-describedby="basic-addon1">
            <small class="text-danger small">{{ $errors->first('email') }}</small>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-outline-custom w-25 btn-sm font-weight-bold" data-type="submit">Send</button>
        </div>

        <div class="mx-auto mb-5">
            <a href="{{route ('login')}}"><i class="fa-solid fa-backward mr-2"></i>Back to Login</a>
        </div>
    </div>
</form>
@endsection