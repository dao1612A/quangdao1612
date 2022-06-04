<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard.css') }}">
    <title> Login System </title>

</head>
<body class="main-body bg-primary-transparent">
<!-- Loader -->
<div id="global-loader">
    <img src="{{ asset('img/loader.svg') }}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{ asset('images/login.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                         alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex">
                                    <a href="/"><img src="{{ asset('img/brand/favicon.png') }}" class="sign-favicon ht-40"
                                                         alt="logo"></a>
                                    <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Đăng nhập hệ thống</span></h1>
                                </div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>Welcome back!</h2>
                                        <h5 class="font-weight-semibold mb-4">Xin vui lòng đăng nhập.</h5>
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" placeholder="Enter your email" value="{{ old('email') }}" type="email" name="email">
                                                @if($errors->first('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="******" type="password" name="password">
                                                @if($errors->first('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <button class="btn btn-main-primary btn-block">Sign In</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <!-- End -->
    </div>
</div>
<!-- Back-to-top -->
<a href="signin#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<script src="{{ asset('assets/js/admin_dashboard.js') }}"></script>
</body>
</html>
