@extends('layouts.app_default')
@section('content')
    <style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Blog List</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="transform: none; min-height: 161px;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-lg-8 col-md-12">
                    <!-- Blog Post -->
                    @include('blog::components._inc_blog_article_item')
                    <!-- /Blog Post -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-pagination">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="blog-list.html#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="blog-list.html#">1</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="blog-list.html#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="blog-list.html#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="blog-list.html#"><i class="fas fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /Blog Pagination -->
                </div>
                @include('blog::components._inc_blog_sidebar')
            </div>
        </div>
    </div>
@stop