<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
@include('layouts.head')
@php
    use Carbon\Carbon;
    Carbon::setlocale('vi');
@endphp

<body class="bg-white">
    <div id="fb-root"></div>
    <div class="bg-black bg-opacity-50 fixed h-screen loader w-full z-50 hidden">
        <img class="inset-1/2 absolute h-auto w-44" src="{{ asset('img/core-img/loading.gif') }}">
    </div>

    @include('layouts.header')
    @yield('carosel')
    <div class="container mx-auto mt-14 max-w-7xl px-2 mb-10 pt-4">
        @yield('content')
    </div>

    <div class="toast -ml-4 bg-red-100 border-l-4 border-primary bottom-0 fixed md:w-96 my-2 px-6 right-2 rounded-lg shadow-lg w-11/12 animate-fade-in-left hidden">
        <div class="flex items-center py-4">
            <img id="toast-img" src="{{ asset('img/core-img/logo.png') }}" class="rounded-full w-10 h-10" alt="...">
            <div class="ml-5">
                <p class="text-lg font-bold m-0">Thông báo</p>
                <p class="text-gray-700 my-0 toast-body">You made your awesome tailwind css alert.</p>
            </div>
            <div>
                <button type="button" class="text-yellow-700 outline-none toast-close absolute top-0" onclick="closeToast()">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>
