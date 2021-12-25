@extends('auth.master')
@section('page_title','Đặt lại mật khẩu')

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
                class="lg:backdrop-blur-md lg:backdrop-filter lg:bg-gray-200 lg:bg-opacity-20 lg:p-10 lg:rounded-2xl md:w-450 p-5 lg:shadow-xl w-full">
                <div id="form-action">
                    <div class="text-center mb-10">
                        <img class="mx-auto my-2"
                             src="{{ asset('img/core-img/favicon.ico') }}" alt="">
                        <p class="font-extrabold text-3xl">{{ setting('site.web_name') }}</p>
                    </div>
                    <form class="mt-2" id="reset" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <p class="mb-5">Để đặt lại mật khẩu, nhập địa chỉ Email của bạn để đăng nhập vào hệ thống.</p>
                        <div>
                            <label class="block font-bold">Email</label>
                            <input type="email" name="email" id="email" placeholder="Nhập email"
                                   class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-primary focus:outline-none bg-white text-gray-900"
                                   autofocus autocomplete required>
                        </div>

                        <button type="submit"
                                class="w-full block bg-primary hover:bg-primary-darker focus:outline-none text-white font-semibold rounded-lg px-4 py-3 mt-6">
                            Nhận link đặt lại mật khẩu
                        </button>
                    </form>
                </div>

                <div id="send-success"
                     class="border p-6 rounded-lg shadow-lg text-center lg:border-0 lg:shadow-none lg:p-0 hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style=" fill:#000000;"
                         class="w-20 h-20 mx-auto">
                        <path fill="#c8e6c9"
                              d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                        <path fill="#4caf50"
                              d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                    </svg>
                    <p class="font-bold text-3xl text-green-600 mb-6 mt-2">THÀNH CÔNG</p>
                    <p>Link đặt lại mật khẩu đã được gửi tới email của bạn. Vui lòng kiểm tra email và làm theo hướng
                        dẫn.</p>
                    <hr class="my-6 border-gray-300 w-full">
                    <a href="{{ route('home') }}" class="font-bold hover:text-primary -ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Trang chủ
                    </a>
                </div>

                <div id="send-error"
                     class="border p-6 rounded-lg shadow-lg text-center lg:border-0 lg:shadow-none lg:p-0 hidden">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-20 h-20 mx-auto" viewBox="0 0 48 48" style=" fill:#000000;">
                        <path fill="#f44336"
                              d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                        <path fill="#fff"
                              d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z"></path>
                        <path fill="#fff"
                              d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z"></path>
                    </svg>
                    <p class="font-bold text-3xl text-primary mb-6 mt-2">KHÔNG THÀNH CÔNG</p>
                    <p>Link đặt lại mật khẩu chưa được gửi đến email của bạn. Hãy đảm bảo bạn đã nhập đúng email của
                        mình.</p>
                    <hr class="my-6 border-gray-300 w-full">
                    <a href="{{ route('password.request') }}" class="font-bold hover:text-primary -ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Show loader gif -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#reset").submit(function () {
                $('.loader').removeClass('hidden');
            });
        });
    </script>

    <!-- Alert Error -->
    @error('email')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#form-action').addClass('animate-fade-out-left hidden');
            $('#send-error').addClass('animate-fade-in-left').removeClass('hidden');
        })
    </script>
    @enderror
    @if (session('status'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#form-action').addClass('animate-fade-out-left hidden');
                $('#send-success').addClass('animate-fade-in-left').removeClass('hidden');
            })
        </script>
    @endif
@endsection
