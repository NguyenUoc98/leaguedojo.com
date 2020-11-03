@extends('layouts.master')
@section('page_title', 'Đăng ký chuyển cơ sở')
@section('content')

<link type="text/css" href="/css/argon.css" rel="stylesheet">
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>
<style>
    @media (min-width: 1000px) {
        .basic-info {
            border-right: 1px solid #e9ecef !important;
        }
    }
</style>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Đăng ký chuyển cơ sở</h2>
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
                        <a href="#" class="mr-2 ml-2">Đăng ký chuyển cơ sở</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container px-0">
        <!-- <div class="section-heading bg-white box-shadow">
            <h5>Đăng ký chuyển cơ sở</h5>
        </div> -->

        <form action="{{ route('transfer-dojos.store') }}" method="post">
            @csrf
            <div class="row bg-white box-shadow py-4 p-15 mx-0 mb-4">
                <div class="col-md-6 mb-4">
                    <label class="form-control-label" for="name">Họ và tên</label>
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-white bg-red border-success"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control pl-2" value="{{ Auth::user()->student->name }}" readonly>
                    </div>

                    <label class="form-control-label mt-4" for="current_dojo">Cơ sở hiện tại</label>
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-white bg-red border-success"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" name="current_dojo" class="form-control pl-2" value="{{ Auth::user()->student->dojo->name }}" readonly>
                    </div>

                    <label class="form-control-label mt-4" for="new_dojo">Chuyển đến</label>
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-white bg-red border-success"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                        </div>
                        <select name="new_dojo" class="form-control pl-2">
                            @foreach(App\Models\Dojo::all() as $dojo)
                            @if($dojo->id != Auth::user()->student->dojo->id)
                            <option value="{{ $dojo->id }}">{{ $dojo->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <label class="form-control-label mt-4" for="date_transfer">Tháng chuyển đến</label>
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-white bg-red border-success"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                        <input type="month" name="date_transfer" class="form-control pl-2" id="date_transfer" placeholder="Tháng chuyển đến" value="{{ old('date_transfer') }}" required>
                    </div>

                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-control-label" for="reason">Lý do chuyển(*)</label>
                    <div class="input-group input-group-alternative">
                        <textarea name="reason" id="reason" rows="15" class="form-control pl-2" style="resize: none;border: 1px solid #adb5bd" placeholder="Nhập lý do bạn muốn chuyển cở sở tập luyện khác..." value="{{ old('reason') }}" required></textarea>
                    </div>
                </div>

                <div class="text-right col-12">
                    <button type="submit" class="btn btn-success btn-long" style="border-radius: 6px;">Đăng ký</button>
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

@endsection