<ul>
    @if (Auth::check())
        <li>{{ Auth::user()->name }} !</li>
        @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
        @endforeach

        <!-- Nếu là võ sinh đang tập luyện -->
        @if(Auth::user()->isStudent())
        @if(Auth::user()->student->status == 'STUDYING')
        <li><a href="{{ route('vouchers.index') }}"> Mã giảm giá</a></li>
        <li><a href="{{ route('rooms.index') }}"> Mượn phòng tập</a></li>
        @endif
        <li><a href="{{ route('tuitions.index') }}">Học phí</a></li>
        <li><a href="{{ route('events.index') }}">Sự kiện</a></li>
        @endif

        <li><a href="{{ route('profile') }}">Trang cá nhân</a></li>

        @if (Auth::user()->role->name != 'user')
        <li><a href="/admin" target="_blank">Quản lý dữ liệu</a></li>
        @endif
        <li>
            <form action="{{ route('logout') }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn" style="background:none; padding:0; text-transform: uppercase;">
                    <a style="font-size: 13px;">Đăng xuất</a>
                </button>
            </form>
        </li>
    @else
        @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
        @endforeach
        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
        <li><a href="{{ route('register') }}">Đăng ký</a></li>
    @endif
</ul>
