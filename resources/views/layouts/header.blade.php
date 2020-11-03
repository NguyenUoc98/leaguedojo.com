<div id="fb-root"></div>
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<style>
    #app .notify .dropdown-toggle img{
        width: 20px;
        height: 20px;
    }
</style>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="mag-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="magNav">
                <a href="#" class="nav-brand logo-desktop" style="font-size:16px; color:black">
                    <img src="/img/core-img/favicon.ico" alt="" height="40px" width="40px">
                    Karate League Dojo
                </a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Nav Content -->
                <div class="nav-content d-flex align-items-center">
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div style="background-color: #ed3939;">
                            <a href="#" class="nav-brand logo-mobile mt-2" style="font-size:15px; color:#fff;">
                                <img src="/img/core-img/favicon.ico" alt="" height="40px" width="40px">
                                Karate League Dojo
                            </a>
                            <div class="classycloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <!-- Nav brand -->
                            {{ menu('site', 'menus.news') }}

                        </div>
                        <!-- Nav End -->
                    </div>

                    <div id="app">
                        @if(Auth::check())
                        <notification :userid='{{ auth()->id() }}' :unreads="{{ auth()->user()->unreadNotifications }}"></notification>
                        @endif
                    </div>

                    <div class="top-meta-data d-flex align-items-center" style="justify-content: end;">

                        <!-- Top Search Area -->
                        <!-- <div class="top-search-area">
                            <form action="index.html" method="post">
                                <input type="search" name="top-search" id="topSearch"
                                    placeholder="Search and hit enter...">
                                <button type="submit" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div> -->

                        <!-- Login -->
                        <div class="btn-group">
                            <a class="login-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{Voyager::image(Auth::user()->avatar ?? 'users/default.png')}}" style="width: 35px; height: 35px; border-radius: 50%;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="padding:14px">
                                @if (Auth::check())
                                <li class="profile">
                                    <img src="{{Voyager::image(Auth::user()->avatar)}}" class="profile-img">
                                    <div class="profile-body mt-2">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <h6 style="text-overflow: ellipsis; overflow: hidden; width:150px;">
                                            {{ Auth::user()->email }}
                                        </h6>
                                    </div>
                                </li>
                                <li>
                                    <hr class="my-3">
                                </li>

                                <!-- Nếu là võ sinh đang tập luyện -->
                                @if(Auth::user()->isStudent())
                                @if(Auth::user()->student->status == 'STUDYING')
                                <li style="margin-left: 20px; margin-bottom: 10px;">
                                    <a href="{{ route('vouchers.index') }}">
                                        <i class="fa fa-gift "></i>
                                        <span> Mã giảm giá</span>
                                    </a>
                                </li>

                                <li style="margin-left: 20px; margin-bottom: 10px;">
                                    <a href="{{ route('transfer-dojos.create') }}">
                                        <i class="fa fa-envelope-o "></i>
                                        <span> Chuyển cơ sở</span>
                                    </a>
                                </li>

                                <li style="margin-left: 20px; margin-bottom: 10px;">
                                    <a href="{{ route('rooms.index') }}">
                                        <i class="fa fa-calendar "></i>
                                        <span> Mượn phòng tập</span>
                                    </a>
                                </li>

                                @endif

                                <li style="margin-left: 20px; margin-bottom: 10px;">
                                    <a href="{{ route('tuitions.index') }}">
                                        <i class="fa fa-money"></i>
                                        <span> Học phí</span>
                                    </a>
                                </li>

                                <li style="margin-left: 20px; margin-bottom: 10px;">
                                    <a href="{{ route('events.index') }}">
                                        <i class="fa fa-puzzle-piece"></i>
                                        <span>Sự kiện</span>
                                    </a>
                                </li>
                                @endif

                                <li style="margin-left: 20px; margin-bottom: 10px;">
                                    <a href="{{ route('profile') }}">
                                        <i class="fa fa-user-circle-o"></i>
                                        <span> Trang cá nhân</span>
                                    </a>
                                </li>

                                @if (Auth::user()->role->name != 'user')
                                <li style="margin-left: 20px; margin-bottom: 20px;">
                                    <a href="/admin" target="_blank">
                                        <i class="fa fa-anchor"></i>
                                        <span> Quản lý dữ liệu</span>
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <i class="fa fa-power-off"></i>
                                            <span> Đăng xuất</span>
                                        </button>
                                    </form>
                                </li>
                                @else
                                <li style="margin-left: 20px;">
                                    <a href="{{ route('register') }}">
                                        <i class="fa fa-user"></i>
                                        <span> Đăng ký</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="my-3">
                                </li>
                                <li style="margin-left: 20px;">
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-sign-in"></i>
                                        <span> Đăng nhập</span>
                                    </a>
                                </li>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->