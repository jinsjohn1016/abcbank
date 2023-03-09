<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
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
                    <h3 class="card-header text-center">Create new account</h3>
                    <div class="card-body">
                        <!-- form start -->
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" placeholder="Enter name" id="name" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Email address</label>
                                <input type="text" placeholder="Enter email" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control"name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="agree" required>  Agree the </label><a data-toggle="modal" data-target="#myModal" href="">Terms and policy</a>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <p> Already have an accout? <a href="{{ route('login') }}">Sign in</a>
        </div>
        <!-- MODAL -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <h5>Information You Provide to Us</h5>
                        <p>Any information that you voluntarily provide to us, including your name and email address, will be used for the sole purpose for which the information was provided to us. In addition, communication exchanges on this website are public (not private) communications. Therefore, any message that you post on this website will be considered and treated as available for public use and distribution.</p>
                        <h5>Information We Collect from Third Parties</h5>
                        <p>This website does not collect any information on you from other sources.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
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