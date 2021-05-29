@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Giấy xác nhận tập luyện')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-receipt" aria-hidden="true"></i>
    Giấy xác nhận tập luyện
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <!-- ### INFORMATION ### -->
                    <div class="panel panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-activity"></i> Thông tin
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-12">
                                <label class="control-label" for="name">Võ sinh</label>
                                <select class="form-control select2-ajax" name="student_id" id="students-selector" data-get-items-route="{{ route('students.alone', [
                                                'label' => ['name', 'id'],
                                                'format' => 'name [id]']) }}">
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label" for="name">Ngày nghỉ tập</label>
                                <input required type="date" class="form-control" name="date">
                            </div>

                            <div class="col-12">
                                <a id="btn-print" class="btn btn-primary save pull-right">
                                    <i class="fa fa-print" aria-hidden="true"></i> In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6" style="max-width: 637px;">
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="voyager-images"></i> Xem trước</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div style="border:1px solid;max-height: 792px;overflow: scroll;">
                                <div class="paper" style="max-width: 560px;">
                                    <div class="paper-heading">
                                        <div class="text-center">
                                            <div class="header">
                                                CÔNG TY TNHH ĐÀO TẠO VÀ PHÁT TRIỂN<br>
                                                THỂ CHẤT VIỆT NAM<br>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <div class="header">
                                                CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                                            </div>
                                            Độc lập – Tự do – Hạnh phúc<br>
                                            ===o0o===
                                        </div>
                                    </div>

                                    <div class="report-title">
                                        GIẤY XÁC NHẬN
                                    </div>

                                    <div class="paper-body">
                                        <p style="text-align:center"><b>Công ty TNHH Đào Tạo Và Phát Triển Thể Chất Việt Nam</b><br>
                                            <b>Địa chỉ: </b>Sảnh 1 - Đơn Nguyên 2, CT3 - Khu đô thị mới Trung Văn, Hà Nội.<br><br>
                                            <b>XÁC NHẬN:</b>
                                        </p>

                                        <p>
                                            Anh (Chị): <b class="name">Nguyễn Văn A</b><br>
                                            Ngày sinh: <b class="birthday">01/02/1967</b><span style="margin-left:30px">Giới tính: <b class="sex">Nam</b></span>
                                            <span style="margin-left:30px">Số CMND: <b class="cmnd">142699855</b><br>
                                                Quê quán: <b class="homeland">Hải Dương</b></span><br>
                                            Hiện cư trú tại: <b class="address" style="text-transform: capitalize;">Số 21C, ngõ 77, Bùi Xương Trạch, Thanh Xuân, Hà Nội.</b><br>
                                        </p>

                                        <p>Đã tập luyện tại cơ sở <b class="dojo">Karate League Dojo</b> của <b>Công ty TNHH Đào Tạo Và Phát Triển Thể Chất Việt Nam</b> từ ngày <b class="start-at">28/11/2017</b> đến <b class="end-at">nay</b>.</p>
                                    </div>

                                    <div class="paper-footing" style="font-size: 14px;direction: rtl;">
                                        <div class="text-center">
                                            <span>{{ \Carbon\Carbon::now()->format('\Hà \Nộ\i, \n\gà\y d \t\há\n\g m \nă\m Y') }}</span><br>
                                            <div style="font-weight:600">
                                                GIÁM ĐÔC<br>
                                                <span style="font-style: italic;font-weight:300;font-size: 12px">(Ký và ghi rõ họ tên)</span><br><br><br><br>
                                                TRẦN MẠNH DŨNG
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')

<script>
    $("#students-selector").on('change', function() {
        axios.post("{{ route('reports.info-student') }}", {
                id: $(this).val(),
            })
            .then(response => {
                var data = response.data;
                var year = data.birthday.substring(0, 4);
                var month = data.birthday.substring(5, 7);
                var day = data.birthday.substring(8, 10);
                var sex = 'Khác';
                switch (data.sex) {
                    case 0:
                        sex = 'Nam';
                        break;
                    case 1:
                        sex = 'Nữ';
                        break;
                    default:
                        break;
                }
                $('.name').text(data.name);
                $('.birthday').html(day + '/' + month + '/' + year);
                $('.sex').text(sex + '');
                $('.cmnd').text(data.cmnd);
                $('.homeland').text(data.homeland);
                $('.address').text(data.address);
                $('.dojo').text(data.dojo);

                year = data.admission_day.substring(0, 4);
                month = data.admission_day.substring(5, 7);
                day = data.admission_day.substring(8, 10);
                $('.start-at').text(day + '/' + month + '/' + year);
            });
    });

    $('input[name="date"]').on('change', function() {
        if ($(this).val() != '') {
            var year = $(this).val().substring(0, 4);
            var month = $(this).val().substring(5, 7);
            var day = $(this).val().substring(8, 10);
            $('.end-at').text(day + '/' + month + '/' + year);
        } else {
            $('.end-at').text('nay');
        }

    });

    // In thẻ
    $('#btn-print').click(function() {
        var mode = "iframe";
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $('.paper').printArea(options);
    });
</script>
@stop
