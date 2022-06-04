<div class="item">
    <div class="item-icon" data-type="New"></div>
    <div class="item-info">
        <h4><a title="{{ $item->pro_name }}" class="tooltip fade" data-title="{{ $item->pro_name }}"
               href="{{ route('get_document.render',['slug' => $item->pro_slug.'-pro']) }}">{{ $item->pro_name }}</a></h4>
        <ul class="item-nav">
            <li><a href="/" title="Giáo án 247">Trang chủ </a></li>
            @if (isset($item->category->c_name))
            <li><a  href="{{ route('get_document.render',['slug' => $item->category->c_slug.'-c']) }}"
                   title="{{ $item->category->c_name }}">{{ $item->category->c_name }}</a></li>
            @endif
            @if (isset($item->keywords) && !$item->keywords->isEmpty())
                @foreach($item->keywords as $keyword)
                    <li><a href="{{ route('get_document.render',['slug' => $keyword->k_slug.'-k']) }}"  title="{{ $keyword->k_name }}"><span>{{ $keyword->k_name }}</span></a></li>
                @endforeach
            @endif

        </ul>
    </div>
</div>