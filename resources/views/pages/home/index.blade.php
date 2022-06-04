@extends('layouts.app_default')
@section('content')
    <!-- Home Banner -->
    @include('pages.home.include._inc_banner')
    <!-- /Home Banner -->

    <!-- Clinic and Specialities -->
    @include('pages.home.include._inc_category')
    <!-- Clinic and Specialities -->

    <!-- Popular Section -->
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header ">
                        <h2>Đặt lịch cho bác sĩ của chúng tôi</h2>
                        <p>Chúng tôi với phương châm lịch sự, khách hàng là thượng đế</p>
                    </div>
                    <div class="about-content">
                        <p>Một thực tế đã có từ lâu là người đọc sẽ bị phân tâm bởi nội dung có thể đọc được của một
                            trang khi nhìn vào bố cục của nó</p>
                        <p>Các biên tập viên trang web hiện sử dụng Lorem Ipsum làm văn bản mô hình mặc định của họ, và
                            tìm kiếm 'lorem ipsum' sẽ phát hiện ra nhiều trang web vẫn còn sơ khai. Nhiều phiên bản khác
                            nhau đã phát triển trong nhiều năm, đôi khi</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider">
                        @foreach($doctors ?? [] as $item)
                        <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ route('get.doctor.detail',['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}">
                                        <img class="img-fluid" alt="User Image"  style="height: 200px;" src="{{ pare_url_file($item->avatar) }}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="{{ route('get.doctor.detail',['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}">{{ $item->name }}</a>
                                    </h3>
                                    <p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                    @php
                                        $age = render_vote($item);
                                    @endphp
                                    <div class="rating">
                                        @for($i = 1 ; $i <= 5; $i ++)
                                            <i class="fas fa-star {{  $i <= $age ? 'filled' : '' }}"></i>
                                        @endfor
                                        <span class="d-inline-block average-rating">({{ $item->vote_total }})</span>
                                    </div>
                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> Việt Nam
                                        </li>
                                        <li>
                                            <i class="far fa-clock"></i> {{ $item->address }}
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="{{ route('get.doctor.detail',['slug' => \Illuminate\Support\Str::slug($item->name),'id' => $item->id]) }}"
                                               class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Popular Section -->
    <!-- Popular Section -->
    <section class="section section-doctor">
        <div class="container-fluid">
            <!-- Section Header -->
            <div class="section-header text-center">
                <h2>Tin tức mới nhất</h2>
                <p class="sub-title">Tổng hợp tin tức mới nhất</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="doctor-slider slider">
                    @foreach($articles ?? [] as $item)
                        <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}">
                                        <img class="img-fluid" alt="User Image"  style="height: 130px;" src="{{ pare_url_file($item->a_avatar) }}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    @if (isset($item->menu))
                                    <a href="{{ route('get.menu',['slug' => \Illuminate\Support\Str::slug($item->menu->m_slug),'id' => $item->a_menu_id]) }}" style="color: #007bff; margin: 5px 0; display: block;">{{ $item->menu->m_name }}</a>
                                    @endif
                                    <h3 class="title">
                                        <a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}">{{ $item->a_name }}</a>
                                    </h3>
                                    <p class="speciality">{{ $item->a_description }}</p>
                                    <div class="row row-sm">
                                        <div class="col-12">
                                            <a href="{{ route('get.article.detail',['slug' => \Illuminate\Support\Str::slug($item->a_slug),'id' => $item->id]) }}"
                                               class="btn view-btn">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Popular Section -->

    <!-- Availabe Features -->
    <section class="section section-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 features-img">
                    <img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
                </div>
                <div class="col-md-7">
                    <div class="section-header">
                        <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. </p>
                    </div>
                    <div class="features-slider slider">
                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
                            <p>Patient Ward</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
                            <p>Test Room</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
                            <p>ICU</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
                            <p>Laboratory</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
                            <p>Operation</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
                            <p>Medical</p>
                        </div>
                        <!-- /Slider Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Availabe Features -->

    <!-- Blog Section -->
    <section class="section section-blogs">
        <div class="container-fluid">

            <!-- Section Header -->
            <div class="section-header text-center">
                <h2>Blogs and News</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- /Section Header -->

            <div class="row blog-grid-row">
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <!-- Blog Post -->
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-01.jpg"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                           alt="Post Author">
                                            <span>Dr. Ruby Perrin</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Doccure – Making your clinic painless
                                    visit?</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                </div>
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <!-- Blog Post -->
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-02.jpg"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-02.jpg"
                                                                           alt="Post Author">
                                            <span>Dr. Darren Elder</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">What are the benefits of Online Doctor
                                    Booking?</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                </div>
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <!-- Blog Post -->
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-03.jpg"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-03.jpg"
                                                                           alt="Post Author">
                                            <span>Dr. Deborah Angel</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Benefits of consulting with an Online
                                    Doctor</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                </div>
                <div class="col-md-6 col-lg-3 col-sm-12">

                    <!-- Blog Post -->
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-04.jpg"
                                                             alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-04.jpg"
                                                                           alt="Post Author">
                                            <span>Dr. Sofia Brient</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 2 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">5 Great reasons to use an Online
                                    Doctor</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod
                                tempor.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                </div>
            </div>
            <div class="view-all text-center">
                <a href="blog-list.html" class="btn btn-primary">View All</a>
            </div>
        </div>
    </section>
    <!-- /Blog Section -->
@stop
