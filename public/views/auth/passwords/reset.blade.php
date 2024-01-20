<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BookClub - Register</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('./assets/images/favicon.ico')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/bootstrap.min.css') }}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/cryptocurrency-icons.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/plugins/plugins.css') }}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/helper.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{ asset('./assets/css/style-primary.css') }}">

</head>

<body class="skin-dark">

    <div class="main-wrapper">

        <!-- Content Body Start -->
        <div class="content-body m-0 p-0">

            <div class="login-register-wrap">
                <div class="row">

                    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                        <div class="login-register-form-wrap">

                            <div class="content">
                                <h1>Sign in</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>

                            <div class="login-register-form">
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="row">
                                        <div class="col-12 mb-20">
                                            <input class="form-control" type="text" name="email" id="email" placeholder="Email FPT" value={{$email}} readonly>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <input class="form-control" type="password" name="password-confirm" id="password-confirm" placeholder="Confirm Password">
                                        </div>
                                        <div class="col-12 mt-10">
                                            <button type="submit" class="button button-primary button-outline">Reset Password</button>
                                        </div>
                                    </div>
                                </form>                                
                            </div>
                        </div>
                    </div>

                    <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                        <div class="content">
                            <h1>Sign in</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- Content Body End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="{{ asset('./assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('./assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('./assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('./assets/js/vendor/bootstrap.min.js') }}"></script>
    <!--Plugins JS-->
    <script src="{{ asset('./assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/tippy4.min.js') }}"></script>
    <!--Main JS-->
    <script src="{{ asset('./assets/js/main.js') }}"></script>

</body>

</html>