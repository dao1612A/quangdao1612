<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="/">
            <img src="{{ pare_url_file($configuration->logo ?? '/img/brand/logo.png') }}" class="main-logo" alt="logo">
        </a>
        <a class="desktop-logo logo-dark active" href="/"><img src="{{ asset('img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="/"><img src="{{ asset('img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="/"><img src="{{ asset('img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <ul class="side-menu">
            @foreach(config('setting_admin.sidebar') as $menus)
                <li class="slide">
                    <a class="side-menu__item" {{ isset($menus['sub']) ? 'data-toggle=slide' : '' }}
                       href="{{  isset($menus['sub']) ? '#' : route($menus['route']) }}" title="{{ $menus['name'] }}">
                        <span class="side-menu__label"><i class="{{ $menus['class-icon'] }}"></i> {{ $menus['name'] }}</span>
                        @if(isset($menus['sub']))
                            <i class="fa fa-chevron-down"></i>
                        @endif
                    </a>
                    @if(isset($menus['sub']))
                        <ul class="slide-menu">
                            @foreach($menus['sub'] as $menu)
                                <li><a class="slide-item" href="{{ route($menu['route']) }}" title="{{ $menu['name'] }}"> {{ $menu['name'] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</aside>
