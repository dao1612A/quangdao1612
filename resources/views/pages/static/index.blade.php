@extends('layouts.app_default')
@section('css')
    <style>
        .sg ins {
            margin: auto;
        }
        <?php $style = file_get_contents('assets/css/detail.min.css');echo $style;?>
    </style>
@stop

@section('not_container')
    @include('components.header.header', [
        'container' => 'container'
    ])
    <section class="breadcrumb">
        <div class="container breadcrumb-content">
            <ul>
                <li><a href="/" title="limousinevipcactinh">limousinevipcactinh.com <i class="fa fa-angle-right"></i></a></li>
                <li><span></span></li>
            </ul>
        </div>
    </section>
@stop
@section('content')
    <div class="content-detail mt5">
        <div class="content-detail__detail">
            <div class="header">
                <h1>{{ $pageContent->name ?? "[N\A]" }}</h1>
                <p>{{ $pageContent->description ?? "[N\A]" }}</p>
            </div>
            <div class="text-item description">
                @if(isset($configuration->map))
                <div>{!! $configuration->map !!}</div>
                @endif
                <div>
                    {!! $pageContent->content ?? "[N\A]"!!}
                </div>
            </div>
            <div class="action-bottom">
                <div class="right-action">
                    <p>Chia sẻ: </p>
                    <a href=""><img src="{{ asset('images/icon/circle-facebook.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('images/icon/circle-messenger.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('images/icon/circle-zalo.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('images/icon/circle-copylink.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="content-detail__contact">
            <div class="box-fix">
                <div class="card">
                    <div class="links">
                        <h5>Tuyến đường</h5>
                        <ul>
                            @foreach($routes ?? [] as $item)
                                <li>
                                    <a href="{{ route('get.route.detail',['slug' => $item->slug,'id' => $item->id]) }}" title="{{ $item->name }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card mt20">
                    <div class="links">
                        <h5>Các nhà xe nổi tiếng</h5>
                        <ul>
                            @foreach($guests ?? [] as $item)
                                <li>
                                    <a href="{{ route('get.garage.detail',['slug' => $item->slug,'id' => $item->id]) }}" title="{{ $item->name }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('not_container_bottom')
    @include('components.footer.footer', [
        'container' => 'container'
    ])
@stop

@section('script')
    <script type="text/javascript">
        <?php $style = file_get_contents('assets/js/detail.js');echo $style;?>
    </script>
@stop
