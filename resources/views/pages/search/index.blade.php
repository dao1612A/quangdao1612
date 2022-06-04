@extends('layouts.app_default')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Có x kết quả tìm kiếm</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="transform: none; min-height: 335px;">
        <div class="container-fluid" style="transform: none;">

            <div class="row" style="transform: none;">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar"
                     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                    <!-- Search Filter -->

                    <!-- /Search Filter -->

                    <div class="theiaStickySidebar"
                         style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 30px;">
                        <div class="card search-filter">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Search Filter</h4>
                            </div>
                            <div class="card-body">
                                <div class="filter-widget">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker"
                                               placeholder="Select Date">
                                    </div>
                                </div>
                                <div class="filter-widget">
                                    <h4>Gender</h4>
                                </div>
                                <div class="filter-widget">
                                    <h4> Danh mục</h4>
                                    <ul>
                                        @foreach($categoriesGlobal ?? [] as $item)
                                        <li><a href="{{ request()->fullUrlWithQuery(['c' => $item->id]) }} ">{{ $item->c_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="btn-search">
                                    <button type="button" class="btn btn-block">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                        <div class="resize-sensor"
                             style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div class="resize-sensor-expand"
                                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 390px; height: 1776px;"></div>
                            </div>
                            <div class="resize-sensor-shrink"
                                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-8 col-xl-9">
                    @foreach($doctors ?? [] as $item)
                    <!-- Doctor Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{ route('get.doctor.detail',['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}">
                                                <img src="{{ pare_url_file($item->avatar) }}" class="img-fluid"
                                                     alt="User Image">
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="{{ route('get.doctor.detail',['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}">{{ $item->name }}</a></h4>
                                            <p class="doc-speciality">
                                                <a href="">{{ $item->category->c_name ?? "[N\A]" }}</a>
                                            </p>

                                            @php
                                                $age = render_vote($item);
                                            @endphp
                                            <div class="rating">
                                                @for($i = 1 ; $i <= 5; $i ++)
                                                    <i class="fas fa-star {{  $i <= $age ? 'filled' : '' }}"></i>
                                                @endfor
                                                <span class="d-inline-block average-rating">({{ $item->vote_total }})</span>
                                            </div>
                                            <div class="clinic-details">
                                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $item->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        <div class="clini-infos">
                                            <ul>
                                                <li><i class="far fa-thumbs-up"></i> 98%</li>
                                                <li><i class="far fa-comment"></i> 17 Feedback</li>
                                            </ul>
                                        </div>
                                        <div class="clinic-booking">
                                            <a class="view-pro-btn" href="{{ route('get.doctor.detail',['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}">Xem profile</a>
                                            <a class="apt-btn" href="{{ route('get.doctor.book', ['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}">Đặt lịch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
                    @endforeach
{{--                    <div class="load-more text-center">--}}
{{--                        <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div>

    </div>
@stop
