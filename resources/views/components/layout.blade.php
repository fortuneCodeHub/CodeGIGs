<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Codegigs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Icon Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href=" {{asset("css/style.css")}} ">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href=" {{asset("css/authstyle.css")}} ">
</head>
<body>

    <!-- Navbar Begins -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{route("home")}}">C<span>G</span></a>
            </div>
            <button class="navbar-toggler navbar-btn shadow" type="button" aria-label="Toggle navigation" id="offCanvasBtn">
                <i class="bi bi-list" ></i>
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navmenu">
                <!-- <div class="offcanvas-bases"> -->
                    <div class="offcanvas-bar d-lg-none py-5 px-1 text-end">
                        <button id="offCanvasBtn" class="btn btn-closer shadow" type="button">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <style>
                                .nav-item > span {
                                    color: black;
                                    font-size: 15px;
                                    padding: 5px 10px;
                                }
                                .nav-item > span:hover {
                                    color: white;
                                }
                            </style>
                            <li class="nav-item my-sm-1 my-3 ps-lg-0 ps-3 py-lg-0 py-2 mb-lg-0 mb-4 mx-sm-1 mx-0">
                                <span class="text-uppercase fw-bolder">
                                    Welcome {{auth()->user()->name}}
                                </span>
                            </li>
                            <li class="nav-item my-sm-0 my-1 mx-sm-1 mx-0">
                                <a href="{{route("manage")}}" class="nav-link px-sm-3 px-2" id="nav-link">
                                    <i class="bi bi-gear-fill me-2"></i>Manage Listings
                                </a>
                            </li>
                            <li class="nav-item my-sm-0 my-1 mx-sm-1 mx-0">
                                <form action="{{route("logout")}}" method="POST">
                                    @csrf
                                    <button class="nav-link px-sm-3 px-2" id="nav-link" >
                                        <i class="bi bi-box-arrow-left me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item my-sm-0 my-1 mx-sm-1 mx-0">
                                <a href="{{route("login")}}" class="nav-link px-sm-3 px-2" id="nav-link">
                                    <i class="bi bi-box-arrow-right me-2"></i>Login
                                </a>
                            </li>
                            <li class="nav-item my-sm-0 my-1 mx-sm-1 mx-0">
                                <a href="{{route("register")}}" class="nav-link px-sm-3 px-2" id="nav-link">
                                    <i class="bi bi-person-plus-fill me-2"></i>Register
                                </a>
                            </li>
                        @endauth
                    </ul>
                <!-- </div> -->
            </div>
        </div>
    </nav>
    <!-- Navbar Ends -->

    {{-- VIEW --}}
    <main>
        {{$slot}}
    </main>

    <!-- Footer Begins -->
    <section class="footer p-5 py-3 fixed-bottom">
        <div class="container">
            <div class="d-md-flex d-block align-items-center justify-content-between">
                <p>Copyright &copy; 2022, All Rights Reserved</p>
                <a href="{{route("create")}}" class="post-btn shadow">Post Job</a>
            </div>
        </div>
    </section>

    {{-- Flash Message --}}
    <x-flash-message />


    <!-- Footer Ends -->
    <!-- JS Links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- Custom JS --}}
    <script src="{{asset("js/app.js")}}"></script>
    {{-- Custom JS --}}
    <script src="{{asset("js/authapp.js")}}"></script>
</body>
</html>
