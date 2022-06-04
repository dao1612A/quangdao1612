<div class="list d-flex d-flex-direction">
    @foreach($articles as $article)
        <div class="list_item">
            <a href="{{ route('get.blog.render_view', $article->a_slug) }}" class="list_item--avatar">
                @php
                    $image = asset(pare_url_file($article->a_avatar))
                @endphp
                <img src="{{ asset('images/default.png') }}"
                     data-src="{{ $image }}" class="lazy"
                     alt="{{ $article->a_name }}">
            </a>
            
            <div>
                @if (isset($article->menu->mn_name))
                    <a href="{{ route('get.blog.render_view', $article->menu->mn_slug) }}" class="list_item--menu"
                       title="{{ $article->menu->mn_name }}">
                        {{ $article->menu->mn_name }}
                    </a>
                @endif
                <h3>
                    <a href="{{ route('get.blog.render_view', $article->a_slug) }}" title="{{ $article->a_name }}"><strong>{{ $article->a_name }}</strong></a>
                </h3>
                <h5>{{ $article->a_description }}</h5>
            </div>
        </div>
    @endforeach
</div>