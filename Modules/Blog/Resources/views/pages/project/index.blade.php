@extends('blog::layouts.app_blog')
@section('content')
	<section class="projects">
		<div class="container">
			<div class="row">
				<!-- Content-->
				@foreach($products as $product)
					<div class="col-md-4">
						<div class="item">
							<a href="{{ route('get_product.render', ['slug' => $product->pro_slug . '-pro']) }}" title="{{ $product->pro_name }}"
							   class="item_avatar">
								<img data-src="{{ pare_url_file($product->pro_avatar) }}"
									 src="{{ asset('images/default.png') }}"
									 alt="{{ $product->pro_name }}"
									 class="img-fluid rounded lazy">
							</a>
							<h4 class="item_title">
								<a href="{{ route('get_product.render', ['slug' => $product->pro_slug . '-pro']) }}"
								   title="{{ $product->pro_name }}">{{ $product->pro_name }}</a>
							</h4>
							<p class="item_dash">
								<span>
									<img src="{{ asset('images/default.png') }}" class="lazy"
										 data-src="{{ asset('images/icon/eye.svg') }}" alt="">
									{{ $product->pro_view }}</span>
								<span>
									<img src="{{ asset('images/default.png') }}" class="lazy"
										 data-src="{{ asset('images/icon/download.svg') }}" alt="">
									{{ $product->pro_pay + 13 + $product->id }}</span>
							</p>
							<div class="item_auth">
								<img class="item_auth-avatar lazy" data-src="{{ asset('images/default.png') }}"
									 src="{{ asset('images/default.png') }}"
									 alt="{{ $product->admin->name ?? "[N\A]" }}">
								<p class="item_auth-info">
									<a href=""
									   rel="nofollow" title="{{ $product->admin->name ?? "[N\A]" }}">
										<b>{{ $product->admin->name ?? "[N\A]" }}</b>
									</a>
									<span>Nhân viên IT</span>
								</p>
								@if ($product->pro_document_id)
									<span class="item_document">Free báo cáo</span>
								@endif
							</div>
							<a href="https://www.facebook.com/TrungPhuNA" target="_blank" rel="nofollow" title="Liên hệ mua đồ án"
							   class="item_price">Liên hệ</a>
                            {{-- <p class="item_price">{{ number_format($product->pro_price,0,',','.') }} đ</p> --}}
{{--							@if (isset($product->keywords))--}}
{{--								<div class="item_tags">--}}
{{--									@foreach($product->keywords as $keyword)--}}
{{--										<a href="{{ route('get_product.render', $keyword->k_slug) }}"--}}
{{--										   title="{{ $keyword->k_name }}" rel="nofollow"></i>--}}
{{--											<img src="{{ asset('images/default.png') }}" class="lazy"--}}
{{--												 data-src="{{ asset('images/icon/tag.svg') }}" alt="">--}}
{{--											{{ $keyword->k_name }}--}}
{{--										</a>--}}
{{--									@endforeach--}}
{{--								</div>--}}
{{--							@endif--}}
						</div>
					</div>
				@endforeach
				<!-- Content end-->
			</div>

			<div class="row">
				<div class="box-messages">
					<p>Tổng hợp tất cả các <b>đồ án công nghệ thông tin</b> đã làm sẵn theo yêu cầu của các khóa trước. Các tính năng và yêu cầu của các giáo viên
					cũng đã được tổng hợp và đưa vào mỗi đồ án sao cho phù hợp. Các đồ án có một số tính năng khác nhau tuỳ thuộc vào độ dễ, khó của đồ án</p>
					<p>Các <b>đồ án</b> được code bằng ngôn ngữ php, có <b>đồ án php thuần</b>, có đồ án được code bằng laravel</p>
					<p>=>  Liên hệ với mình để được tư vấn <b>đồ án tốt nghiệp CNTT</b> <a rel="nofollow" target="_blank"
																						   href="https://www.facebook.com/TrungPhuNA">
							[Link facebook admin]</a></p>
				</div>
			</div>

		</div>
		<!-- end container -->
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-title">
						<div class="row">
							<div class="col-xs-12">
								<h1><strong>{{ $pageContent->title_seo }}</strong></h1>
								<p class="subtitle text-muted">{{ $pageContent->description_seo }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop