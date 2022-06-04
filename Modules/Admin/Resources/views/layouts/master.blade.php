<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />

    <!-- Title -->
    <title> Theme Admin </title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard.css') }}">
    <meta name="robots" content="NOINDEX, NOFOLLOW">
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGES = "{{ session('toastr.type') }}"
            var MESSAGE = "{{ session('toastr.message') }}"
        </script>
    @endif
    <script>
        var URL_UPLOAD = '{{ route('post_ajax_admin.uploads') }}'
    </script>
</head>
<body class="main-body app sidebar-mini">
<!-- Start Switcher -->
<div class="switcher-wrapper ">
    <div class="demo_changer">
        <div class="demo-icon bg_dark"><i class="fa fa-cog fa-spin  text_primary"></i></div>
        <div class="form_holder sidebar-right1">
            <div class="row">
                <div class="swichermainleft border-bottom  text-center">
                    <div class="p-3">
                        <a href="https://www.spruko.com/demo/valex/" class="btn btn-primary btn-block mt-0">View Demo</a>
                        <a href="empty#" class="btn btn-secondary btn-block">Buy Now</a>
                        <a href="https://themeforest.net/user/sprukosoft/portfolio" class="btn btn-success btn-block">Our Portfolio</a>
                    </div>
                </div>
                <div class="predefined_styles">
                    <div class="swichermainleft">
                        <h4>Navigation Style</h4>
                        <div class="pl-3 pr-3">
                            <a href="https://laravel.spruko.com/valex/horizontal-light-ltr/index" class="btn btn-danger btn-block mt-0">Horizontal</a>
                            <a href="index" class="btn btn-info btn-block">Left-menu</a>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Skin Modes</h4>
                        <div class="pl-0 pr-0">
                            <a class="wscolorcode blackborder nav-hor navstyle1" href="index">
                                Light-theme
                            </a>
                            <a class="wscolorcode blackborder nav-hor navstyle1" href="https://laravel.spruko.com/valex/leftmenu-dark-ltr/index">
                                Dark-theme
                            </a>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Skin Modes</h4>
                        <div class="switch_section">
                            <div class="switch-toggle d-flex">
                                <span class="mr-auto">Default Body</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch" id="myonoffswitch7" class="onoffswitch2-checkbox" checked>
                                    <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle d-flex">
                                <span class="mr-auto">Body Style1</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch" id="myonoffswitch6" class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Leftmenu Bg-Image</h4>
                        <div class="skin-body light-pattern">
                            <button type="button" id="leftmenuimage1" class="bg1 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage2" class="bg2 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage3" class="bg3 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage4" class="bg4 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage5" class="bg5 wscolorcode1 blackborder"></button>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>Leftmenu Styles</h4>
                        <div class="switch_section">
                            <div class="switch-toggle d-flex">
                                <span class="mr-auto">Leftmenu Color</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch10" class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle horizontal-Dark-switcher d-flex">
                                <span class="mr-auto">Leftmenu Dark</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch11" class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle horizontal-light-switcher d-flex">
                                <span class="mr-auto">Leftmenu Light</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch9" class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch9" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle d-flex">
                                <span class="mr-auto">Leftmenu Gradient Color</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch12" class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle d-flex">
                                <span class="mr-auto">Reset Leftmenu Styles</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch13" class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Switcher -->
<!-- Loader -->
<div id="global-loader">
    <img src="{{ asset('img/loader.svg') }}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
<!-- main-sidebar -->
@include('admin::components._inc_sidebar')
<!-- main-sidebar -->
<!-- main-content -->
<div class="main-content app-content">
    @include('admin::components._inc_header')
    <!-- container -->
        @yield('content')
    <!-- Container closed -->
</div>
<!-- main-content closed -->
@include('admin::components._inc_sidebar_right')

<!-- modal -->
@include('admin::components._inc_footer')
<!-- JQuery min js -->
<script src="{{ asset('assets/js/admin_dashboard.js') }}"></script>
@yield('script')
</body>
</html>
