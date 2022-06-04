<!DOCTYPE html>
<html lang="vi">
<head>
    <title>@yield('title','Conha.vn')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32" />
    @yield('css')
</head>
<body>
@include('components.header.header', [
        'container' => 'container'
    ])


@yield('breadcrumb')
<div class="container {{--{{ !isset($not_mh) ? 'container-mh' : '' }}--}}">
    @yield('content')
</div>
@yield('content-fluid')

@yield('not_container_bottom')
@include('components.footer.footer', [
        'container' => 'container'
    ])
@include('components.footer.footer_mobile')
@yield('script')
</body>
</html>
