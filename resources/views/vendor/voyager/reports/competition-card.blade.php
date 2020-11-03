@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Thẻ thi đấu')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-receipt" aria-hidden="true"></i>
    Thẻ thi đấu
</h1>
@include('voyager::multilingual.language-selector')
@stop

<style>
    .logo-preview img {
        margin: 3% 3px;
        width: 12%;
        height: auto;
    }

    .tourament-preview {
        font-family: 'UTM Kabel KT', sans-serif;
        font-size: 0.96rem;
        text-align: center;
        text-transform: uppercase;
    }

    .tourament-name {
        width: 90%;
        margin: auto;
        line-height: 1.2;
        color: #214962;
    }

    .img-card {
        text-align: center;
        margin: 7% 0;
    }

    .img-card img {
        width: 32%;
        padding: 0.5%;
        border: 1px solid;
    }

    .student-name {
        font-family: 'UTM Neutra', sans-serif;
        font-size: 1.7rem;
        text-align: center;
        text-transform: uppercase;
        line-height: 1;
        color: #222;
    }

    .dojo-name {
        font-family: 'UTM Neutra', sans-serif;
        font-size: 0.82rem;
        text-align: center;
        text-transform: uppercase;
        line-height: 2.2;
        color: #b81b1a;
    }

    .info {
        font-family: 'UTM Dax', sans-serif;
        text-align: center;
        font-size: 0.95rem;
        text-transform: uppercase;
        font-weight: 700;
        margin-top: 5px;
        color: #333;
    }

    .content-fight {
        font-family: 'UTM Facebook', sans-serif;
        text-align: center;
        font-size: 0.9rem;
        text-transform: uppercase;
        line-height: 1.4;
    }

    .content-fight p {
        margin: 0;
    }

    .date {
        font-family: 'UTM Dax', sans-serif;
        text-align: center;
        font-size: 0.65rem;
        text-transform: uppercase;
        font-weight: 700;
        position: absolute;
        bottom: 5px;
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
                            <div class="form-group col-12">
                                <label class="control-label" for="name">Logo giải đấu</label>
                                <div id="output-logo"></div>
                                <div class="clearfix"></div>
                                <label class="custom-file">
                                    <input required class="custom-file-input" type="file" name="logo[]" accept="image/*" multiple onchange="loadFile(event)">
                                    <span class="custom-file-control form-control-file"></span>
                                </label>
                            </div>

                            <div class="form-group col-12 ">
                                <label class="control-label" for="name">Giải đấu</label>
                                <input required type="text" class="form-control" name="tourament" placeholder="Giải đấu">
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label" for="name">Võ sinh</label>
                                <select class="form-control select2-ajax" name="student_id" id="students-selector" data-get-items-route="{{ route('students.alone', [
                                                'label' => ['name', 'id'],
                                                'format' => 'name [id]']) }}">
                                </select>
                            </div>

                            <div class="form-group col-12 ">
                                <label class="control-label" for="name">Đơn vị</label>
                                <input required type="text" class="form-control" name="dojo-name" placeholder="Đơn vị">
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label">Nội dung</label>
                                <span onclick="createClone()"><i class="voyager-plus"></i></span>
                                <div class="row">
                                    <div class="add-field">
                                        <div class="clonedInput col-md-12" id="keyword_1">
                                            <div class="row">
                                                <div class="col-xs-10" style="margin-bottom:10px">
                                                    <input required type="text" class="form-control" name="keywords[]" placeholder="Nội dụng thi đấu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Hạng cân</label>
                                    <input required type="text" class="form-control" name="info-weight" placeholder="Hạng cân">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Ngày thi đấu</label>
                                    <input required type="date" class="form-control" name="date">
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
                                <img src="/img/reports/bg-competition.png" class="bg-competition" />
                                <div class="content-competition">
                                    <div class="logo-preview text-center">
                                        <img src="/img/core-img/logo.png">
                                    </div>

                                    <div class="tourament-preview">
                                        <div class="tourament-name">giải vô địch karate mở rộng năm 2019</div>
                                    </div>

                                    <div class="img-card">
                                        <img src="{{ config('app')['url'] . '/storage/students/default.png' }}">
                                    </div>

                                    <div class="student-name">
                                        Nguyễn Văn A
                                    </div>

                                    <div class="dojo-name">
                                        Karate League Dojo
                                    </div>

                                    <div class="info info-date">
                                        <span style="margin-right: 10px">Năm sinh: 1998</span><span>Giới tính: Nam</span>
                                    </div>

                                    <div class="info info-weight">
                                        <span>Hạng cân: Dưới 55kg</span>
                                    </div>

                                    <div class="info">
                                        <span>Nội dung</span>
                                    </div>

                                    <div class="content-fight">
                                        <p>Kata cá nhân nam trên 16 tuổi</p>
                                        <p>Kata đồng đội nam trên 16 tuổi</p>
                                        <p>Kata đồng đội hỗn hợp trên 16 tuổi</p>
                                    </div>

                                    <div class="date">
                                        Hà nội, ngày 11 tháng 08 năm 2019
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="result" style="width: 780px;display: none;">
                <img src="/img/reports/bg-competition.png" class="bg-competition" />
                <div class="content-competition">
                    <div class="logo-preview text-center">
                        <img src="/img/core-img/logo.png">
                    </div>

                    <div class="tourament-preview" style="font-size: 2.5rem;">
                        <div class="tourament-name">giải vô địch karate mở rộng năm 2019</div>
                    </div>

                    <div class="img-card">
                        <img src="{{ config('app')['url'] . '/storage/students/default.png' }}">
                    </div>

                    <div class="student-name" style="font-size: 4.2rem;">
                        Nguyễn Văn A
                    </div>

                    <div class="dojo-name" style="font-size: 2rem;">
                        Karate League Dojo
                    </div>

                    <div class="info info-date" style="font-size: 2.4rem;">
                        <span style="margin-right: 10px">Năm sinh: 1998</span><span>Giới tính: Nam</span>
                    </div>

                    <div class="info info-weight" style="font-size: 2.4rem;">
                        <span>Hạng cân: Dưới 55kg</span>
                    </div>

                    <div class="info" style="font-size: 2.4rem;">
                        <span>Nội dung</span>
                    </div>

                    <div class="content-fight" style="font-size: 2.25rem;">
                        <p>Kata cá nhân nam trên 16 tuổi</p>
                        <p>Kata đồng đội nam trên 16 tuổi</p>
                        <p>Kata đồng đội hỗn hợp trên 16 tuổi</p>
                    </div>

                    <div class="date" style="font-size: 1.6rem;">
                        Hà nội, ngày 11 tháng 08 năm 2019
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')

<script>
    var fileName = 'TTD-';
    var loadFile = function(event) {
        var files = event.target.files;
        $('input[name="logo[]"]').next().after().text('Đã chọn ' + files.length + ' ảnh');
        $('#output-logo').html('');
        $('.logo-preview').html('');
        for (var i = 0; i < files.length; i++) {
            $('#output-logo').append('<div class="img-thumbnail img-upload"> <img src="' + URL.createObjectURL(files[i]) + '"></div>');
            $('.logo-preview').append('<img src="' + URL.createObjectURL(files[i]) + '">');
        };
    };

    $('input[name="tourament"]').keyup(function() {
        $('.tourament-name').html($(this).val().replace("/n", "<br>"));
    });

    $("#students-selector").on('change', function() {
        axios.post("{{ route('reports.info-student') }}", {
                id: this.value,
            })
            .then(response => {
                var data = response.data;
                var year = data.birthday.substring(0, data.birthday.search('-'));
                var sex = 'Khác';
                fileName = 'TTD-' + data.name;
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
                $('.img-card img').attr('src', "{{ config('app')['url'] . '/storage/' }}" + data.image);
                $('.student-name').text(data.name);
                $('.info-date').html('<span style="margin-right: 10px">Năm sinh: ' + year + '</span><span>Giới tính: ' + sex + '</span>');
            });
    });

    $('input[name="dojo-name"]').keyup(function() {
        $('.dojo-name').text($(this).val());
    });

    $('input[name="info-weight"]').keyup(function() {
        $('.info-weight').text('Hạng cân: ' + $(this).val());
    });

    $('input[name="date"]').on('change', function() {
        var year = $(this).val().substring(0, 4);
        var month = $(this).val().substring(5, 7);
        var date = $(this).val().substring(8, 10);
        $('.date').text('Hà nội, ngày ' + date + ' tháng ' + month + ' năm ' + year);
    });

    var divCount = $('div.clonedInput').length;
    var contents = [];

    function createClone() {
        axios.post("{{ route('reports.content-fields') }}", {
                divCount: ++divCount,
            })
            .then(response => {
                $('.add-field').append(response.data);
                $('#keyword' + divCount).on('change', function() {
                    contents = $('input[name="keywords[]"]');
                    $('.content-fight').html('');
                    for (var i = 0; i < contents.length; i++) {
                        $('.content-fight').append('<p>' + contents[i].value + '</p>');
                    }
                });
            });
    }

    function removedClone(id) {
        $(id).remove();
        contents = $('input[name="keywords[]"]');
        $('.content-fight').html('');
        for (var i = 0; i < contents.length; i++) {
            $('.content-fight').append('<p>' + contents[i].value + '</p>');
        }
    }

    $('input[name="keywords[]"]').on('change', function() {
        contents = $(this);
        $('.content-fight').html('');
        for (var i = 0; i < contents.length; i++) {
            $('.content-fight').append('<p>' + contents[i].value + '</p>');
        }
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
                link.download = fileName + '.jpeg';
                link.href = dataUrl;
                link.click();
            });
    });
</script>
@stop