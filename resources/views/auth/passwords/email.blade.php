@extends('auth.master')
@section('page_title','Lấy lại mật khẩu')

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
                    <p>Để đặt lại mật khẩu, nhập địa chỉ Email của bạn để đăng nhập vào hệ thống.</p>
                    <form id="reset" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input class="form-control" type="text" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="form-button full-width">
                            <button id="submit" type="submit" class="ibtn btn-forget">Nhận link đặt lại mật khẩu</button>
                        </div>
                    </form>
                </div>
                <div class="form-sent hide-it" id="form-sent">
                    <div class="website-logo-inside">
                        <a href="#">
                            <div class="logo">
                                <img class="logo-size" src="/img/core-img/favicon.ico" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="tick-holder">
                        <div class="tick-icon"></div>
                    </div>
                    <h3 style="color:black">Thành công</h3>
                    <p>Link đặt lại mật khẩu đã được gửi tới email của bạn. Vui lòng kiểm tra email của bạn!</p>
                    <div class="info-holder">
                        <span>Không chắc chắn email đó chính xác?</span> <a href="tel:0375933684">Liên hệ Admin</a>.
                    </div>
                </div>
                <div class="form-sent hide-it" id="form-error">
                    <div class="website-logo-inside">
                        <a href="#">
                            <div class="logo">
                                <img class="logo-size" src="/img/core-img/favicon.ico" alt="">
                            </div>
                        </a>
                        <h2>KARATE LEAGUE DOJO</h2>
                    </div>
                    <img src="/img/core-img/error.png" style="width:20%">
                    <h3 style="color:red">Có lỗi rồi</h3>
                    <p>Link đặt lại mật khẩu chưa được gửi đến email của bạn. Hãy đảm bảo bạn đã nhập đúng email của mình.</p>
                    <div class="info-holder">
                        <span>Không chắc chắn email đó chính xác?</span> <a href="tel:0375933684">Liên hệ Admin</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Show loader gif -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#reset").submit(function() {
            $('.loader').show();
        });
    });
</script>

<!-- Alert Error -->
@error('email')
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-items', '.form-content').addClass('hide-it');
        $('#form-error', '.form-content').addClass('show-it');
    })
</script>
@enderror
@if (session('status'))
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-items', '.form-content').addClass('hide-it');
        $('#form-sent', '.form-content').addClass('show-it');
    })
</script>
@endif
@endsection
