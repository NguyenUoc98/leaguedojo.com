@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Giấy giới thiệu')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-receipt" aria-hidden="true"></i>
    Giấy giới thiệu
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
                            <div class="form-group">
                                <label class="control-label" for="name">Kỳ thi</label>
                                <input required type="text" class="form-control" name="exam">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="name">Nơi tổ chức</label>
                                <input required type="text" class="form-control" name="address">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="name">Đơn vị tổ chức</label>
                                <textarea name="organizational-units" class="form-control" rows="2" style="resize:none"></textarea>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Ngày bắt đầu</label>
                                    <input required type="date" class="form-control" name="date-start">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Ngày kết thúc</label>
                                    <input required type="date" class="form-control" name="date-end">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label" for="name">Võ sinh</label>
                                <select class="form-control select2-ajax" name="student_id[]" multiple id="students-selector" data-get-items-route="{{ route('students.alone', [
                                                'label' => ['name', 'id'],
                                                'format' => 'name [id]']) }}">
                                </select>
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

                                            Số:….../GGT-……
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
                                        GIẤY GIỚI THIỆU
                                    </div>

                                    <div class="paper-body">
                                        <p>Công ty TNHH Đào Tạo Và Phát Triển Thể Chất Việt Nam trân trọng giới thiệu <span class="number">5</span> thí sinh (Có danh sách kèm theo).</p>
                                        <p>Chức vụ: Là cán bộ, nhân viên, cộng tác viên, học viên của công ty TNHH Đào tạo
                                            và Phát triển Thể chất Việt Nam được cử đến: <span class="exam">Kỳ thi đai đen và Thăng đẳng Quốc gia 2019</span>
                                            tổ chức tại <span class="address">Đại học Công Đoàn</span> do
                                            <span class="organizational-units">Tổng cục Thể dục thể thao phối hợp Công ty Phát triển Karatedo Việt Nam</span>
                                            tổ chức từ ngày <span class="date-start">03/08/2019</span> đến ngày <span class="date-end">04/08/2019</span>.
                                        </p>
                                        <p>Về việc: Đăng ký tham dự thi đai đen Nhất, Nhị, Tam đẳng theo quy định hiện hành của Tổng cục Thể dục Thể thao.</p>
                                        <p>Đề nghị Tổng cục Thể dục Thể thao tạo điều kiện để các thí sinh có tên trong danh sách kèm theo nêu trên hoàn thành nhiệm vụ.</p>
                                        <p>Trân trọng!</p>
                                    </div>

                                    <div class="paper-footing" style="font-size: 14px">
                                        <div style="font-style: italic;font-size: 12px">
                                            Giấy giới thiệu có giá trị hết ngày<br>
                                            <span class="date-end">04/08/2019</span>
                                        </div>
                                        <div class="text-center">
                                            <span class="date">{{ \Carbon\Carbon::now()->format('\Hà \Nộ\i, \n\gà\y d \t\há\n\g m \nă\m Y') }}</span><br>
                                            <div style="font-weight:600">
                                                GIÁM ĐÔC<br>
                                                <span style="font-style: italic;font-weight:300;font-size: 12px">(Ký và ghi rõ họ tên)</span><br><br><br><br>
                                                TRẦN MẠNH DŨNG
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br><br><br><br><br>

                                    <div class="report-title" style="font-size: 14px;">
                                        DANH SÁCH THÍ SINH THAM DỰ <span class="exam">KỲ THI THĂNG ĐẲNG QUỐC GIA-2019</span><br>
                                        TẠI <span class="address">ĐẠI HỌC CÔNG ĐOÀN</span><br>
                                        <span style="font-weight:400; text-transform:none;font-style: italic;">(Kèm theo Giấy giới thiệu số……/GGT-……)</span>
                                    </div>

                                    <table class="table list-table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>HỌ VÀ TÊN</th>
                                                <th>NĂM SINH</th>
                                                <th>QUÊ QUÁN</th>
                                                <th>XIN THĂNG ĐẲNG</th>
                                                <th>GHI CHÚ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="no-wrap">Nguyễn Văn A</td>
                                                <td class="text-center">1998</td>
                                                <td class="text-center no-wrap">Hải Dương</td>
                                                <td class="text-center">Nhị đẳng</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    $('input[name="exam"]').keyup(function() {
        $('.exam').text($(this).val());
    });

    $('input[name="address"]').keyup(function() {
        $('.address').text($(this).val());
    });

    $('input[name="organizational-units"], textarea').keyup(function() {
        $('.organizational-units').text($(this).val());
    });

    $('input[name="date-start"]').on('change', function() {
        var year = $(this).val().substring(0, 4);
        var month = $(this).val().substring(5, 7);
        var date = $(this).val().substring(8, 10);
        $('.date-start').text(date + '/' + month + '/' + year);
    });

    $('input[name="date-end"]').on('change', function() {
        var year = $(this).val().substring(0, 4);
        var month = $(this).val().substring(5, 7);
        var date = $(this).val().substring(8, 10);
        $('.date-end').text(date + '/' + month + '/' + year);
    });

    $("#students-selector").on('change', function() {
        axios.post("{{ route('reports.info-student') }}", {
                id: $(this).val(),
            })
            .then(response => {
                $('.table-body').html('');
                for (var i = 0; i < response.data.length; i++) {
                    var name = response.data[i].name;
                    var birthday = response.data[i].birthday.substring(0, 4);
                    var homeland = response.data[i].homeland;
                    var kuy;

                    switch (response.data[i].kuy) {
                        case 11:
                            kuy = 'Nhị đẳng';
                            break;
                        case 12:
                            kuy = 'Tam đẳng';
                            break;
                        case 13:
                            kuy = 'Tứ đẳng';
                            break;
                        case 14:
                            kuy = 'Ngũ đẳng';
                            break;
                        default:
                            kuy = 'Nhất đẳng';
                            break;
                    }
                    $('.table-body').append('<tr><td class="text-center">' + (i + 1) + '</td> <td class="no-wrap">' + name + '</td> <td class="text-center">' + birthday + '</td> <td class="text-center no-wrap">' + homeland + '</td> <td class="text-center">' + kuy + '</td> <td></td></tr>');
                }
                $('.number').text(response.data.length);
            });
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