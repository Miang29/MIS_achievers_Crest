<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}" type="text/css">

    <title>Dashboard</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light bg-custom">
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="{{asset('img\logo.png')}}" alt="logo">
                    </span>
                    <div class="text header-text">
                        <span class="name">Veterinary Clinic</span>

                    </div>
                </div>

                <i class="fa-solid fa-arrow-right toggle"></i>
            </header>
            <div class="menu-bar">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="">
                            <i class="fa-solid fa-chart-simple icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li </ul>
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="">
                                <i class="fa-solid fa-registered icon"></i>
                                <span class="text nav-text"> Registration</span>
                            </a>
                        </li </ul>

                        <li class="nav-link dropdown">
					<a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Services </a>

					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="{{route('consultation')}}">Consultation</a>
						<a class="dropdown-item" href="#">Pet Grooming</a>
						<a class="dropdown-item" href="#">Pet Boarding</a>
						<a class="dropdown-item" href="{{route('vaccination')}}">Vaccination</a>
						<a class="dropdown-item" href="{{route('stocks')}}">Stocks</a>
					</div>
				</li>
                            <ul class="menu-links">
                                <li class="nav-link">
                                    <a href="">
                                        <i class="fa-solid fa-cash-register icon"></i>
                                        <span class="text nav-text">Transaction</span>
                                    </a>
                                </li </ul>

                                <ul class="menu-links">
                                    <li class="nav-link">
                                        <a href="">
                                            <i class="fa-sharp fa-solid fa-print icon"></i>
                                            <span class="text nav-text">Reports</span>
                                        </a>
                                    </li </ul>


                                    <ul class="menu-links">
                                        <li class="nav-link">
                                            <a href="">
                                                <i class="fa fa-fw fa-user icon"></i>
                                                <span class="text nav-text">Users</span>
                                            </a>
                                        </li </ul>
                                   
                                        <div class="bottom-content">
                                        <ul class="menu-links">
                                            <li class="nav-link">
                                                <a href="">
                                                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                                                    <span class="text nav-text">Logout</span>
                                                </a>
                                            </li </ul>
                                        </div>

            </div>
            
        </nav>
    </nav>
</body>

</html>