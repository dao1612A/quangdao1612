@extends('layouts.app_default')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile bác sỹ</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{ $doctor->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="min-height: 335px;">
        <div class="container">
            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ pare_url_file($doctor->avatar) }}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">Dr. {{ $doctor->name }}</h4>
                                <p class="doc-speciality">BDS, MDS - Oral &amp; Maxillofacial Surgery</p>
                                <p class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</p>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> <a href="javascript:void(0);">{{ $doctor->address }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li><i class="far fa-comment"></i> 35 Feedback</li>
                                    <li><i class="fas fa-map-marker-alt"></i> Việt Nam</li>
                                </ul>
                            </div>
                            <div class="doctor-action">
                                <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                                    <i class="fas fa-video"></i>
                                </a>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ route('get.doctor.book', ['slug' => \Illuminate\Support\Str::slug($doctor->name),'id' => $doctor->id]) }}">Đặt lịch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->
            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">
                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Tông quan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-toggle="tab">Đánh giá</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->
                    <!-- Tab Content -->
                    <div class="tab-content pt-0">
                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">
                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">Giới thiệu</h4>
                                        {!! $doctor->about !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->
                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">
                                    @foreach($votes ?? [] as $item)
                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{ pare_url_file($item->avatar ?? '') }}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">{{ $item->user->name ?? "[N\A]" }}</span>
                                                    <span class="comment-date">{{ $item->created_at }}</span>
                                                    <div class="review-count rating">
                                                        @for ($i = 1 ; $i <= 5 ; $i ++)
                                                        <i class="fas fa-star {{ $i <= $item->v_number ? 'filled' : '' }}"></i>
                                                        @endfor
{{--                                                        <i class="fas fa-star filled"></i>--}}
{{--                                                        <i class="fas fa-star filled"></i>--}}
{{--                                                        <i class="fas fa-star filled"></i>--}}
{{--                                                        <i class="fas fa-star"></i>--}}
                                                    </div>
                                                </div>
                                                <p class="comment-content">{!! $item->v_content !!}</p>
{{--                                                <div class="comment-reply">--}}
{{--                                                    <p class="recommend-btn">--}}
{{--                                                        <span>Recommend?</span>--}}
{{--                                                        <a href="#" class="like-btn">--}}
{{--                                                            <i class="far fa-thumbs-up"></i> Yes--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#" class="dislike-btn">--}}
{{--                                                            <i class="far fa-thumbs-down"></i> No--}}
{{--                                                        </a>--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <!-- /Comment List -->
                                </ul>
                                <!-- Show All -->
                                <div class="all-feedback text-center">
                                    <a href="#" class="btn btn-primary btn-sm">
                                        Xem tất cả <strong>({{ $totalVote ?? 0 }})</strong>
                                    </a>
                                </div>
                                <!-- /Show All -->
                            </div>
                            <!-- /Review Listing -->
                            <!-- Write Review -->
                            <div class="write-review">
                                <h4>Viết đánh giá cho BS. <strong>{{ $doctor->name }}</strong></h4>
                                <!-- Write Review Form -->
                                <form action="{{ route('get_user.vote', $doctor->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Review</label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="v_number" value="5">
                                            <label for="star-5" title="5 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-4" type="radio" name="v_number" value="4">
                                            <label for="star-4" title="4 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-3" type="radio" name="v_number" value="3">
                                            <label for="star-3" title="3 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-2" type="radio" name="v_number" value="2">
                                            <label for="star-2" title="2 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-1" type="radio" name="v_number" value="1">
                                            <label for="star-1" title="1 star">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung đánh giá</label>
                                        <textarea id="review_desc" name="v_content" required maxlength="100" class="form-control"></textarea>
                                        <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> ký tự</small></div>
                                    </div>
                                    <hr>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Gủi đánh giá</button>
                                    </div>
                                </form>
                                <!-- /Write Review Form -->
                            </div>
                            <!-- /Write Review -->
                        </div>
                        <!-- /Reviews Content -->
                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->
        </div>
    </div>
@stop
