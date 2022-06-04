<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="32x32" />
    {!! SEO::generate() !!}
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGES = "{{ session('toastr.type') }}"
            var MESSAGE = "{{ session('toastr.message') }}"
        </script>
    @endif
    @yield('css')
</head>
<body>
@include('components.header.header', [
        'container' => 'container'
    ])


@yield('breadcrumb')
<div class="container container-full-sm {{--{{ !isset($not_mh) ? 'container-mh' : '' }}--}}">
    @yield('content')
</div>
@yield('content-fluid')

@yield('not_container_bottom')
@include('components.footer.footer', [
        'container' => 'container'
    ])
@include('components.footer.footer_mobile')
<script src="{{ asset('assets/js/app_user.js') }}"></script>
@yield('script')
</body>
</html>
