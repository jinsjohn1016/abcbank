<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $menu }}</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('assets/jsgrid/jsgrid-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/jsgrid/jsgrid.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- Start Main Top -->
        <div class="main-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="text-slid-box">
                            <div id="offer-box" class="offer-box">
                                ABC Bank
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Top -->
        <!-- Start Header -->
        <header class="main-header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                        <a class="navbar-brand" href="index.html"><img src="" class="logo" alt=""></a>
                    </div>
                    <div class="collapse navbar-collapse navbar" id="navbar-menu">
                        <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                            <i class="fa fa-fw fa-home icon_padding {{ $menu == 'home' ? 'icon-color' : '' }}"></i>
                            <li class="nav-item {{ $menu == 'home' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <i class="fa fa-fw fa-cloud-upload icon_padding {{ $menu == 'deposit' ? 'icon-color' : '' }}"></i>
                            <li class="nav-item {{ $menu == 'deposit' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('deposit') }}">Deposit</a>
                            </li>
                            <i class="fa fa-fw fa-cloud-download icon_padding {{ $menu == 'withdraw' ? 'icon-color' : '' }}"></i>
                            <li class="nav-item {{ $menu == 'withdraw' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('withdraw') }}">Withdraw</a>
                            </li>
                            <i class="fa fa-fw fa-exchange icon_padding {{ $menu == 'transfer' ? 'icon-color' : '' }}"></i>
                            <li class="nav-item {{ $menu == 'transfer' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('transfer') }}">Transfer</a>
                            </li>
                            <i class="fa fa-fw fa-sticky-note-o icon_padding {{ $menu == 'statement' ? 'icon-color' : '' }}"></i>
                            <li class="nav-item {{ $menu == 'statement' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('statement') }}">Statement</a>
                            </li>
                            <i class="fa fa-fw fa-sign-out icon_padding"></i>
                            <li class="nav-item {{ $menu == 'login' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- End Header -->

        @yield('footer')

        <footer class="main-footer footer-copyright">
            <p class="footer-company">All Rights Reserved. &copy; 2023 <a href="#">ABC Banking</a></p>
        </footer>
        <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
        <!-- ALL JS FILES -->
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.superslides.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-select.js')}}"></script>
        <script src="{{asset('assets/js/inewsticker.js')}}"></script>
        <script src="{{asset('assets/js/images-loded.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.min.js')}}"></script>
        <script src="{{asset('assets/js/baguetteBox.min.js')}}"></script>
        <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
        <script src="{{asset('assets/js/contact-form-script.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
    </body>
</html>