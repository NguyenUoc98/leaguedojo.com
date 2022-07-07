@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Chứng nhận thủ khoa')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-receipt" aria-hidden="true"></i>
    Chứng nhận thủ khoa
</h1>
@include('voyager::multilingual.language-selector')
@stop

<style>
    .date1 {
        font-family: Agency FB;
        color: #fff;
        text-transform: uppercase;
        line-height: 1;
        position: absolute;
        top: 40%;
        right: 22.3%;
        font-size: 0.8rem;
        text-align: center;
        width: 12%;
    }

    .day {
        font-size: 1.7rem;
    }

    .caption {
        font-family: UTM Avo;
        text-transform: uppercase;
        color: #000;
        font-weight: 600;
        font-size: 0.54rem;
        position: absolute;
        bottom: 8.7%;
        width: 100%;
        text-align: center;
    }

    .footer-caption {
        font-family: UTM Avo;
        color: #000;
        font-weight: 600;
        font-size: 0.38rem;
        position: absolute;
        bottom: 3%;
        text-align: center;
        width: 100%;
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

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Ngày thi</label>
                                    <input required type="date" class="form-control" name="date">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Kỳ thi thứ</label>
                                    <input required type="number" min="1" step="1" class="form-control" value="1" name="number">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label" for="name">Cơ sở</label>
                                <select class="form-control select2" id="dojo_name">
                                    @foreach(App\Models\Dojo::all() as $dojo)
                                    <option value="{{ $dojo->name }}">{{ $dojo->name }}</option>
                                    @endforeach
                                </select>
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
                                <img src="/img/reports/bg-chung-nhan-thu-khoa.png" class="bg-competition" />
                                <div class="content-competition">
                                    <div class="date1">
                                        <span class="day">01</span><br>
                                        <span class="month">December</span>
                                    </div>
                                </div>

                                <div class="caption">
                                    CHÚC MỪNG VÕ SINH ĐÃ ĐẠT THÀNH TÍCH THỦ KHOA<br>
                                    TRONG KỲ THI THĂNG ĐAI LẦN THỨ <span class="number">1</span><br>
                                    CỦA VÕ ĐƯỜNG
                                </div>

                                <div class="footer-caption">
                                    <span class="dojo">{{ config('app.name') }} - K.L.D</span><br>
                                    <span class="date2">11/12/2019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="result" style="width: 1240px;display:none">
                <img src="/img/reports/bg-chung-nhan-thu-khoa.png" class="bg-competition" />
                <div class="content-competition">
                    <div class="date1" style="font-size: 3.1rem;">
                        <span class="day" style="font-size: 6.6rem;">01</span><br>
                        <span class="month">December</span>
                    </div>
                </div>

                <div class="caption" style="font-size: 2.1rem;">
                    CHÚC MỪNG VÕ SINH ĐÃ ĐẠT THÀNH TÍCH THỦ KHOA<br>
                    TRONG KỲ THI THĂNG ĐAI LẦN THỨ <span class="number">1</span><br>
                    CỦA VÕ ĐƯỜNG
                </div>

                <div class="footer-caption" style="font-size: 1.5rem;">
                    <span class="dojo">{{ config('app.name') }} - K.L.D</span><br>
                    <span class="date2">11/12/2019</span>
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
        var monthLang;
        switch (month) {
            case '01':
                monthLang = 'January';
                break;
            case '02':
                monthLang = 'February';
                break;
            case '03':
                monthLang = 'March';
                break;
            case '04':
                monthLang = 'April';
                break;
            case '05':
                monthLang = 'May';
                break;
            case '06':
                monthLang = 'June';
                break;
            case '07':
                monthLang = 'July';
                break;
            case '08':
                monthLang = 'August';
                break;
            case '09':
                monthLang = 'September';
                break;
            case '10':
                monthLang = 'October';
                break;
            case '11':
                monthLang = 'November';
                break;
            default:
                monthLang = 'December';
                break;
        }

        $('.day').text(date + '');
        $('.month').text(monthLang + '');
        $('.date2').text(date + '/' + month + '/' + year);
    });

    $('input[name="number"]').on('change', function() {
        $('.number').text($(this).val());
    });

    $('#dojo_name').on('change', function() {
        $('.dojo').text($(this).val());
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
                link.download = 'Chứng nhận thủ khoa.jpeg';
                link.href = dataUrl;
                link.click();
            });
    });
</script>
@stop
