@extends('layouts.master')
@section('page_title', 'Mã giảm giá')

@section('content')

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
                    <h2>Mã giảm giá</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}" class="mr-2">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>
                        <span> / </span>
                        <a href="#" class="mr-2 ml-2">Mã giảm giá</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="section-heading bg-white box-shadow">
            <h5>THU THẬP MÃ GIẢM GIÁ</h5>
        </div>

        <div class="row justify-content-center">
            <div class="form-group d-flex">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-white bg-red border-danger"><i class="fa fa-gift"></i></span>
                    </div>
                    <input type="text" name="code" id="input-code" class="form-control pl-2" placeholder="Mã code" value="{{ old('code') }}" required>
                </div>
                <button class="btn btn-danger ml-3 my-1" id="btn-submit" style="border-radius: 50px;">Tìm mã</button>
            </div>
        </div>

        <div class="voucher-info"></div>

        <div class="section-heading bg-white box-shadow">
            <h5>CÁC MÃ ĐANG CÓ ({{ count($voucherCollected) }})</h5>
        </div>

        <div class="row list-voucher">
            @forelse($voucherCollected as $voucher)
                @include('vouchers.info_card', ['voucher' => $voucher])
            @empty
            <p class="text-center no-voucher mx-3 p-30 w-100 bg-white"> Không có mã giảm giá nào </p>
            @endforelse
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->

<script>
    $(document).ready(function() {
        $('#btn-submit').on('click', function() {
            if ($('#input-code').val() != '') {
                $('.loader').show();
                axios.get('vouchers/' + $('#input-code').val(), {})
                    .then(response => {
                        $('.loader').hide();
                        if (response.data.error) {
                            showError(response.data.error);
                        } else {
                            $('.voucher-info').html(response.data);
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
            } else {
                showError('Nhập mã code để lấy mã nhé');
            }

        });
    });
</script>
@endsection
