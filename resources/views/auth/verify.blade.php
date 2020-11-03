@extends('auth.master')
@section('page_title','Xác thực tài khoản')

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
                    <h3>Xác thực tài khoản</h3>
                    <p>Trước khi tiếp tục bạn hãy kiểm tra email của mình để nhận đường dẫn xác thực tài khoản của bạn.</p>
                    Nếu bạn chưa nhận được email đó
                    <form method="POST" id="resend" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="form-button">
                            <button type="submit" class="ibtn"> Nhấn vào đây</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Show loader gif -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#resend").submit(function() {
            $('.loader').show();
        });
    });
</script>

@if (session('resent'))
<script type="text/javascript">
    Swal({
        title: 'Thành công',
        background: 'url(/img/core-img/notify-bg.png)',
        text: 'Đã gửi email xác thực đến tài khoản của bạn',
        type: 'success',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@endsection