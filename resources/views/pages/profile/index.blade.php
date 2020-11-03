@extends('layouts.master')
@section('page_title', 'Trang cá nhân')

@section('content')
<link type="text/css" href="/css/argon.css" rel="stylesheet">

<style>
    .card .table td,
    .card .table th {
        padding-right: 1rem;
        padding-left: 1rem;
    }
</style>
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<div class="header pb-5 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(/img/profile/banner.jpg); background-size: cover; background-position: center center;">
    <!-- Mask -->

    <span class="mask bg-gradient-indigo opacity-2"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-12 mb-5">
                <h3 class="display-4 text-white col-12">Xin chào
                    {{ auth()->user()->isStudent() ? $student->last_name . ' ' . $student->name : auth()->user()->name }}</h3>
                <p class="text-white mt-0 mb-5 col-md-9 col-lg-9 col-sm-12">
                    Đây là trang quản lý thông tin cá nhân của bạn. Nơi bạn có thể quản lý toàn bộ thông tin về bạn. Bạn có thể
                    chỉnh sửa nó!</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--7 md-p-0">
    <div class="row">
        <div class="col-lg-5 mb-4 show-info">
            @include('pages.profile._show')
            @if(auth()->user()->isStudent())
            @include('pages.profile._score')
            @endif
        </div>
        <div class="col-lg-7">
            @include('pages.profile._edit_account')
            @if(auth()->user()->isStudent())
            @include('pages.profile._edit_student')
            @include('pages.profile._achievements')
            @include('pages.profile._event')
            @else
            <script>
                $('#edit-user').show();
            </script>
            @endif
        </div>
    </div>
</div>

@endsection