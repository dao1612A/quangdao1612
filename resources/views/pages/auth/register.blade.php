@extends('layouts.app_default')
@section('content')
    <div class="content" style="background: white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('images/login-banner.png') }}" class="img-fluid" alt="Doccure Register">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Đăng ký tài khoản</h3>
                                </div>
                                <!-- Register Form -->
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="text" name="name" required class="form-control floating">
                                        <label class="focus-label">Name</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="email" name="email" required class="form-control floating">
                                        <label class="focus-label">Email</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="number" class="form-control floating" required name="phone">
                                        <label class="focus-label">Phone</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" name="password" required class="form-control floating">
                                        <label class="focus-label">Password</label>
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{ route('get.login') }}">Bạn đã có tài khoản?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Đăng ký</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
{{--                                    <div class="row form-row social-login">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </form>
                                <!-- /Register Form -->
                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->
                </div>
            </div>
        </div>
    </div>
@stop
