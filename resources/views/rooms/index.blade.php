@extends('layouts.master')
@section('page_title', 'Mượn phòng tập')

@section('content')

<style>
    @media (min-width: 768px) {
        .find-room {
            border-right: 1px solid #e9ecef !important;
            padding-left: 0 !important;
        }
    }

    @media (max-width: 767px) {
        .find-room {
            padding: 0 !important;
        }
    }
</style>

<link type="text/css" href="/css/argon.css" rel="stylesheet">
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Mượn phòng tập</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="pt-md-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-12 px-0">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}" class="mr-2">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>
                        <span> / </span>
                        <a href="#" class="mr-2 ml-2">Mượn phòng tập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="page-content container mb-30 p-0">
        <ul class="nav nav-tabs">
            <li> <a data-toggle="tab" href="#book-room" @if(empty($active_tab) || (isset($active_tab) && $active_tab=='book-room' )){!! 'class="active"' !!}@endif>Mượn phòng</a></li>
            <li> <a data-toggle="tab" href="#booked" @if($active_tab=='booked' ){!! 'class="active"' !!}@endif>Đã mượn</a></li>
        </ul>

        <div class="tab-content">
            <div id="book-room" class="p-3 tab-pane fade in @if($active_tab == 'book-room'){!! 'active show' !!}@endif">
                <div class="row px-3">
                    <div class="col-md-4 find-room">
                        <label class="form-control-label" for="date">Ngày</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-red"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="date" id="date" class="form-control datepicker pl-2" placeholder="Ngày" value="{{ old('date', \Carbon\Carbon::now()->format('d-m-Y')) }}" required>
                        </div>

                        <label class="form-control-label mt-3" for="new_dojo">Cơ sở</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-red border-red"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                            </div>
                            <select name="dojo" id="dojo" class="form-control pl-2">
                                @foreach(App\Models\Dojo::all() as $dojo)
                                <option value="{{ $dojo->id }}">{{ $dojo->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-control-label mt-3" for="start">Nhận phòng</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-red"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="time" name="start" id="start" class="form-control pl-2" placeholder="Nhận phòng" value="{{ old('start') }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-control-label mt-3" for="end">Trả phòng</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-red"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="time" name="end" id="end" class="form-control pl-2" placeholder="Trả phòng" value="{{ old('end') }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit" class="btn btn-danger w-100 mt-3" style="border-radius: 6px;">Tìm phòng</button>
                    </div>
                    <div class="col-md-8 list-room mt-3">
                        <div class="d-flex align-items-center justify-content-center h-100" style="min-height:100px;">
                            <span>Không có phòng phù hợp</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="booked" class="p-4 tab-pane fade in @if($active_tab == 'booked'){!! 'active show' !!}@endif">
                <div class="row list-voucher">
                    @forelse($roomBookeds as $roomBooked)
                    @include('rooms.booked', ['room' => $roomBooked])
                    @empty
                    <p class="text-center no-voucher w-100"> Bạn chưa mượn phòng nào </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('rooms.book') }}" method="post">
                @csrf
                <div class="modal-header bg-green">
                    <h4 class="modal-title text-white" id="roomModalLabel">Thông tin phòng tập</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:1">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 14px; line-height:2">
                    <input type="hidden" name="room_id">
                    <input type="hidden" name="date">
                    <input type="hidden" name="space_time">

                    <h3><span id="room-name"></span></h3>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> <span id="room-address"></span><br>
                    <i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian hoạt động: <br>
                    <span id="room-upTime"></span><br>
                    <i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian trống: <br>
                    <span id="room-spaceTime"></span><br>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-control-label mt-3" for="start">Nhận phòng</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                </div>
                                <input type="time" name="start_modal" id="start-modal" class="form-control pl-2" placeholder="Nhận phòng" value="{{ old('start-modal') }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-control-label mt-3" for="end-modal">Trả phòng</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-success border-success"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                </div>
                                <input type="time" name="end_modal" id="end-modal" class="form-control pl-2" placeholder="Trả phòng" value="{{ old('end-modal') }}" required>
                            </div>
                        </div>


                    </div>

                    <label class="form-control-label mt-3" for="note">Ghi chú</label>
                    <div class="input-group input-group-alternative">
                        <textarea name="note" id="note" rows="3" class="form-control border-success pl-2" style="resize: none;border:1px solid" placeholder="Ghi chú" value="{{ old('note') }}" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" style="border-radius: 6px;">Đặt phòng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Single delete modal -->
<div class="modal fade" tabindex="-1" id="delete_modal" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="modal-title  text-white" id="deleteModalLabel">Bạn có chắc chắn muốn hủy mượn phòng này?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:1">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" style="border-radius: 6px;" data-dismiss="modal">Quay lại</button>
                <form action="#" id="delete_form" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger text-white" style="border-radius: 6px;" value="Hủy">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ##### Archive Post Area End ##### -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#submit").on('click', function() {
            $('.loader').show();
            axios.post("{{ route('rooms.find') }}", {
                    date: $('#date').val(),
                    dojo_id: $('#dojo').val(),
                    start_at: $('#start').val(),
                    end_at: $('#end').val(),
                })
                .then(response => {
                    $('.loader').hide();
                    if (response.data.error) {
                        showError(response.data.error);
                    } else {
                        $('.list-room').html(response.data);
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

    })
</script>

@if (session('message'))
<script type="text/javascript">
    $(document).ready(function() {
        Swal({
            title: "{{ session('status') }}",
            background: 'url(/img/core-img/notify-bg.png)',
            text: "{{ session('message') }}",
            type: "{{ session('type') }}",
            confirmButtonColor: "{{ session('color') }}",
        });
    })
</script>
@endif
@endsection