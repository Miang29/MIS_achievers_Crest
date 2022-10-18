<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>signin</title>

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/d4492f0e4d.js" crossorigin="anonymous"></script>

    {{-- jQuery 3.6.0 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->

    {{-- jQuery UI 1.12.1 --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    {{-- Bootstrap 4.4 --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <div class="content d-flex flex-column flex-grow-1 my-3 my-lg-5" id="content">
            <div class="container-fluid d-flex flex-column flex-grow-1">
                <div class="card w-sm-75 w-md-50 w-lg-25 m-auto">
                    <h4 class="card-header bg-info text-center text-white">Sign In</h4>

                    <form method="Post" action="{{route('authenticate')}}"class="card-body">
                    {{ csrf_field() }}
                        {{--USERNAME--}}
                        <div class="form-group">
                        <span class="text-danger ">{{Session::get('flash_error')}}</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class=" input-group-text border-secondary" id="inputGroupPrepend"> <i class="fa-solid fa-user"></i></span>
                                </div>
                                <input type="username" placeholder="Username" class="form-control bg-white border-secondary" id="Inputusername" name="username">
                               </div>
                        </div>

                        {{--PASSWORD--}}
                        <div class="form-group">
                        <span class="text-danger">{{Session::get('flash_error')}}</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-secondary " id="inputGroupPrepend"> <i class="fa-solid fa-lock"></i></span>
                                </div>
                                <input type="password" placeholder="Password" class="form-control bg-white border-secondary border-right-0 " id="password" name="password">
                                <div class="input-group-append">
                                    <button type="button" class="btn bg-white border-secondary border-left-0" id="toggle-show-password" aria-label="Show Password" data-target="#password">
                                        <i class="fas fa-eye-slash" id="hide"></i>
                                        <i class="fas fa-eye d-none" id="show"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center  ">
                            <button type="submit" class="btn btn btn-info w-50">Login</button>
                        </div>
                        <p class="text text-center"> Don't have account? <a class="signup-link" href="{{ route('signup') }}">Sign Up</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>