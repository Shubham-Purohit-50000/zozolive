<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $current = Request::path();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @routes
    {{-- @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"]) --}}
    @inertiaHead
    <!-- Vendor CSS Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet">
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    {{--    <script type="text/javascript" src="{{ asset('js/firebase.js') }}"></script> --}}

    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"
            integrity="sha512-wdUM0BxMyMC/Yem1RWDiIiXA6ssXMoxypihVEwxDc+ftznGeRu4s9Fmxl8PthpxOh5CQ0eqjqw1Q8ScgNA1moQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset(mix('js/manifest.js')) }}" defer></script>
    <script src="{{ asset(mix('js/vendor.js')) }}" defer></script>
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
    <!-- <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script> -->
    {{-- <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.6.11.js"></script> --}}
    <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.css"
          integrity="sha512-jxGmKjC/OykrTklkNK2NgnhNtKtUAADFY+rvSi3nA7dbaPRfjrSXYxHqX8iq5N6WTOntqEQZrEwW3L84sirfKQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    @if ($current == 'become-a-model')
        <link href="{{ asset('css/become-model.css') }}" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <style type="text/css">
        .usernameBox {
            background-color: rgba(255, 255, 255, .1);
            height: 42px;
            letter-spacing: .02em;
            font-size: 1rem;
            border: 1px solid transparent;
        }

        .usernameBox:focus-within {
            border: 1px solid #1e9b4b !important;
        }

        .usernameBox:focus-within {
            border: 1px solid #1e9b4b !important;
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
            border: none transparent;
            outline: none;
        }

        .mt-100 {
            margin-top: 100px;
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

        .loginLink.dotImage.nav-icon {
            height: 35px;
            width: 35px;
        }

        .username__label {
            border: 1px solid;
            border-radius: 50%;
            padding: 0.1rem 0.8rem;
            font-size: 1.1rem !important;
        }

        .ml-0 {
            margin-left: 0 !important;
        }
        .formbody p,
    .formbody label {
        color: #000;
    }
    .desktop-d-none {
        display: none !important;
    }
    ul.dropdown-menu.dropdown-menu-end.dropdown-menu-arrow.profile.show {
        background: #202020;
    }

    .dropdown-header .username_detail {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #9f9f9f !important;
        text-transform: capitalize;
    }

    .dropdown-header .username_detail .username_first {
        text-transform: uppercase;
        font-size: 30px !important;
        height: 56px !important;
        width: 56px;
        border-radius: 38px;
        border: 3px solid #9f9f9f;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #202020;
        color: #9f9f9f;
        font-weight: 400;
    }

    .header-nav .profile .dropdown-item:hover {
        background-color: #4f5054;
    }

    .dropdown-menu .dropdown-divider {
        color: #969696;
        margin: 0px;
        z-index: 999;
        border: 1px solid;
    }

    .loginLink.dotImage.nav-icon {
        border-radius: 50%;
        margin: auto;
    }

    .bi-list.toggle-sidebar-btn.color_white {
        width: 60px;
    }

    @media only screen and (max-width: 768px) {
        .header {
            padding-left: 0px;
        }
        .bi-list.toggle-sidebar-btn.color_white {
        width: 40px !important;
        font-size: 20px;
    }
        .mob-disnone {
            display: none !important;
        }  .mob-disnone {
            display: none !important;
        }

        .mob-disblock {
            display: block !important;
        }

        .mob-disblock i {
            font-size: 20px;
            margin-right: 10px;
        }

        .bi-list.toggle-sidebar-btn.color_white {
            width: 60px;
        }

        .sidebar {
            left: 0 !important;
            width: 50% !important;
            height: 100vh !important;
        }

        body aside {
            display: none;
        }

        /* body.toggle-sidebar aside {
            display: block !important;
        } */

        .second-nav .second-nav-ul {
            display: flex;
            align-items: center;
            overflow-x: scroll;

        }

        ::-webkit-scrollbar {
            width: 5px;
        }
    }
    </style>
    @if (request()->is('/'))
        <style>
            #main {
                margin-left: 160px;
            }
        </style>
    @endif
    {{-- <script src="/assets/js/o2o-voice.js"></script> --}}
    <script src="/assets/js/m2m-live-ui.js"></script>
    {{-- <script src="/assets/js/m2m-live.js"></script> --}}
</head>

<body class="@if (!Request::is('/')) toggle-sidebar @endif">
<!-- ======= Header ======= -->
@include('layouts.header')
<!-- ======= Sidebar ======= -->
@include('layouts.sidebar')
<!-- End Header -->
<!-- ----second nav -->
@if (request()->routeIs('watch-stream'))
    <div>
        @inertia
    </div>
@else
    <main id="main" class="main">
        @inertia
    </main><!-- End #main -->
@endif



<!-- -----chips----- -->

<!-- ======= Footer ======= -->
<!-- End Footer -->

<footer class="site-footer section main"
        style="bottom: 0;
                    position:  relative; margin-left: 0; z-index: 10; width: 100%; ">
    <div class="p-20">
        <div class="row">
            <div class="col-xs-4 col-md-2">
                <h6>LEGAL AND SAFETY</h6>
                <hr/>
                <ul class="footer-links">
                    <li>
                        <a href="{{ url('about-us') }}">
                            About Us
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ url('privacy-policy') }}">
                            Privacy Policy
                        </a>
                    </li>
                    <hr/>
                    <li>
                        <a href="{{ url('terms-of-use') }}">
                            Terms of Use
                        </a>
                    </li>
                    <!-- <hr /> -->
                    <!-- <li>
                        <a href="{{ url('dmca-policy') }}">
                            DMCA Policy
                        </a>
                    </li> -->
                    <hr/>
                    <li>
                        <a href="{{ url('cookies-policy') }}">
                            Cookies Policy
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2">
                <h6>WORK WITH US</h6>
                <hr/>
                <ul class="footer-links">
                    <li>
                        <!-- href="{{ url('become-a-model') }}" -->
                        <a href="#">
                            Become a Model
                        </a>
                    </li>
                    <hr/>
                    <li>
                        <a href="">
                            Studio Signup
                        </a>
                    </li>
                    <hr/>
                    <li>
                        <a href="">
                            Affiliate Program
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2">
                <h6>HELP & SUPPORT</h6>
                <hr/>
                <ul class="footer-links">
                    <li>
                        <a href="{{ url('contact-us') }}">
                            Contact & Support
                        </a>
                    </li>
                    <hr/>
                    <li>
                        <a href="{{ url('refund-policy') }}">
                            Payment & Refund Policy
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr/>
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
        <div class="d-flex justify-content-center">
            <h5>Powered By - Ashu Live Agency</h5>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>


{{-- <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script> --}}
{{-- <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script> --}}
{{-- <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('js/firebase.js') }}"></script> --}}

{{-- @if (!request()->routeIs('watch-stream')) --}}
<script src="{{ asset('assets/js/main.js') }}"></script>
{{-- <script src="{{ asset('js/main.js') }}"></script> --}}
{{-- @endif --}}
@yield('js')
</body>

</html>
