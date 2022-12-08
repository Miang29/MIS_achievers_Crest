@extends ('password.layout')

@section('title', 'New Password')

@section('content')
<form class="col-lg-12 col-12 col-md-12 " style="margin-top:5rem;">
    <div class="card dark-shadow w-100 w-lg-50 w-md-50 m-auto" style="height:100%;">
    {{ csrf_field() }}
    <i class="fa-solid fa-unlock fa-lg mt-5"></i>
        <h3 class="mx-auto text-1">Set new password</h3>
        <p class="mx-auto">Your new password must be different to previously used password.</p>

        <div class="col-lg-12 col-12 col-md-8">
            {{-- PASSWORD --}}
            <div class="col-12 col-md-9 col-lg-8 mx-auto">
                <label class="important text-1 ">Password</label>
                <div class="input-group">
                    <input class="form-control" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" />

                    <div class="input-group-append">
                        <button type="button" class="btn btn-light form-border border-left-0 floating-eye-pass" id="toggle-show-password" aria-label="Show Password" data-target="#password">
                            <i class="fas fa-eye d-none" id="show"></i>
                            <i class="fas fa-eye-slash" id="hide"></i>
                        </button>
                    </div>
                </div>
                <small class="text-danger small">{{ $errors->first('password') }}</small>
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="col-12 col-md-9 col-lg-8 mx-auto">
                <label class="important text-1 my-2">Confirm Password</label>
                <div class="input-group">
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" aria-label="Password_Confirmation" aria-describedby="toggle-show-password" />

                    <div class="input-group-append">
                        <button type="button" class="btn btn-light form-border border-left-0 floating-eye-pass" id="toggle-show-password" aria-label="Show Password" data-target="#password_confirmation">
                            <i class="fas fa-eye d-none" id="show"></i>
                            <i class="fas fa-eye-slash" id="hide"></i>
                        </button>
                    </div>
                </div>
                <small class="text-danger small">{{ $errors->first('password') }}</small>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-outline-custom w-25 btn-sm font-weight-bold mt-3" data-type="submit">Reset Password</button>
            </div>

            <div class="mx-auto text-center mb-5">
                <a href="{{route ('login')}}"><i class="fa-solid fa-backward mr-2"></i>Back to Login</a>
            </div>

        </div>
    </div>
</form>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
@endsection