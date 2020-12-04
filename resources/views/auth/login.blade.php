@extends('auth.master')
@section('page_title','Đăng nhập')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <h2>NƠI ĐÀO TẠO VÀ PHÁT TRIỂN TÀI NĂNG KARATE</h2>
                <p><span>"</span>Tôi không sợ người luyện tập 10.000 cú đá chỉ một lần mà chỉ sợ người thực hành 1 cú đá
                    10.000 lần<span>"</span></p>
                <img src="/img/login.jpg" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items text-center">
                    <div class="website-logo-inside">
                        <a href="#">
                            <div class="logo">
                                <img class="logo-size" src="/img/core-img/favicon.ico" alt="">
                            </div>
                        </a>
                        <h2>KARATE LEAGUE DOJO</h2>
                    </div>
                    <div class="page-links">
                        <a href="{{ route('login') }}" class="active">Đăng Nhập</a><a
                            href="{{ route('register') }}">Đăng Ký</a>
                    </div>
                    <form id="login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <input class="form-control" type="text" name="email" id="email" placeholder="E-mail"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Mật khẩu"
                            required>
                        <div class="form-button d-flex">
                            <input class="form-control" type="checkbox" name="remember" id="remember"><label
                                class="col-6" for="remember">Duy trì đăng nhập</label>
                            <a href="{{ route('password.request') }}" class="col-6 text-right">Quên mật khẩu?</a>
                        </div>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Đăng nhập</button>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Hoặc đăng nhập bằng</span><a
                            href="{{ route('auth.social-login', 'facebook') }}">Facebook</a><a
                            href="{{ route('auth.social-login', 'google') }}">Google</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Show loader gif -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#login").submit(function() {
            $('.loader').show();
        });
    });
</script>

@endsection()
