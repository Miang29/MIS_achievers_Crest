<!DOCTYPE html>
<html lang=en>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>sign up</title>

  {{-- Fontawesome --}}
  <script src="https://kit.fontawesome.com/d4492f0e4d.js" crossorigin="anonymous"></script>

  {{-- jQuery 3.6.0 --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->

  {{-- jQuery UI 1.12.1 --}}
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  {{-- Bootstrap 4.4 --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
</head>

<body>
  <div class="d-flex flex-column min-vh-100">
    <div class="content d-flex flex-column flex-grow-1 my-3 my-lg-5" id="content">
      <div class="container-fluid d-flex flex-column flex-grow-1">

        <div class="card w-md-50 w-sm-25  m-auto">
          <h4 class="card-header bg-info text-center text-white">Sign Up</h4>

          <form method="Post" action="{{route('store')}}" class="card-body">
            {{ csrf_field() }}
            <div class="w-50 mx-auto">

              <div class="form-group">

                <input type="text" placeholder="Username" class="form-control border-secondary my-2" id="Inputusername" name="username" value="{{ old('Username') }}">
                <small class="text-danger">{{ $errors->first('username') }}</small>

                <input type="password" placeholder="Password" class="form-control border-secondary my-2" id="Password" name="password">
                <small class="text-danger">{{ $errors->first('password') }}</small>

                <input type="password" placeholder="Confirm Password" class="form-control border-secondary my-2" id="Password" name="password_confirmation">
                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>

                <input type="text" placeholder="Name" class="form-control border-secondary my-2" id="Inputname" name="name">
                <small class="text-danger">{{ $errors->first('name') }}</small>

                <input type="email" placeholder="Email" class="form-control border-secondary my-2" id="Inputemail" name="email">
                <small class="text-danger">{{ $errors->first('email') }}</small>
              </div>

              <div class="form-group text-center  ">
                <button type="submit" class="btn btn btn-info w-50">Create Account</button>
              </div>

              <p class="text text-center"> Already have account? <a class="signup-link" href="{{ route('signin') }}">Sign In</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>