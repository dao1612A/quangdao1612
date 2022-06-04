@extends('layouts.app_default')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            @if (isset($menu))
                                <li class="breadcrumb-item active" aria-current="page">{{ $menu->m_name }}</li>
                            @elseif (Request::get('k'))
                                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            @endif
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">
                        @if (isset($menu))
                            Danh mục
                        @elseif (Request::get('k'))
                            Tìm kiếm
                        @else
                            Danh sách bài viết
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="transform: none; min-height: 335px;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-lg-8 col-md-12">
                    <div class="row blog-grid-row">
                        @foreach($articles ?? [] as $item)
                            <div class="col-md-6 col-sm-12">
                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}"><img class="img-fluid" src="{{ pare_url_file($item->a_avatar) }}" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href=""><img src="{{ pare_url_file($item->a_avatar) }}" alt="Post Author"> <span>Admin</span></a>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock"></i> {{ $item->created_at->format('d-m-Y') }}</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}">{{ $item->a_name }}</a></h3>
                                    <p class="mb-0">{{ $item->a_description }}</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Blog Sidebar -->
                <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <!-- Search -->
                    <!-- /Search -->
                    <!-- Latest Posts -->
                    <!-- /Latest Posts -->
                    <!-- Categories -->
                    <!-- /Categories -->
                    <!-- Tags -->
                    <!-- /Tags -->
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 973px;">
                        <div class="card search-widget">
                            <div class="card-body">
                                <form class="search-form" action="{{ route('get.article.search') }}">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search..." name="k" value="{{ Request::get('k') }}" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card post-widget">
                            <div class="card-header">
                                <h4 class="card-title">Bài viết mới</h4>
                            </div>
                            <div class="card-body">
                                <ul class="latest-posts">
                                    @foreach($articles ?? [] as $item)
                                        <li>
                                            <div class="post-thumb">
                                                <a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}">
                                                    <img class="img-fluid" src="{{ pare_url_file($item->a_avatar) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}">{{ $item->a_name }}</a>
                                                </h4>
                                                <p>{{ $item->created_at }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card category-widget">
                            <div class="card-header">
                                <h4 class="card-title">Menu bài viết</h4>
                            </div>
                            <div class="card-body">
                                <ul class="categories">
                                    @foreach($menus ?? [] as $item)
                                        <li><a href="{{ route('get.menu',['slug' => \Illuminate\Support\Str::slug($item->m_slug),'id' => $item->id]) }}">{{ $item->m_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 390px; height: 3024px;"></div>
                            </div>
                            <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Sidebar -->
            </div>
        </div>
    </div>
@stop
