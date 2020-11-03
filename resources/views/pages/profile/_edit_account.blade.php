<div class="card rounded shadow mb-4" style="display:none" id="edit-user">
    <div class="card-header bg-gradient-danger d-flex justify-content-between">
        <div class="row ml-1">
            <i class="fa fa-user-circle-o" style="font-size:30px;color:white"></i>
            <h5 class="mb-0 mx-2 text-white" style="line-height: 30px">THÔNG TIN TÀI KHOẢN</h5>
        </div>
        <a data-toggle="collapse" href="#card-user" role="button" aria-expanded="false" aria-controls="card-user">
            <i class="fa fa-angle-down mx-2" style="font-size:30px;color:white"></i>
        </a>
    </div>

    <div class="collapse show" id="card-user">
        <div class="card-body rounded">

            <!-- Avatar -->
            <div class="d-flex form-group justify-content-around row pl-3 mb-0">
                <div class="col-xl-3 col-md-4 col-10 pb-4 p-md-0">
                    <img id="img-avatar" src="{{ Voyager::image(auth()->user()->avatar) }}" alt="your image" />
                    <div style="margin-top:-36px;background:#000000b0;position:relative;height:36px"></div>
                    <button class="btn btn-block btn-outline-danger border-0" data-toggle="modal" data-target="#modal-avatar" style=" margin-top: -36px;position: relative;box-shadow: none;border-radius: 6px;">
                        <i class="fa fa-camera" aria-hidden="true"></i> Cập nhật
                    </button>

                    <!-- Picker Image -->
                    <div class="modal fade" id="modal-avatar" tabindex="-1" role="dialog" aria-labelledby="modal-avatar" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body py-1">
                                    <div class="card border-0 mb-0 d-flex align-items-center">
                                        <div class="card-body">
                                            <div id="upload-avatar"></div>
                                            <div class="text-center">
                                                <input type="file" id="image-avatar" accept="image/*">
                                                <button class="btn btn-success mt-2 upload-avatar" style="font-size:12px;border-radius: 6px;" data-dismiss="modal">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 pl-xl-0">

                    <!-- User Name -->
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-danger"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="name" id="input-username" class="form-control pl-2" placeholder="Username" value="{{ old('name', auth()->user()->name) }}" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-danger"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" id="input-email" class="form-control pl-2" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a data-toggle="collapse" href="#reset-password" role="button" aria-expanded="false" aria-controls="reset-password">
                            Đổi mật khẩu?
                        </a>
                        <button class="btn btn-danger" id="btn-account" style="border-radius: 6px;">Cập nhật</button>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div id="reset-password" class="collapse">
                <hr class="my-4" />
                <h6 class="heading mb-4">Mật khẩu</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-old-password">Mật khẩu cũ</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-danger"><i class="fa fa-eye-slash"></i></span>
                            </div>
                            <input type="password" id="input-old-password" class="form-control pl-2" placeholder="Mật khẩu cũ" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-password">Mật khẩu mới</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-danger"><i class="fa fa-eye-slash"></i></span>
                            </div>
                            <input type="password" id="input-password" class="form-control pl-2" placeholder="Mật khẩu mới" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-password-confirmation">
                            Nhập lại mật khẩu mới
                        </label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-danger"><i class="fa fa-eye-slash"></i></span>
                            </div>
                            <input type="password" id="input-password-confirmation" class="form-control pl-2" placeholder="Nhập lại mật khẩu mới" value="" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-danger mt-2" id="btn-reset-password" style="border-radius: 6px;">Thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var resize = $('#upload-avatar').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 250,
            height: 250,
            type: 'square'
        },

        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#image-avatar').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            resize.croppie('bind', {
                url: e.target.result
            });
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-avatar').on('click', function(ev) {
        if ($('#image-avatar').val() != "") {
            resize.croppie('result', {
                type: 'canvas',
                size: 'original',
                format: 'png'
            }).then(function(img) {
                $('.loader').show();
                axios.put("{{ route('users.update', auth()->user()->id) }}", {
                        type: 'avatar',
                        avatar: img
                    })
                    .then(response => {
                        $('.loader').hide();
                        $('.show-info').html(response.data);
                        showSuccess();
                    })
                $("#img-avatar").attr("src", img);
            });
        }
    });

    $(document).ready(function() {
        $('#btn-account').click(function() {
            $('.loader').show();
            axios.put("{{ route('users.update', auth()->user()->id) }}", {
                    type: 'edit',
                    name: $('#input-username').val(),
                    email: $('#input-email').val(),
                })
                .then(response => {
                    $('.loader').hide();
                    $('.show-info').html(response.data);
                    showSuccess();
                })
                .catch(error => {
                    $('.loader').hide();
                    var errors = error.response.data.errors;
                    var message = '';
                    jQuery.each(errors, function(key, value) {
                        value.forEach(function(error) {
                            message += error + '<br>';
                        });
                    });
                    showError(message);
                })
        });

        $('#btn-reset-password').click(function() {
            $('.loader').show();
            axios.put("{{ route('users.update', auth()->user()->id) }}", {
                    type: 'reset',
                    old_password: $('#input-old-password').val(),
                    password: $('#input-password').val(),
                    password_confirmation: $('#input-password-confirmation').val()
                })
                .then(response => {
                    $('.loader').hide();
                    if (response.data.error) {
                        showError(response.data.error);
                    } else {
                        showSuccess();
                        $('#input-old-password').val('');
                        $('#input-password').val('');
                        $('#input-password-confirmation').val('');
                        $('#reset-password').removeClass('show');
                        $('#reset-password').addClass('in');
                    }
                })
                .catch(error => {
                    $('.loader').hide();
                    var errors = error.response.data.errors;
                    var message = '';
                    jQuery.each(errors, function(key, value) {
                        value.forEach(function(error) {
                            message += error + '<br>';
                        });
                    });
                    showError(message);
                })
        });
    });
</script>