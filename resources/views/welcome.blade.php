<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else

                <a href="{{ route('admin.login') }}">Admin Login</a>


                <a href="javascript:" data-toggle="modal" data-target="#loginModal">Login</a>

                @if (Route::has('register'))
                    <a href="javascript:" data-toggle="modal" data-target="#registerModal">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">

    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="email"
                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-login">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="regemail" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="regpassword" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="regpasswordconfirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-register">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{--https://santrikoding.com/login-register-ajax-laravel-proses-register--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>


<script>
    $(document).ready(function () {

        $(".btn-login").click(function () {

            var email = $("#email").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if (email.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'The email field is required.'
                });

            } else if (password.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'The password field is required.'
                });

            } else {

                $.ajax({

                    url: "{{ route('login.check_login') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "email": email,
                        "password": password,
                        "_token": token
                    },

                    success: function (response) {

                        if (response.success) {

                            Swal.fire({
                                type: 'success',
                                title: 'Login Successful',
                                text: 'Success',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                                .then(function () {
                                    window.location.href = "{{ route('home') }}";
                                });

                        } else {

                            console.log(response.success);

                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'These credentials do not match our records.'
                            });

                        }

                        console.log(response);

                    },

                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'These credentials do not match our records.'
                        });

                        console.log(response);

                    }

                });

            }

        });

        $(".btn-register").click(function () {

            var name = $("#name").val();
            var regemail = $("#regemail").val();
            var regpassword = $("#regpassword").val();
            var regpasswordconfirm = $("#regpasswordconfirm").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if (name.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'The name field is required.'
                });

            } else if (regemail.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'The email field is required.'
                });

            } else if (regpassword.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'The password field is required.'
                });

            } else if (regpassword != regpasswordconfirm) {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'The password and confirm password fields must be same.'
                });

            } else {

                $.ajax({

                    url: "{{ route('register.store') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "name": name,
                        "email": regemail,
                        "password": regpassword,
                        "_token": token
                    },

                    success: function (response) {

                        if (response.success) {

                            Swal.fire({
                                type: 'success',
                                title: 'Register Successful',
                                text: 'Success',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                                .then(function () {
                                    window.location.href = "{{ route('home') }}";
                                });

                        } else {

                            console.log(response.success);

                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong.'
                            });

                        }

                        console.log(response);

                    },

                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong.'
                        });

                        console.log(response);

                    }

                });

            }

        });
    });
</script>

</body>
</html>
