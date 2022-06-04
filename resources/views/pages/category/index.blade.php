@extends('layouts.app_default')
@section('css')
    <?php $style = file_get_contents('assets/css/home.min.css');echo $style;?>
@stop

@section('not_container')
    @include('components.header.header', [
        'container' => 'container'
    ])
    <section class="breadcrumb">
        <div class="container breadcrumb-content">
            <ul>
                <li><a href="/" title="Trang chủ">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                <li><span>{{ $category->c_name }}</span></li>
            </ul>
        </div>
    </section>
@stop
@section('content-fluid')
    <div class="container main-document">
        @if(detectDevice() !== 'mobile')
            @include('pages.document.include._inc_document_sidebar')
        @endif
        <div class="col-content">
            <div class="lists-data">
                <div class="header">
                    <h1><i class="fa fa-folder"></i> {{ $category->c_name }}</h1>
                </div>
                <div class="content">
                    <div class="lists">
                        @forelse($products ?? [] as $item)
                            @include('components.product._inc_item_product',['product' => $item])
                        @empty

                        @endforelse
                            {{ $products->links('vendor/pagination/default') }}
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
        <?php $style = file_get_contents('assets/js/home.js');echo $style;?>
    </script>
@stop
