<!DOCTYPE html>
<html lang="en">

    <!-- index.html  10:02:19 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        {!! SEO::generate() !!}
        <meta property="og:type" content="article"/>
        <meta property="fb:app_id" content="211916683854484"/>
        <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32"/>
        @if(session('toastr'))
            <script>
                var TYPE_MESSAGES = "{{ session('toastr.type') }}"
                var MESSAGE = "{{ session('toastr.message') }}"
            </script>
        @endif

        <!-- Favicons -->
        <link type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" rel="icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @toastr_css
    </head>
    <body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Header -->
            @include('components.header.header')
            <!-- /Header -->
            @yield('content')
            <!-- Footer -->
                @include('components.footer.footer')
            <!-- /Footer -->

        </div>
        <!-- /Main Wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- Slick JS -->
        <script src="{{ asset('assets/js/slick.js') }}"></script>

        <!-- Custom JS -->
        <script src="{{ asset('assets/js/script.js') }}"></script>
{{--        @jquery--}}
        @toastr_js
        @toastr_render
        <script>
            $( function (){
                $(".js-time").click(function (event){
                    event.preventDefault()
                    $(".js-time").removeClass('selected');
                    let $key = $(this).attr('data-key')
                    let $time_text = $(this).attr('data-text')
                    $("#time").val($key);
                    $("#time_text").val($time_text);
                    $(this).addClass('selected');
                })
            })
        </script>
    </body>
</html>
