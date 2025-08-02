<!-- ##### Header Area Start ##### -->
<nav id="navbar-primary" class="bg-primary fixed left-0 top-0 w-full z-10">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-14">
            <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                <!-- Mobile menu button-->
                <button type="button" id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-primary-lighter focus:outline-none">
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center lg:items-stretch lg:justify-between">
                <a class="flex-shrink-0 flex items-center" href="{{ route('home') }}">
                    <img class="w-9 hidden lg:block" src="{{ asset('img/core-img/logo.png') }}" alt="logo">
                    <span class="text-xl text-white font-bold ml-1">{{ setting('site.web_name') }}</span>
                </a>
                @livewire('search-post')
                <div class="hidden lg:block lg:ml-6">
                    {{ menu('site', 'menus.desktop') }}
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                <div id="app">
                    @if(Auth::check())
                        <notification :userid='{{ auth()->id() }}' :unreads="{{ auth()->user()->unreadNotifications }}"></notification>
                    @endif
                </div>

                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    <div>
                        <button type="button" id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full avatar" src="{{ Auth::check() ? Auth::user()->avatar : Voyager::image('default/user_default.png') }}" alt="user_avatar">
                        </button>
                    </div>

                    <div id="user-menu-panel" role="menu"
                        class="origin-top-right absolute right-0 mt-2 w-64 rounded-md shadow-lg py-1 pb-3 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none transition ease-in-out duration-200 transform hidden">
                        @if (Auth::check())
                            <div class="flex items-center px-3 mt-2">
                                <img src="{{ Auth::user()->avatar }}" class="rounded-full w-10 h-10 avatar">
                                <div class="ml-2 leading-5">
                                    <p class="font-bold">{{ \Str::limit(Auth::user()->name, 18) }}</p>
                                    <p class="text-xs text-gray-600">{{ \Str::limit(Auth::user()->email, 30) }}</p>
                                </div>
                            </div>
                            <hr class="my-3">
                            @if(Auth::user()->isStudent())
                                <a href="{{ route('vouchers.index') }}"
                                    class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">
                                    <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5 8.33329V9.33329C18.0523 9.33329 18.5 8.88558 18.5 8.33329H17.5ZM17.5 11.6666H18.5C18.5 11.1143 18.0523 10.6666 17.5 10.6666V11.6666ZM2.5 11.6666V10.6666C1.94772 10.6666 1.5 11.1143 1.5 11.6666H2.5ZM2.5 8.33329H1.5C1.5 8.88558 1.94772 9.33329 2.5 9.33329V8.33329ZM13.5 4.16663C13.5 3.61434 13.0523 3.16663 12.5 3.16663C11.9477 3.16663 11.5 3.61434 11.5 4.16663H13.5ZM11.5 5.83329C11.5 6.38558 11.9477 6.83329 12.5 6.83329C13.0523 6.83329 13.5 6.38558 13.5 5.83329H11.5ZM13.5 9.16663C13.5 8.61434 13.0523 8.16663 12.5 8.16663C11.9477 8.16663 11.5 8.61434 11.5 9.16663H13.5ZM11.5 10.8333C11.5 11.3856 11.9477 11.8333 12.5 11.8333C13.0523 11.8333 13.5 11.3856 13.5 10.8333H11.5ZM13.5 14.1666C13.5 13.6143 13.0523 13.1666 12.5 13.1666C11.9477 13.1666 11.5 13.6143 11.5 14.1666H13.5ZM11.5 15.8333C11.5 16.3856 11.9477 16.8333 12.5 16.8333C13.0523 16.8333 13.5 16.3856 13.5 15.8333H11.5ZM4.16667 3.16663C2.69391 3.16663 1.5 4.36053 1.5 5.83329H3.5C3.5 5.4651 3.79848 5.16663 4.16667 5.16663V3.16663ZM15.8333 3.16663H4.16667V5.16663H15.8333V3.16663ZM18.5 5.83329C18.5 4.36053 17.3061 3.16663 15.8333 3.16663V5.16663C16.2015 5.16663 16.5 5.4651 16.5 5.83329H18.5ZM18.5 8.33329V5.83329H16.5V8.33329H18.5ZM16.8333 9.99996C16.8333 9.63177 17.1318 9.33329 17.5 9.33329V7.33329C16.0272 7.33329 14.8333 8.5272 14.8333 9.99996H16.8333ZM17.5 10.6666C17.1318 10.6666 16.8333 10.3682 16.8333 9.99996H14.8333C14.8333 11.4727 16.0272 12.6666 17.5 12.6666V10.6666ZM18.5 14.1666V11.6666H16.5V14.1666H18.5ZM15.8333 16.8333C17.3061 16.8333 18.5 15.6394 18.5 14.1666H16.5C16.5 14.5348 16.2015 14.8333 15.8333 14.8333V16.8333ZM4.16667 16.8333H15.8333V14.8333H4.16667V16.8333ZM1.5 14.1666C1.5 15.6394 2.69391 16.8333 4.16667 16.8333V14.8333C3.79848 14.8333 3.5 14.5348 3.5 14.1666H1.5ZM1.5 11.6666V14.1666H3.5V11.6666H1.5ZM3.16667 9.99996C3.16667 10.3682 2.86819 10.6666 2.5 10.6666V12.6666C3.97276 12.6666 5.16667 11.4727 5.16667 9.99996H3.16667ZM2.5 9.33329C2.86819 9.33329 3.16667 9.63177 3.16667 9.99996H5.16667C5.16667 8.5272 3.97276 7.33329 2.5 7.33329V9.33329ZM1.5 5.83329V8.33329H3.5V5.83329H1.5ZM11.5 4.16663V5.83329H13.5V4.16663H11.5ZM11.5 9.16663V10.8333H13.5V9.16663H11.5ZM11.5 14.1666V15.8333H13.5V14.1666H11.5Z" fill="#111827"/>
                                    </svg>
                                    Mã giảm giá
                                </a>
{{--                                <a href="{{ route('transfer-dojos.create') }}"--}}
{{--                                   class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">--}}
{{--                                    <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M6.66667 5.83333L16.6667 5.83333M16.6667 5.83333L13.3333 2.5M16.6667 5.83333L13.3333 9.16667M13.3333 14.1667L3.33334 14.1667M3.33334 14.1667L6.66667 17.5M3.33334 14.1667L6.66667 10.8333" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    </svg>--}}
{{--                                    Chuyển cơ sở--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('rooms.index') }}"--}}
{{--                                   class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">--}}
{{--                                    <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M6.66667 5.83333V2.5M13.3333 5.83333V2.5M5.83333 9.16667H14.1667M4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V5.83333C17.5 4.91286 16.7538 4.16667 15.8333 4.16667H4.16667C3.24619 4.16667 2.5 4.91286 2.5 5.83333V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5Z" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    </svg>--}}
{{--                                    Mượn phòng tập--}}
{{--                                </a>--}}
                                <a href="{{ route('tuitions.index') }}"
                                   class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">
                                    <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.1667 7.50002V5.83335C14.1667 4.91288 13.4205 4.16669 12.5 4.16669H4.16667C3.24619 4.16669 2.5 4.91288 2.5 5.83335V10.8334C2.5 11.7538 3.24619 12.5 4.16667 12.5H5.83333M7.5 15.8334H15.8333C16.7538 15.8334 17.5 15.0872 17.5 14.1667V9.16669C17.5 8.24621 16.7538 7.50002 15.8333 7.50002H7.5C6.57953 7.50002 5.83333 8.24621 5.83333 9.16669V14.1667C5.83333 15.0872 6.57953 15.8334 7.5 15.8334ZM13.3333 11.6667C13.3333 12.5872 12.5871 13.3334 11.6667 13.3334C10.7462 13.3334 10 12.5872 10 11.6667C10 10.7462 10.7462 10 11.6667 10C12.5871 10 13.3333 10.7462 13.3333 11.6667Z" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Học phí
                                </a>
                                <a href="{{ route('events.index') }}"
                                   class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">
                                    <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.16666 3.33329C9.16666 2.41282 9.91285 1.66663 10.8333 1.66663C11.7538 1.66663 12.5 2.41282 12.5 3.33329V4.16663C12.5 4.62686 12.8731 4.99996 13.3333 4.99996H15.8333C16.2936 4.99996 16.6667 5.37306 16.6667 5.83329V8.33329C16.6667 8.79353 16.2936 9.16663 15.8333 9.16663H15C14.0795 9.16663 13.3333 9.91282 13.3333 10.8333C13.3333 11.7538 14.0795 12.5 15 12.5H15.8333C16.2936 12.5 16.6667 12.8731 16.6667 13.3333V15.8333C16.6667 16.2935 16.2936 16.6666 15.8333 16.6666H13.3333C12.8731 16.6666 12.5 16.2935 12.5 15.8333V15C12.5 14.0795 11.7538 13.3333 10.8333 13.3333C9.91285 13.3333 9.16666 14.0795 9.16666 15V15.8333C9.16666 16.2935 8.79356 16.6666 8.33332 16.6666H5.83332C5.37309 16.6666 4.99999 16.2935 4.99999 15.8333V13.3333C4.99999 12.8731 4.62689 12.5 4.16666 12.5H3.33332C2.41285 12.5 1.66666 11.7538 1.66666 10.8333C1.66666 9.91282 2.41285 9.16663 3.33332 9.16663H4.16666C4.62689 9.16663 4.99999 8.79353 4.99999 8.33329V5.83329C4.99999 5.37306 5.37309 4.99996 5.83332 4.99996H8.33332C8.79356 4.99996 9.16666 4.62686 9.16666 4.16663V3.33329Z" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Sự kiện
                                </a>
                            @endif
                            <a href="{{ route('profile') }}"
                               class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">
                                <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.26753 14.8364C5.96056 13.8795 7.9165 13.3333 10 13.3333C12.0835 13.3333 14.0394 13.8795 15.7325 14.8364M12.5 8.33333C12.5 9.71405 11.3807 10.8333 10 10.8333C8.61929 10.8333 7.5 9.71405 7.5 8.33333C7.5 6.95262 8.61929 5.83333 10 5.83333C11.3807 5.83333 12.5 6.95262 12.5 8.33333ZM17.5 10C17.5 14.1421 14.1421 17.5 10 17.5C5.85786 17.5 2.5 14.1421 2.5 10C2.5 5.85786 5.85786 2.5 10 2.5C14.1421 2.5 17.5 5.85786 17.5 10Z" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Trang cá nhân
                            </a>

                            @if (Auth::user()->role->name != 'user')
                                <a href="{{ config('app.url') . '/admin' }}"
                                   class="block hover:bg-gray-200 mt-1 mx-3 px-4 py-2 rounded-md text-black">
                                    <svg class="inline" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16667 10H15.8333M4.16667 10C3.24619 10 2.5 9.25385 2.5 8.33337V5.00004C2.5 4.07957 3.24619 3.33337 4.16667 3.33337H15.8333C16.7538 3.33337 17.5 4.07957 17.5 5.00004V8.33337C17.5 9.25385 16.7538 10 15.8333 10M4.16667 10C3.24619 10 2.5 10.7462 2.5 11.6667V15C2.5 15.9205 3.24619 16.6667 4.16667 16.6667H15.8333C16.7538 16.6667 17.5 15.9205 17.5 15V11.6667C17.5 10.7462 16.7538 10 15.8333 10M14.1667 6.66671H14.175M14.1667 13.3334H14.175" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Quản lý dữ liệu
                                </a>
                            @endif

                            <form action="{{ route('logout') }}" method="post" class="px-4 mt-2">
                                {{ csrf_field() }}
                                <button type="submit" class="bg-primary hover:bg-primary-darker py-1 rounded-md text-center text-white w-full">
                                    Đăng xuất
                                </button>
                            </form>
                        @else
                            <a href="{{ route('dang-ky') }}"
                               class="bg-gray-200 block hover:bg-primary hover:text-white mt-2 mx-3 px-4 py-2 rounded-md text-gray-700 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Đăng ký tài khoản
                            </a>
                            <a href="{{ route('dang-nhap') }}"
                               class="bg-gray-200 block hover:bg-primary hover:text-white mt-2 mx-3 px-4 py-2 rounded-md text-gray-700 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Đăng nhập
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile menu, show/hide based on menu state. -->
<div id="mobile-menu"
     class="fixed -translate-x-full bg-white inset-y-0 left-0 lg:hidden pt-3 w-4/5 md:w-1/2 duration-200 ease-in-out transform transition z-50">

    <!-- logo -->
    <div class="px-4 text-primary">
        <div class="flex justify-between">
            <div>
                <span>●</span>
                <span class="text-secondary">●</span>
                <span class="text-success">●</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" id="mobile-menu-button-close" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </div>

        <a class="border border-primary flex items-center justify-center mt-4 mb-7 px-4 py-2 rounded-xl shadow-md w-full text-primary" href="{{ route('home') }}">
            <img class="w-10" src="{{ asset('img/core-img/logo.png') }}" alt="logo">
            <span class="text-xl font-bold ml-1">{{ setting('site.web_name') }}</span>
        </a>
    </div>

    {{ menu('site', 'menus.mobile') }}

    <div class="bg-primary bottom-0 fixed flex items-center px-3 py-4 text-white w-full">
        <img src="{{ Auth::check() ? Auth::user()->avatar : Voyager::image('default/user_default.png') }}" class="rounded-full w-10 h-10">
        <div class="ml-2 leading-5">
            @if(Auth::check())
                <p class="font-bold">{{ \Str::limit(Auth::user()->name, 18) }}</p>
                <p class="text-xs">{{ \Str::limit(Auth::user()->email, 30) }}</p>
            @else
                <div>
                    <a href="{{ route('register') }}"
                       class="bg-white hover:bg-gray-200 border border-gray-300 mx-1 p-2 rounded-md text-black text-sm whitespace-nowrap">
                        Đăng ký
                    </a>
                    <a href="{{ route('login') }}"
                       class="bg-white hover:bg-gray-200 border border-gray-300 mx-1 p-2 rounded-md text-black text-sm whitespace-nowrap">
                        Đăng nhập
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('script')
    <script type="application/javascript">
        $(document).ready(function () {
            $('#mobile-menu-button').click(function () {
                $('#mobile-menu').removeClass('-translate-x-full');
            });
            $('#mobile-menu-button-close').click(function () {
                $('#mobile-menu').addClass('-translate-x-full');
            });
            $('#user-menu-button').click(function () {
                $('#user-menu-panel').toggleClass('hidden');
            });
            $('#user-notify-button').click(function () {
                $('#user-notify-panel').removeClass('translate-x-full');
            });
            $('#user-notify-button-close').click(function () {
                $('#user-notify-panel').addClass('translate-x-full');
            });
        });
    </script>
@endpush

<!-- ##### Header Area End ##### -->
