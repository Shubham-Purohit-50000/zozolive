<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <!-- Scripts -->

    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet">
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    @yield('css')
    <style type="text/css">
        .usernameBox {
            background-color: rgba(255, 255, 255, .1);
            border-color: transparent;
            border-width: 2px;
            height: 42px;
            letter-spacing: .02em;
            font-size: 1rem;
        }

        .submitButton {
            letter-spacing: .02em;
            transition: all ease-in-out .25s;
            background: #1e9b4b;
            color: #fff;
            transition: all 90ms ease-in-out 0s;
            border-color: transparent;
            padding: 2px 20px;
            font-size: 1rem;
        }

        .mt-100 {
            margin-top: 100px;
        }
        .mt-80 {
            margin-top: 80px;
        }

        .withoutEmail {
            background: 0 0;
            border: 2px solid rgba(255, 255, 255, .15);
            color: rgba(255, 255, 255, .5);
            font-weight: 500;
            margin-top: 12px;
            width: 100%;
            line-height: 2.25rem;
            font-size: .875rem;
            transition: all 120ms ease-in-out 0s;
        }

        .withoutEmail:hover {
            background: rgba(255, 255, 255, .2);
            border-color: transparent;
            color: rgba(255, 255, 255, .5);
        }

        .socialBox div {
            width: 48%;
        }

        .alreadyAcc {
            color: rgba(255, 255, 255, .3) !important;
            font-size: 14px;
            font-weight: 500;
            line-height: 17px;
            margin-top: 15px;
        }

        .customClose {
            margin-left: auto;
            background: none;
            border: none;
            font-weight: 400;
            font-size: 30px;
            line-height: 35px;
            color: rgba(255, 255, 255, .4);
        }

        .customClose:hover {
            color: rgba(255, 255, 255, .5);
        }

        .ps-0 {
            padding: 0px;
        }

        .loginForm {
            width: 85%;
            margin: auto;
        }

        .loginForm .alreadyAcc a {
            color: rgba(255, 255, 255, .3) !important;
        }

        .bottomNavFixed{position:absolute;bottom:0;width:100%;text-align:center;color:#fff;font-weight:400;}
        .bottomNavFixed a{color:#fff;font-weight:400;}
        .radiusT{border-radius:15px 15px 0px 0px;}
        .radiusB{border-radius:10px 10px 0px 0px;}
        .radius10{border-radius:10px;}
    </style>
</head>
@php
    $current = Request::path();
@endphp

<body class="{{ $current == '/' ? '' : 'toggle-sidebar' }}">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true"
            style="background-color: black; color: white; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-list toggle-sidebar-btn color_white" style="width:85px;"></i>
            <a href="{{ url('/') }}" class="logo d-flex align-items-center text-white ">
                ZOZO LIVE
                <!--
        <span class="d-none d-lg-block">Chat demo</span> -->
            </a>
        </div><!-- End Logo -->

        <div class="total_live d-flex align-items-center">
            <span class="total_live--icon">●</span>
            <span class="color-white text-upper total_live--count">6435 Live</span>
        </div>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ml-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item d-block">
                    <a class="nav-link nav-icon search-bar-toggle loginLink bg_button" href="javascript::void();"
                        data-bs-toggle="modal" data-bs-target="#basicModal">
                        Create Free Account
                    </a>
                </li>


                <li class="nav-item d-block">
                    <a class="nav-link nav-icon search-bar-toggle loginLink outline_button" href="javascript::void();"
                        data-bs-toggle="modal" data-bs-target="#loginModal">
                        Log In
                    </a>
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
    <!-- ----second nav -->
    <nav class="second-nav">
        <ul class="second-nav-ul">
            <li class="second-nav-li">
                <div class="chip">
                    <div class="chip-head"></div>
                    <div class="chip-content">Chip Content</div>
                </div>
            </li>
            <li class="second-nav-li">
                <a class="second-nav-a" href="#">
                    Profile
                </a>
            </li>
            <li class="second-nav-li">
                <a class="second-nav-a" href="#">
                    Videos
                </a>
            </li>
            <li class="second-nav-li">
                <a class="second-nav-a" href="#">
                    Photos
                </a>
            </li>
            <li class="second-nav-li">
                <a class="second-nav-a" href="#">
                    Feed
                </a>
            </li>
            <li class="second-nav-li">
                <div class="chip" style="margin-right: 10px">
                    <div class="chip-content" style="padding: 0 8px">
                        Join Fan Club
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">
                    <i class="bi bi-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="bi bi-home"></i>
                    <span>Feed</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="bi bi-home"></i>
                    <span>Recommended</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="bi bi-home"></i>
                    <span>My Favorites11</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="bi bi-home"></i>
                    <span>Watch History</span>
                </a>
            </li>
            <br>
            <hr>
            <br>
            <p>Specials</p>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="bi bi-home"></i>
                    <span>India</span>
                </a>
            </li>
        </ul>

    </aside>
    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- -----chips----- -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->

    <footer class="site-footer section"
        style="bottom: 0;
                    position:  relative; margin-left: 0; z-index: 1; width: 100%; ">
        <div class="p-20">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <h6>About</h6>
                    <p class="text-justify font-7">
                        Welcome to Stripchat Global! We're a free online
                        community where you can come and watch our
                        amazing amateur models perform live interactive
                        shows.
                        <br />
                        <br /> Stripchat Global is 100% free and access
                        is instant. Browse through hundreds of models
                        from Women, Men, Couples, and Transsexuals
                        performing live sex shows 24/7. Besides watching
                        free live cam shows, you also have the option
                        for Private shows, spying, Cam to Cam, and
                        messaging models.
                        <br />
                        <br />
                        All models appearing on this site have
                        contractually confirmed to us that they are 18
                        years of age or older.
                    </p>
                </div>
                <div class="col-xs-4 col-md-2">
                    <h6>LEGAL AND SAFETY</h6>
                    <hr />
                    <ul class="footer-links">
                        <li>
                            <a href="{{ url('privacy-policy') }}">
                                Privacy Policy
                            </a>
                        </li>
                        <hr />
                        <li>
                            <a href="{{ url('terms-of-use') }}">
                                Terms of Use
                            </a>
                        </li>
                        <hr />
                        <li>
                            <a href="{{ url('dmca-policy') }}">
                                DMCA Policy
                            </a>
                        </li>
                        <hr />
                        <li>
                            <a href="{{ url('cookies-policy') }}">
                                Cookies Policy
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-4 col-md-2">
                    <h6>WORK WITH US</h6>
                    <hr />
                    <ul class="footer-links">
                        <li>
                            <a href="{{ url('become-a-model') }}">
                                Become a Model
                            </a>
                        </li>
                        <hr />
                        <li>
                            <a href="">
                                Studio Signup
                            </a>
                        </li>
                        <hr />
                        <li>
                            <a href="">
                                Affiliate Program
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-4 col-md-2">
                    <h6>HELP & SUPPORT</h6>
                    <hr />
                    <ul class="footer-links">
                        <li>
                            <a href="">
                                Contact & Support
                            </a>
                        </li>
                        <hr />
                        <li>
                            <a href="">
                                Billing Support
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <p class="copyright-text font-7" style="text-align: center;">
                        18 U.S.C. 2257 Record-Keeping Requirements
                        Compliance Statement
                    </p>
                </div>
                <div class=" col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li>
                            <a class="facebook" href="#">
                                <span class="font-8">18+</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade " id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background:transparent;">
                <div class="modal-header ps-0">
                    <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body modal-body-all radius10">
                    <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center radius10">
                        <div class="card mb-0  container-fluid radiusT">
                            <div class="card-body formbody modal-body-all row align-items-center radiusB">
                                <div class="col-md-6" style="padding: 30px;">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title-modal-login text-center pb-0 fs-4">Create an Account
                                        </h5>
                                    </div>
                                    <form class="g-3 needs-validation" novalidate="">
                                        <div class="col-12">
                                            <div class="input-group has-validation">
                                                <input placeholder="Username" type="text" name="username"
                                                    class="form-control modal-input usernameBox" id="yourUsername"
                                                    required="">
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 btn-login submitButton">Create Free
                                                Account</button>
                                        </div>
                                        <p class="text-center mt-80" style="color:#fff;">or Continue with</p>
                                        <div
                                            class="socialBox col-md-12 d-flex align-items-center justify-content-between">
                                            <div>
                                                <button class="btn btn-primary w-100 btn-login withoutEmail"
                                                    type="submit"><i class="bi bi-google"></i> &nbsp; Google</button>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary w-100 btn-login withoutEmail"
                                                    type="submit"><i class="bi bi-twitter"></i> &nbsp;
                                                    Twitter</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 btn-login withoutEmail"
                                                type="submit">Sign Up without Email</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0 text-center alreadyAcc"> Already have an account? <a
                                                    href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 background-image-createlogin" style="min-height:560px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic Modal-->

    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog  modal-sm  ">
            <div class="modal-content" style="background:transparent;">
                <div class="modal-header ps-0">
                    <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>

                <div class="modal-body modal-body-all radius10">

                    <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center radius10">
                        <div class="card mb-3 radiusT">
                            <div class="card-body formbody modal-body-all radiusB">
                                <div class="pt-8 pb-2">
                                    <h1 class="card-title-modal-login text-center pb-0 fs-4 mb-0 ">Log In</h1>

                                </div>

                                <form class="row g-3 needs-validation loginForm" novalidate="">

                                    <div class="col-12">
                                        <!-- <label for="yourUsername" class="form-label">Username</label> -->
                                        <!-- <div class="input-group has-validation"> -->
                                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                        <input type="text" name="username" class="form-control modal-input"
                                            placeholder="Username or Email" id="yourUsername" required="">
                                        <!-- <div class="invalid-feedback">Please enter your username.</div> -->
                                        <!-- </div> -->
                                    </div>

                                    <div class="col-12">
                                        <!-- <label for="yourPassword" class="form-label">Password</label> -->
                                        <input type="text" name="username" class="form-control modal-input"
                                            placeholder="Please enter your password" id="yourUsername"
                                            required="">

                                        <!-- <input type="password" name="password" class="form-control" id="yourPassword" required=""> -->
                                        <!-- <div class="invalid-feedback">Please enter your password!</div> -->
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 btn-login" type="submit">Login</button>
                                    </div>
                                    <div class="col-12 mt-0" style="text-align: center; ">
                                        <a href="#" class="forget"
                                            style="    color: #a4a4a4;
    cursor: pointer;
       display: inline-block;
    padding-top: 5px;
    font-size: .900rem;">Forgot
                                            password?</a>
                                    </div>

                                    <p class="text-center mt-100" style="color:#fff;">or Login with</p>
                                    <div class="socialBox col-md-12 d-flex align-items-center justify-content-between">
                                        <div>
                                            <button class="btn btn-primary w-100 btn-login withoutEmail"
                                                type="submit"><i class="bi bi-google"></i> Google</button>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary w-100 btn-login withoutEmail"
                                                type="submit"><i class="bi bi-twitter"></i> Twitter</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0 text-center alreadyAcc"><a href="">Log In without
                                                Password</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        <div class="bottomNavFixed"><a href="#">Create Free Account</a></div>
    </div><!-- End Basic Modal-->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
        @yield('js')
    <style type="text/css">
        .formbody p,
        .formbody label {
            color: #000;
        }
    </style>
    <script>
        function register(agent) {
                
        }
    </script>
</body>

</html>
