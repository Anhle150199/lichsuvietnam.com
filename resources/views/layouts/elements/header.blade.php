<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center">

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="top-meta-data d-flex align-items-center justify-content-end">
                        <!-- Top Social Info -->
                        <div class="top-social-info">
                            <a href="https://www.facebook.com/lichsunuocvietnam"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                            <a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
                        </div>
                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="{{route('search')}}" method="post">
                                @csrf
                                <input type="search" name="search" id="search" placeholder="Tìm kiếm ...">
                                <button type="submit" class="btn"><i class="fa fa-search" ></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="vizew-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">

                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="vizewNav">
                    <a href="{{ url('/') }}" class="nav-brand" style="max-width: 300px;"><img src="<?php echo url('/'); ?>/img/core-img/logo1.png" alt=""></a>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="{{ url('/') }}">Trang Chủ</a></li>
                                <li><a href="danh-nhan">Danh nhân</a></li>
                                <li><a href="#">Sự Kiện</a>
                                    <ul class="dropdown" style="width: max-content;">
                                        <li><a href="thoi-co-dai">- Thời cổ đại</a></li>
                                        <li><a href="thoi-trung-dai">- Thời Trung Đại</a></li>
                                        <li><a href="thoi-can-dai">- Thời cận đại(1858-1945)</a></li>
                                        <li><a href="thoi-hien-dai">- Thời hiện đại</a></li>
                                    </ul>
                                </li>
                                <li><a href="di-tich">Di Tích</a></li>
                                <li><a href="{{route('video.list')}}">Video</a></li>
                                <li> </li>
                                <li class="text-white" style="width: 55px; padding-left: 35px;">

                                    <i class="fa fa-user fa-lg " aria-hidden="true">

                                        <ul class="dropdown" style="width: max-content;">
                                            @guest
                                            @if (Route::has('login'))
                                            <li><a href="{{ route('login') }}">{{ __('Đăng nhập')}}</a></li>
                                            @endif
                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">{{ __('Đăng ký') }}</a></li>
                                            @endif
                                            @else
                                            <li><a href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                                            @if( Auth::user()->level >= 1)
                                            <li><a href="{{ route('admin') }}">{{__('Admin')}}</a></li>
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Đăng xuất') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            @endguest
                                        </ul>
                                    </i>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->