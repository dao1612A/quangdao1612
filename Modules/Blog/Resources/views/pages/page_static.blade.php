@extends('blog::layouts.app_blog')
@section('content')
    <section class="pb-5">
        <div class="container">
			<div class="row">
                <!-- Content-->
                <div class="col-xl-8">
                    <!-- Post-->
                    <article class="post">
                        <div class="post-header">
							<h1 class="post-title" style="margin-top: 10px"><strong>{{ $page->name }}</strong></h1>
                            <ul class="post-meta">
                                <li>
                                    <img src="{{ asset('images/icon/icon-time-25.png') }}" alt="">
                                    {{ $page->updated_at }}
                                </li>
                            </ul>
                        </div>
                        <div class="post-preview">
                            <div class="quote-post">
                                <blockquote class="blockquote text-center">
                                    {{ $page->description }}
                                </blockquote>
                            </div>
                        </div>
                        <div class="blog-detail-description">
                            {!! $page->content !!}
                        </div>
                    </article>
                    <!-- Post end-->
                </div>
                <!-- Content end-->
                <!-- Sidebar-->
                <div class="col-xl-4">
                    @include('blog::components.sidebar')
                </div>
                <!-- Sidebar end-->
            </div>
        </div>
        <!-- end container -->
    </section>
@stop