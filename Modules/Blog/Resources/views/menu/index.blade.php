@extends('layouts.app_default')
@section('css')
    <style>
        .sg ins {
            margin: auto;
        }
        <?php $style = file_get_contents('assets/css/article.min.css');echo $style;?>
    </style>
@stop

@section('not_container')
    @include('components.header.header', [
        'container' => 'container'
    ])
    <section class="breadcrumb">
        <div class="container breadcrumb-content">
            <ul>
                <li><a href="/" title="limousinevipcactinh.com">limousinevipcactinh.com <i
                                class="fa fa-angle-right"></i></a></li>
                <li><a href="#" title="Bài viết"> Bài viết<i class="fa fa-angle-right"></i></a></li>
                @if(isset($menu))
                    <li><span>{{ $menu->m_name }}</span></li>
                @endif
            </ul>
        </div>
    </section>
@stop
@section('content')
    <div class="content-detail mt5">
        <div class="content-detail__detail">
            <div class="header">
                {{--                <h1>{{ $article->a_name }}</h1>--}}
                {{--                <p>{{ $article->a_description }}</p>--}}
            </div>
            <div class="articles">
                @foreach($articles as $item)
                    @if($detect == 'desktop')
                        <div class="item-desktop">
                            <h3 class="title"><a href="{{ route('get_blog.render', ['slug' => $item->a_slug.'-a']) }}"
                                                 title="{{ $item->a_name }}">{{ $item->a_name }}</a></h3>
                            <div class="item-content">
                                <h3 class="title"><a href="{{ route('get_blog.render', ['slug' => $item->a_slug.'-a']) }}"
                                                     title="{{ $item->a_name }}">{{ $item->a_name }}</a></h3>
                                <h4 class="desc"> {{ $item->a_description }}</h4>
                                <div class="time"><span>{{ $item->created_at->format('d-m-Y') }} - {{ $item->a_view }} lượt xem</span>
                                </div>
                            </div>
                            <a href="{{ route('get_blog.render', ['slug' => $item->a_slug.'-a']) }}" class="thumb"
                               title="{{ $item->a_name }}">
                                <img data-src="{{ pare_url_file($item->a_avatar) }}" class="lazy" alt="{{ $item->a_name }}" src="{{ asset('images/preloader.jpg') }}">
                            </a>
                        </div>
                    @else
                        <div class="item-mobile">
                            <h3 class="title"><a href="{{ route('get_blog.render', ['slug' => $item->a_slug.'-a']) }}"
                                                 title="{{ $item->a_name }}">{{ $item->a_name }}</a></h3>
                            <div class="content">
                                <a href="{{ route('get_blog.render', ['slug' => $item->a_slug.'-a']) }}" class="thumb"
                                   title="{{ $item->a_name }}">
                                    <img data-src="{{ pare_url_file($item->a_avatar) }}" class="lazy" alt="{{ $item->a_name }}" src="{{ asset('images/preloader.jpg') }}">
                                </a>
                                <div class="info">
                                    <h4 class="desc"> {{ $item->a_description }}</h4>
                                    <div class="time"><span>{{ $item->created_at->format('d-m-Y') }} - {{ $item->a_view }} lượt xem</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="content-detail__contact">
            <div class="box-fix">
                @if (isset($menu))
                    <div class="card ">
                        <div class="content-info">
                            <h1 class="title">{{ $menu->m_name }}</h1>
                            <h4 class="desc">{{ $menu->m_description }}</h4>
                        </div>
                    </div>
                @endif
                <div class="card mt20">
                    <div class="links">
                        <h5>Tuyến đường</h5>
                        <ul>
                            @foreach($routes ?? [] as $item)
                                <li>
                                    <a href="{{ route('get.route.detail',['slug' => $item->slug,'id' => $item->id]) }}"
                                       title="{{ $item->name }}">{{ $item->name }}</a>
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
                                    <a href="{{ route('get.garage.detail',['slug' => $item->slug,'id' => $item->id]) }}"
                                       title="{{ $item->name }}">{{ $item->name }}</a>
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
