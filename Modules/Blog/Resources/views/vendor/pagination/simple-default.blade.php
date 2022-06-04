@if ($paginator->hasPages())
    <nav class="simple-paginate">
        <ul class="pagination" style="list-style-type: none !important;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>Trang trước</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Trang trước</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Trang sau</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>Trang sau</span></li>
            @endif
        </ul>
    </nav>
@endif
