<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
@include('layouts.head')
@yield('css')

<body class="bg-gray-200">
    <div id="fb-root"></div>
    <div class="bg-black bg-opacity-50 fixed h-screen loader w-full z-50 hidden">
        <img class="inset-1/2 absolute h-auto w-44" src="{{ asset('img/core-img/loading.gif') }}">
    </div>

    @include('layouts.header')
    <div class="container mx-auto mt-14 max-w-7xl lg:px-0 px-4 mb-10">
        @yield('content')
    </div>

    {{--    <div class="toast box-shadow" data-delay="5000" style="position: fixed; bottom: 0; right: 1%;z-index:9999">--}}
    {{--        <div class="toast-header text-body bg-warning py-2 text-white">--}}
    {{--            <img id="toast-img" src="/img/core-img/logo.png" width="30px" height="30px" class="rounded mr-2" alt="...">--}}
    {{--            <strong class="mr-auto">Thông báo</strong>--}}
    {{--            <small id="toast-time">Vừa xong</small>--}}
    {{--            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">--}}
    {{--                <span aria-hidden="true">&times;</span>--}}
    {{--            </button>--}}
    {{--        </div>--}}
    {{--        <div class="toast-body">--}}
    {{--            Hello, world! This is a toast message.--}}
    {{--        </div>--}}
    {{--    </div>--}}

    @include('layouts.footer')
    @include('layouts.script')
    @stack('script')
</body>

</html>
