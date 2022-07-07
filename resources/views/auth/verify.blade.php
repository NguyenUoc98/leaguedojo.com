@extends('auth.master')
@section('page_title','Xác thực tài khoản')

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
                    <div class="mt-2">
                        <p>Trước khi tiếp tục bạn hãy kiểm tra email của mình để nhận đường dẫn xác thực tài khoản của
                            bạn.</p>
                        <p class="mt-10 text-center">Nếu bạn chưa nhận được email đó</p>
                        <form method="POST" id="resend" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full block bg-primary hover:bg-primary-darker focus:outline-none text-white font-semibold rounded-lg px-4 py-3 mt-6">
                                Nhấn vào đây
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show loader gif -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#resend").submit(function () {
                $('.loader').removeClass('hidden');
            });
        });
    </script>

    @if (session('resent'))
        <script type="text/javascript">
            Swal({
                title: 'Thành công',
                text: 'Đã gửi email xác thực đến tài khoản của bạn',
                type: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

@endsection
