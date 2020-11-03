@extends('layouts.master')
@section('page_title','Đăng ký xác nhận sự kiện')

@section('content')
<link type="text/css" href="/css/argon.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Đăng ký xác nhận sự kiện</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="section-heading bg-white box-shadow mt-30">
            <h5>Đăng ký xác nhận sự kiện</h5>
        </div>

        <form action="{{ route('attends.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row bg-white box-shadow p-4 mx-0 mb-4">
                <div class="col-md-6">
                    <label class="form-control-label">Sự kiện</label>
                    @include('events.not-sign', ['event' => $event])
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-control-label" for="note">Ghi chú</label>
                    <div class="input-group input-group-alternative">
                        <textarea name="note" id="note" rows="5" class="form-control pl-2" style="resize: none;border:1px solid #adb5bd" placeholder="Ghi chú" value="{{ old('note') }}" required></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label class="form-control-label">Ảnh minh chứng</label>
                        <div id="output" class="mb-2"></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" name="image[]" id="image" multiple>
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100" style="border-radius: 6px;">Đăng ký</button>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- ##### Archive Post Area End ##### -->

@if (session('message'))
<script type="text/javascript">
    $(document).ready(function() {
        Swal({
            title: "{{ session('status ') }}",
            background: 'url(/img/core-img/notify-bg.png)',
            text: "{{ session('message') }}",
            type: "{{ session('type') }}",
            confirmButtonColor: "{{ session('color') }}"
        });
    })
</script>
@endif

<script>
    $('#image').change(function(event) {
        var files = event.target.files;
        $('.custom-file-label').text('Đã chọn ' + files.length + ' tệp');
        $('#output').html('');
        for (var i = 0; i < files.length; i++) {
            $('#output').append('<div class="img-thumbnail img-upload pull-left"> <img src="' + URL.createObjectURL(files[i]) + '" ></div>');
        };
    });
</script>

@endsection