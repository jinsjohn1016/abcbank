<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('assets/jsgrid/jsgrid-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/jsgrid/jsgrid.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    </head>
    <body>
        <div>
            <h3 class="mt-5 text-center text-primary">ABC Bank</h3>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login to your account</h3>
                    <div class="card-body">
                        <!-- form start -->
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Email address</label>
                                <input type="text" placeholder="Enter email" id="email_address" class="form-control"
                                value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>> Remember me
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('approve'))
                                <span class="text-danger">{{ $errors->first('approve') }}</span>
                            @endif
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <p> Don't have an account Yet? <a href="{{ route('register') }}">Sign Up</a>
        </div>
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.superslides.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-select.js')}}"></script>
        <script src="{{asset('assets/js/inewsticker.js')}}"></script>
        <script src="{{asset('assets/js/bootsnav.js.')}}"></script>
        <script src="{{asset('assets/js/images-loded.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.jsv')}}"></script>
        <script src="{{asset('assets/js/baguetteBox.min.js')}}"></script>
        <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
        <script src="{{asset('assets/js/contact-form-script.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
    </body>
</html>