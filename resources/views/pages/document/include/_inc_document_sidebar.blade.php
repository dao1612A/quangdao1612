<div class="col-sidebar">
    <div class="box">
        <h4>
            <span class="icon"><i class="fa fa-th"></i></span>
            <span class="text">Danh mục</span>
        </h4>
        <ul class="ul-categories">
            @foreach($categoriesGlobal ?? [] as $cateGlobal)
                <li>
                    <a href="{{ route('get_document.render', $cateGlobal->c_slug.'-c') }}"
                       title="{{ $cateGlobal->c_name }}">
                        <span class="text"><i class="fa fa-folder"></i>{{ $cateGlobal->c_name }}</span>
                        <span class="number"></span>
                    </a>
                    @if(isset($cateGlobal->child) && !$cateGlobal->child->isEmpty())
                        <div class="sub-menu">
                            @foreach($cateGlobal->child as $subCate)
                                <div class="sub-menu-item">
                                    <a href="{{ route('get_document.render', $subCate->c_slug.'-c') }}"
                                       title="{{ $subCate->c_name }}">{{ $subCate->c_name }}</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="line"></div>
        <h4>
            <span class="icon"><i class="fa fa-th"></i></span>
            <span class="text">Hỗ trợ hướng dẫn</span>
        </h4>
        <div class="supports">
            @foreach($phoneGlobal ?? [] as $item)
                <div class="item">
                    <img class="lazy loaded" src="https://tailieu247.net/images/icon/icon-call.png"
                         onerror="this.onerror=null;this.src='/images/preloader.png';"
                         data-src="https://tailieu247.net/images/icon/icon-call.png" alt="Hỗ Trợ Hướng Dẫn"
                         data-was-processed="true">
                    <div class="info">
                        <p><span>{{ $item->ps_name }} &nbsp;</span> <a href="tel:{{ $item->ps_phone }}" title="{{ $item->ps_name }}">
                                0{{ number_format($item->ps_phone,0,',','.') }} </a></p>
                        <p>{{ $item->ps_desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>