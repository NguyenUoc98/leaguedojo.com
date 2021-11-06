<div class="card rounded shadow mb-4" style="display:none" id="edit-student">
    <div class="card-header bg-gradient-success d-flex justify-content-between">
        <div class="row ml-1">
            <i class="fa fa-address-card" style="font-size:30px;color:white"></i>
            <h5 class="mb-0 mx-2 text-white" style="line-height:30px">THÔNG TIN VÕ SINH</h5>
        </div>
        <a data-toggle="collapse" href="#card-student" role="button" aria-expanded="false" aria-controls="card-student">
            <i class="fa fa-angle-down mx-2" style="font-size:30px;color:white"></i>
        </a>
    </div>
    <div class="collapse show" id="card-student">
        <div class="card-body rounded">
            <h6 class="heading mb-4">Thông tin cơ bản</h6>
            <div class="d-flex form-group justify-content-around row px-3 mb-0">

                <!-- Image card -->
                <div class="col-xl-3 col-md-3 col-10 pb-4 p-md-0">
                    <img id="img-card" src="{{ Voyager::image($student->image) }}" alt="your image" width="100%" />
                    <div style="margin-top:-36px;background:#000000b0;position:relative;height:36px"></div>
                    <button class="btn btn-block btn-outline-success border-0" data-toggle="modal" data-target="#modal-student" style=" margin-top:-36px;position:relative;box-shadow: none;">
                        <i class="fa fa-camera" aria-hidden="true"></i> Cập nhật
                    </button>
                    <div class="modal fade" id="modal-student" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card border-0 mb-0 d-flex align-items-center">
                                        <div class="card-header bg-white">
                                            <h5 class="text-center m-0">Chọn ảnh thẻ</h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="upload-card"></div>
                                            <div class="text-center">
                                                <input type="file" id="image-card" accept="image/*">
                                                <button class="btn btn-success mt-2 upload-card" style="font-size:12px;" data-dismiss="modal">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Basic Info -->
                <div class="col-xl-8 col-md-9 pl-md-3 px-0">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-control-label" for="input-name">Họ và tên</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" name="name" id="input-name" class="form-control pl-2" placeholder="Tên" value="{{ old('name', $student->name)}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="input-cmnd">Số căn cước công dân</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" name="cmnd" id="input-cmnd" class="form-control pl-2" placeholder="Số cmnd" value="{{ old('cmnd', $student->cmnd)}}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="input-birthday">Ngày sinh</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" name="birthday" id="input-birthday" class="form-control datepicker pl-2" placeholder="Ngày sinh" value="{{ old('birthday', date_format(date_create($student->birthday), 'd-m-Y')) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-phone">Điện thoại</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-success border-success"><i class="fa fa-phone " aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="phone" id="input-phone" class="form-control pl-2" placeholder="Điện thoại" value="{{ old('phone', $student->phone)}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-type">Đối tượng</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-success border-success"><i class="fa fa-male" aria-hidden="true"></i></span>
                                    </div>
                                    <select id="input-type" name="type" class="form-control pl-2">
                                        <option value="0">Thiếu niên - Nhi đồng</option>
                                        <option value="1">Học sinh</option>
                                        <option value="2">Sinh viên</option>
                                        <option value="3">Người đi làm</option>
                                        <option value="4">Đối tượng khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <h6 class="heading mb-4">Thông tin bổ sung</h6>
            <div class="pl-xl-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Địa chỉ</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                </div>
                                <input id="input-address" name="address" class="form-control pl-2" placeholder="Địa chỉ" value="{{ old('address', $student->address)}}" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-fb">Link Facebook</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                </div>
                                <input id="input-fb" name="link_facebook" class="form-control pl-2" placeholder="Link Facebook" value="{{ old('link_facebook', $student->link_fb)}}" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-work-unit">Nơi làm việc</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" name="work_unit" id="input-work-unit" class="form-control pl-2" placeholder="Nơi làm việc" value="{{ old('Nơi làm việc', $student->work_unit)}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-height">Chiều cao (cm)</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-child" aria-hidden="true"></i></span>
                                </div>
                                <input id="input-height" name="height" class="form-control pl-2" value="{{ old('height', $student->height)}}" type="number" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-weight">Cân nặng (kg)</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-dashboard" aria-hidden="true"></i></span>
                                </div>
                                <input id="input-weight" name="weight" class="form-control pl-2" value="{{ old('weight', $student->weight)}}" type="number" step="0.1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-sex">Giới tính</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-transgender" aria-hidden="true"></i></span>
                                </div>
                                <select id="input-sex" name="sex" class="form-control pl-2">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-success btn-long" id="btn-student" style="border-radius: 6px;">Cập nhật</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#input-type").val("{{ $student->type }}");
    $("#input-sex").val("{{ $student->sex }}");

    var resizeCard = $('#upload-card').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 180,
            height: 240
        },

        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#image-card').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            resizeCard.croppie('bind', {
                url: e.target.result
            });
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-card').on('click', function(ev) {
        if ($('#image-card').val() != "") {
            resizeCard.croppie('result', {
                type: 'canvas',
                size: 'original',
                format: 'png'
            }).then(function(img) {
                $('.loader').show();
                axios.put("{{ route('students.update', $student->id) }}", {
                        action: 'image',
                        image: img
                    })
                    .then(response => {
                        $('.loader').hide();
                        $('.show-info').html(response.data);
                        showSuccess();
                        $("#img-card").attr("src", img);
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
        }
    });

    $(document).ready(function() {
        $('#btn-student').click(function() {
            $('.loader').show();
            axios.put("{{ route('students.update', $student->id) }}", {
                    action: 'edit',
                    name: $('#input-name').val(),
                    cmnd: $('#input-cmnd').val(),
                    birthday: $('#input-birthday').val(),
                    phone: $('#input-phone').val(),
                    type: $('#input-type').val(),
                    address: $('#input-address').val(),
                    work_unit: $('#input-work-unit').val(),
                    weight: $('#input-weight').val(),
                    height: $('#input-height').val(),
                    sex: $('#input-sex').val(),
                    link_fb: $('#input-fb').val()
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
    });
</script>