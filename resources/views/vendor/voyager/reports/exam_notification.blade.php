@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Thông báo thi thăng đai')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-receipt" aria-hidden="true"></i>
    Thông báo thi thăng đai
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
                                <label class="control-label" for="name">Cơ sở</label>
                                <select class="form-control select2" id="dojo_name">
                                    @foreach(App\Models\Dojo::all() as $dojo)
                                    <option value="{{ $dojo->name }}">{{ $dojo->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label" for="name">Ngày thi</label>
                                <input required type="date" class="form-control" name="date">
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label">Lệ phí</label>
                                <span onclick="createClone()"><i class="voyager-plus"></i></span>
                                <div class="row">
                                    <div class="col-xs-5" style="margin-bottom:0">
                                        <label class="control-label">Kyu</label>
                                    </div>
                                    <div class="col-xs-5" style="margin-bottom:0">
                                        <label class="control-label">Số tiền(VNĐ)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="add-field">
                                        <div class="clonedInput col-md-12" id="keyword_1">
                                            <div class="row">
                                                <div class="col-xs-5">
                                                    <select class="form-control select2" id="kuy0" name="kuys[]">
                                                        <option value="Đai nâu Kyu 1">Kyu 1</option>
                                                        <option value="Đai nâu Kyu 2">Kyu 2</option>
                                                        <option value="Đai nâu Kyu 3">Kyu 3</option>
                                                        <option value="Đai xanh đậm Kyu 4">Kyu 4</option>
                                                        <option value="Đai xanh đậm Kyu 5">Kyu 5</option>
                                                        <option value="Đai xanh lá Kyu 6">Kyu 6</option>
                                                        <option value="Đai xanh nhạt Kyu 7">Kyu 7</option>
                                                        <option value="Đai vàng Kyu 8">Kyu 8</option>
                                                    </select>
                                                </div>

                                                <div class="col-xs-5">
                                                    <input required type="number" min="1000" step="1" class="form-control" id="tuition0" name="tuitions[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        THÔNG BÁO THI THĂNG ĐAI
                                    </div>

                                    <div class="paper-body">
                                        <p><b class="dojo">{{ config('app.name') }}</b> xin gửi tới các bậc phụ huynh, võ sinh đang tập luyện tại võ đường thông báo với nội dung như sau:</p>
                                        <ol>
                                            <li>
                                                Theo kế hoạch, giáo án tập luyện, kỳ thi thăng đai được đề ra năm {{ Carbon\Carbon::now()->year }}. Sau thời gian tập luyện, tu dưỡng đạo đức,
                                                kỷ luật, kỹ thuật, với số giờ lên lớp đầy đủ, nhằm đánh giá kết quả rèn luyện của các võ sinh trong thời gian qua.
                                                Đây là một trong những yếu tố quan trọng ảnh hưởng đến chất lượng đào tạo giảng dạy và quản lý của võ đường,
                                                kỳ thi nhằm nâng cao sự cọ sát và giúp các võ sinh có điều kiện để bộc lộ, phát huy tốt nhất năng lực, năng khiếu
                                                của bản thân.
                                            </li>

                                            <li>
                                                Võ đường tổ chức kỳ thi thăng cấp đai ngày <b class="date">01/12/2019</b>.
                                            </li>


                                            <div style="display:flex">
                                                <li><b>Lệ phí :</b></li>
                                                <ul class="tuition">
                                                    <li>Đai vàng Kyu 8 – 300.0000VNĐ</li>
                                                    <li>Đai vàng Kyu 7 – 400.0000VNĐ</li>
                                                </ul>
                                            </div>

                                            <li>
                                                Phụ huynh, võ sinh khi nộp lệ phí kèm 2 ảnh thẻ 3x4, bên ngoài có ghi đầy đủ thông tin họ và tên,
                                                ngày tháng năm sinh, địa chỉ để ban giám khảo tiện theo dõi và cấp chứng chỉ cho các võ sinh vượt qua kỳ thi.
                                            </li>
                                        </ol>
                                    </div>

                                    <div class="paper-footing" style="font-size: 14px;direction: rtl;">
                                        <div class="text-center">
                                            <span style="font-style: italic;">T/M Ban huấn luyện</span><br>
                                            <div style="font-weight:600">
                                                <img src="/img/reports/sign.png" width="110px"><br>
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
    $('input[name="date"]').on('change', function() {
        if ($(this).val() != '') {
            var year = $(this).val().substring(0, 4);
            var month = $(this).val().substring(5, 7);
            var day = $(this).val().substring(8, 10);
            $('.date').text(day + '/' + month + '/' + year);
        }

    });

    var divCount = $('div.clonedInput').length;
    var contents = [];

    function createClone() {
        axios.post("{{ route('reports.tuition-fields') }}", {
                divCount: ++divCount,
            })
            .then(response => {
                $('.add-field').append(response.data);
                $('#tuition' + divCount).on('change', function() {
                    var kuys = $('select[name="kuys[]"]');
                    var tuitions = $('input[name="tuitions[]"]');
                    $('.tuition').html('');
                    for (var i = 0; i < kuys.length; i++) {
                        $('.tuition').append('<li>' + kuys[i].value + ' - ' + tuitions[i].value + 'VNĐ</li>');
                    }
                });
            });
    }

    function removedClone(id) {
        $(id).remove();
        var kuys = $('select[name="kuys[]"]');
        var tuitions = $('input[name="tuitions[]"]');
        $('.tuition').html('');
        for (var i = 0; i < kuys.length; i++) {
            $('.tuition').append('<li>' + kuys[i].value + ' - ' + tuitions[i].value + 'VNĐ</li>');
        }
    }

    $('#tuition0').on('change', function() {
        var kuys = $('select[name="kuys[]"]');
        var tuitions = $('input[name="tuitions[]"]');
        $('.tuition').html('');
        for (var i = 0; i < kuys.length; i++) {
            $('.tuition').append('<li>' + kuys[i].value + ' - ' + tuitions[i].value + 'VNĐ</li>');
        }
    });

    $('#dojo_name').on('change', function() {
        $('.dojo').text($(this).val());
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
