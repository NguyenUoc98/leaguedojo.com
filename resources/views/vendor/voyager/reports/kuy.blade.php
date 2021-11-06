@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Chứng nhận đẳng cấp')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-receipt" aria-hidden="true"></i>
    Chứng nhận đẳng cấp
</h1>
@include('voyager::multilingual.language-selector')
@stop

<style>
    .student {
        font-family: UTM Sarah;
        text-align: center;
        margin-top: 62%;
        font-size: 2.4rem;
        color: #3c2820;
        line-height: 1;
        text-transform: capitalize;
    }

    .birthday {
        font-family: UTM Avo;
        text-align: center;
        font-size: 0.63rem;
        color: #3c2820;
        margin-top: 4%;
    }

    .caption {
        font-family: UTM Avo;
        text-align: center;
        font-size: 0.49rem;
        color: #3c2820;
        margin-top: 3%;
    }

    .date {
        font-family: UTM Avo;
        text-align: center;
        font-size: 0.65rem;
        position: absolute;
        color: #3c2820;
        bottom: 15.4%;
        width: 29%;
        left: 10%;
    }
</style>


@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-8 col-md-6">
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

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Ngày thi</label>
                                    <input required type="date" class="form-control" name="date">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Kyu</label>
                                    <select class="form-control select2" id="kuy">
                                        <option value="8">Kyu 8 - Đai vàng</option>
                                        <option value="7">Kyu 7 - Đai xanh nhạt</option>
                                        <option value="6">Kyu 6 - Đai xanh lá</option>
                                        <option value="5">Kyu 5 - Đai xanh đậm</option>
                                        <option value="4">Kyu 4 - Đai xanh đậm</option>
                                        <option value="3">Kyu 3 - Đai nâu</option>
                                        <option value="2">Kyu 2 - Đai nâu</option>
                                        <option value="1" selected>Kyu 1 - Đai nâu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <a id="btn-print" class="btn btn-primary save pull-right">
                                    <i class="voyager-download"></i> Lưu thành ảnh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="text-align: -webkit-center;">
                    <div class="panel panel-bordered panel-primary" style="width: 353px;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="voyager-images"></i> Xem trước</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="card" style="width: 314px;">
                                <img src="/img/reports/bg-kuy.png" class="bg-competition" />
                                <div class="content-competition">
                                    <div class="student">
                                        Nguyễn Văn A
                                    </div>

                                    <div class="birthday">
                                        DATE OF BIRTH: 12/05/1995
                                    </div>

                                    <div class="caption">
                                        COMPLETELY BETTER TWO THERAPIES : PSYCHOLOGICAL AND PHYSICAL<br>
                                        WORTHY OF <span class="kuy">A BROWN BELT - KYU 1</span>
                                    </div>

                                    <img class="belt" src="/img/reports/nau.png" style="width: 21%; margin-top: 4%;">

                                    <div class="date">
                                        14.05.2019
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="result" style="width: 1240px;display:none">
                <img src="/img/reports/bg-kuy.png" class="bg-competition" />
                <div class="content-competition">
                    <div class="student" style="font-size: 9rem;">
                        Nguyễn Văn A
                    </div>

                    <div class="birthday" style="font-size: 2.45rem;">
                        DATE OF BIRTH: 12/05/1995
                    </div>

                    <div class="caption" style="font-size: 1.94rem;">
                        COMPLETELY BETTER TWO THERAPIES : PSYCHOLOGICAL AND PHYSICAL<br>
                        WORTHY OF <span class="kuy">A BROWN BELT - KYU 1</span>
                    </div>

                    <img class="belt" src="/img/reports/nau.png" style="width: 21%; margin-top: 4%;">

                    <div class="date" style="font-size: 2.65rem;">
                        14.05.2019
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
        var year = $(this).val().substring(0, 4);
        var month = $(this).val().substring(5, 7);
        var date = $(this).val().substring(8, 10);
        $('.date').text(date + '.' + month + '.' + year);
    });

    $('#kuy').on('change', function() {
        var kuy = $(this).val();
        var res;
        var img;
        if (kuy <= 3) {
            res = 'A BROWN BELT - KYU ' + kuy;
            img = '/img/reports/nau.png';
        } else if (kuy <= 5) {
            res = 'A DARK BLUE BELT - KYU ' + kuy;
            img = '/img/reports/xanh-dam.png';
        } else if (kuy == 6) {
            res = 'A GREEN BELT - KYU ' + kuy;
            img = '/img/reports/xanh-la.png';
        } else if (kuy == 7) {
            res = 'A LIGHT BLUE BELT - KYU ' + kuy;
            img = '/img/reports/xanh-nhat.png';
        } else {
            res = 'A YELLOW BELT - KYU ' + kuy;
            img = '/img/reports/vang.png';
        }

        $('.kuy').text(res);
        $('.belt').attr('src', img);
    });

    $("#students-selector").on('change', function() {
        axios.post("{{ route('reports.info-student') }}", {
                id: this.value,
            })
            .then(response => {
                var data = response.data;
                var year = data.birthday.substring(0, 4);
                var month = data.birthday.substring(5, 7);
                var day = data.birthday.substring(8, 10);

                $('.student').text(data.name);
                $('.birthday').text('DATE OF BIRTH: ' + day + '/' + month + '/' + year);
            });
    });

    // In thẻ
    $('#btn-print').click(function() {
        $('#result').show();
        $('#voyager-loader').show();
        domtoimage.toJpeg($('#result')[0], {
                quality: 1
            })
            .then(function(dataUrl) {
                $('#result').hide();
                $('#voyager-loader').hide();
                var link = document.createElement('a');
                link.download = 'Chứng nhận đẳng cấp.jpeg';
                link.href = dataUrl;
                link.click();
            });
    });
</script>
@stop