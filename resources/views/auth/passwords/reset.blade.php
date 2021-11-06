@extends('auth.master')
@section('page_title','Đặt lại mật khẩu')

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
                    <h3>Đặt lại mật khẩu</h3>
                    <p>Nhập đầy đủ thông tin để đặt lại mật khẩu.</p>
                    <form id="reset" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <input class="form-control"
                            type="text" name="email" value="{{ $email ?? old('email') }}" placeholder="E-mail Address" required autocomplete="email" autofocus readonly>
                        <input class="form-control"
                            type="password" name="password" placeholder="Password" required autocomplete="new-password">
                        <input class="form-control"
                        type="password" name="password_confirmation" placeholder="Nhập lại password" required autocomplete="new-password">
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Đặt lại mật khẩu</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Show loader gif -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#reset").submit(function(){
            $('.loader').show();
        });
    });
</script>

@endsection
