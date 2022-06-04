@extends('layouts.app_blog')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-md-9 col-xs-12">
                                <h1><strong>{{ $tag->t_name }}</strong></h1>
                                <p class="subtitle text-muted">{{ $tag->t_description_seo }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">

            <div class="row">
                <!-- Content-->
                <div class="col-xl-8">
                    @include('components._inc_article',['articles' => $articles])
                </div>
                <!-- Content end-->

                <!-- Sidebar-->
                <div class="col-xl-4">
                    @include('components.sidebar')
                </div>
                <!-- Sidebar end-->
            </div>

        </div>
        <!-- end container -->
    </section>
    <section class="breadcrumb">
        <ul>
            <li><a href="/" title="Trang chủ" class="item">Trang chủ</a></li>
            <li>
                <span>{{  $tag->t_name }}</span>
            </li>
        </ul>
    </section>
@stop