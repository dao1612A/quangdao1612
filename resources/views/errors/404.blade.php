@extends('layouts.app_default')
@section('title', 'Trang chủ | conha.vn')
@section('css')
    <style>
        .sg ins {
            margin: auto;
        }
        <?php $style = file_get_contents('assets/css/home.min.css');echo $style;?>
    </style>
@stop

@section('not_container')
    @include('components.header.header', [
        'container' => 'container'
    ])
@stop

@section('content-fluid')
    <section class="project" style="min-height: 60vh">
        <div class="container project-content">
            <h2 class="section-title text-center">Đường dẫn không tồn tại</h2>
            <a style="text-align: center;display: block" href="/" title="Trở về trang chủ" rel="nofollow">Trở về trang chủ</a>
        </div>
    </section>
@stop

@section('not_container_bottom')
    @include('components.footer.footer', [
        'container' => 'container'
    ])
@stop

@section('script')
    <script type="text/javascript">
        <?php $style = file_get_contents('assets/js/home.js');echo $style;?>
    </script>
@stop
