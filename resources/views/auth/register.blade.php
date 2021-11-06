@extends('auth.master')
@section('page_title','Đăng ký')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="img-holder"> 
            <div class="bg"></div>
            <div class="info-holder">
                <h2>NƠI ĐÀO TẠO VÀ PHÁT TRIỂN TÀI NĂNG KARATE</h2>
                <p><span>"</span>Tôi không sợ người luyện tập 10.000 cú đá chỉ một lần mà chỉ sợ người thực hành 1 cú đá 10.000 lần<span>"</span></p>
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
                        <a href="{{ route('login') }}" >Đăng Nhập</a><a href="{{ route('register') }}" class="active">Đăng Ký</a>
                    </div>
                    <form id="register" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input class="form-control"
                            type="text" name="name" value="{{ old('name') }}" placeholder="Tên tài khoản" required="">
                        <input class="form-control"
                            type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" required="">
                        <input class="form-control"
                            type="password" name="password" placeholder="Mật khẩu (Có ít nhất 8 ký tự)" required="">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required="">
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Đăng ký</button> 
                        </div>
                    </form>
                    <!-- <div class="other-links">
                        <span>Hoặc đăng ký bằng</span><a href="http://brandio.io/envato/iofrm/html/login8.html#">Facebook</a><a href="http://brandio.io/envato/iofrm/html/login8.html#">Google</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Show loader gif -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#register").submit(function(){
            $('.loader').show();
        });
    });
</script>

@endsection()
