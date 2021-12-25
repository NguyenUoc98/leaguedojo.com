@extends('auth.master')
@section('page_title','Đăng ký')

@section('content')
    <div class="flex bg-white h-screen">
        <div class="hidden lg:flex lg:w-1/3 text-primary p-20 lg:items-center">
            <div>
                <p class="font-bold text-2xl">NƠI ĐÀO TẠO VÀ PHÁT TRIỂN TÀI NĂNG KARATE</p>
                <p class="text-gray-700">
                    "Tôi không sợ người luyện tập 10.000 cú đá chỉ một lần mà chỉ sợ người thực hành 1 cú đá 10.000 lần"
                </p>
                <img src="{{ asset('img/login.jpg') }}" alt="">
            </div>
        </div>
        <div
            class="bg-white flex from-secondary items-center justify-center lg:bg-gradient-to-br lg:border-0 lg:text-white lg:w-2/3 relative to-primary w-full">
            <img class="absolute h-screen object-cover opacity-20 hidden lg:block top-0 left-0"
                src="{{ asset('img/home/bg.png') }}">
            <div
                class="lg:backdrop-blur-md lg:backdrop-filter lg:bg-white lg:bg-opacity-20 lg:p-10 lg:rounded-2xl md:w-450 p-5 lg:shadow-xl w-full">
                <div class="text-center mb-10">
                    <img class="mx-auto my-2"
                         src="{{ asset('img/core-img/favicon.ico') }}" alt="">
                    <p class="font-extrabold text-3xl">{{ setting('site.web_name') }}</p>
                </div>
                <form class="mt-2" id="register" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label class="block font-bold">Tên tài khoản</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Tên tài khoản"
                               class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900"
                               autofocus autocomplete required>
                    </div>

                    <div class="mt-4">
                        <label class="block font-bold">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email"
                               class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900"
                               autofocus autocomplete required>
                    </div>

                    <div class="mt-4">
                        <label class="block font-bold">Mật khẩu</label>
                        <input type="password" name="password" placeholder="Mật khẩu (Có ít nhất 8 ký tự)" minlength="8"
                               class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900"
                               required>
                    </div>

                    <div class="mt-4">
                        <label class="block font-bold">Nhập lại mật khẩu</label>
                        <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" minlength="8"
                               class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900"
                               required>
                    </div>

                    <button type="submit"
                            class="w-full block bg-primary hover:bg-primary-darker focus:outline-none text-white font-semibold rounded-lg px-4 py-3 mt-6">
                        Đăng ký
                    </button>
                </form>

                <hr class="my-6 border-gray-300 w-full">

                <p>Đã có tài khoản?
                    <a href="{{ route('dang-nhap') }}" class="text-black hover:text-white font-semibold">
                        Đăng nhập
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Show loader gif -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#register").submit(function () {
                $('.loader').removeClass('hidden');
            });
        });
    </script>
@endsection
