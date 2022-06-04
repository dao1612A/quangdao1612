<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
            </a>
            <a href="/" class="navbar-brand logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="/" class="menu-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="has-submenu">
                    <a href="">Tìm bác sĩ <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="">Tư vấn</a></li>
                        <li><a href="">Đặt lịch</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('get_blog.index') }}" title="Bài viết" target="_blank">Tin tức && Sự kiện</a>
                </li>
                <li class="login-link">
                    <a href="{{ route('get.login') }}" title="Đăng ký">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            @if (get_data_user('users'))
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-user"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">{{ get_data_user('users','name') }}</p>
                    <a class="contact-info-header" href="{{ route('get.logout') }}">Đăng xuất</a>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link header-login" href="{{ route('get.login') }}" title="Đăng ký">Đăng ký / Đăng nhập</a>
            </li>
            @endif
        </ul>
    </nav>
</header>
