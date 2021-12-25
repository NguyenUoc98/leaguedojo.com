@extends('auth.master')
@section('page_title','Đăng nhập')

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
            <div class="lg:backdrop-blur-md lg:backdrop-filter lg:bg-gray-200 lg:bg-opacity-20 lg:p-10 lg:rounded-2xl md:w-450 p-5 lg:shadow-xl w-full">
                <div class="text-center mb-10">
                    <img class="mx-auto my-2"
                         src="{{ asset('img/core-img/favicon.ico') }}" alt="">
                    <p class="font-extrabold text-3xl">{{ setting('site.web_name') }}</p>
                </div>
                <form class="mt-2" id="login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label class="block font-bold">Email</label>
                        <input type="email" name="email" id="email" placeholder="Nhập email"
                               class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900"
                               autofocus autocomplete required>
                    </div>

                    <div class="mt-4">
                        <label class="block font-bold">Mật khẩu</label>
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" minlength="8"
                               class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900" required>
                    </div>

                    <div class="flex justify-between mt-2">
                        <div>
                            <input class="form-control" type="checkbox" name="remember" id="remember">
                            <label for="remember" class="text-sm font-semibold">Duy trì đăng nhập</label>
                        </div>

                        <a href="{{ route('password.request') }}" class="text-sm font-semibold hover:text-primary focus:text-primary">
                            Quên mật khẩu?
                        </a>
                    </div>

                    <button type="submit"
                            class="w-full block bg-primary hover:bg-primary-darker focus:outline-none text-white font-semibold rounded-lg px-4 py-3 mt-6">
                        Đăng nhập
                    </button>
                </form>

                <hr class="my-6 border-gray-300 w-full">

                <a class="w-full block bg-white hover:bg-gray-100 focus:bg-gray-100 text-gray-900 font-semibold rounded-lg px-4 py-3 border border-gray-300"
                   href="{{ route('auth.social-login', 'google') }}">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg>
                        <span class="ml-4">Đăng nhập với Google</span>
                    </div>
                </a>

                <a class="w-full block bg-white hover:bg-gray-100 focus:bg-gray-100 text-gray-900 font-semibold rounded-lg px-4 py-3 border border-gray-300 mt-2"
                   href="{{ route('auth.social-login', 'facebook') }}">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Ebene 1" class="h-6 w-6" viewBox="0 0 1024 1024"><path fill="#1877f2" d="M1024,512C1024,229.23016,794.76978,0,512,0S0,229.23016,0,512c0,255.554,187.231,467.37012,432,505.77777V660H302V512H432V399.2C432,270.87982,508.43854,200,625.38922,200,681.40765,200,740,210,740,210V336H675.43713C611.83508,336,592,375.46667,592,415.95728V512H734L711.3,660H592v357.77777C836.769,979.37012,1024,767.554,1024,512Z"/><path fill="#fff" d="M711.3,660,734,512H592V415.95728C592,375.46667,611.83508,336,675.43713,336H740V210s-58.59235-10-114.61078-10C508.43854,200,432,270.87982,432,399.2V512H302V660H432v357.77777a517.39619,517.39619,0,0,0,160,0V660Z"/></svg>
                        <span class="ml-4">Đăng nhập với Facebook</span>
                    </div>
                </a>

                <p class="mt-8">Chưa có tài khoản?
                    <a href="{{ route('dang-ky') }}" class="text-black hover:text-white font-semibold ml-3">
                        Đăng ký tài khoản
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Show loader gif -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#login").submit(function () {
                $('.loader').removeClass('hidden');
            });
        });
    </script>

@endsection()
