@extends('layouts.master')
@section('page_title', 'Mã giảm giá')

@section('content')
    {{ Breadcrumbs::render('ma-giam-gia') }}

    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8">
            <h1 class="font-bold text-2xl my-4">Thu thập mã giảm giá</h1>
            <div class="mx-auto my-2">
                <input
                    class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                    type="text" name="code" id="input-code" placeholder="Mã code"
                    value="{{ old('code') }}" required>
                <div class="text-right">
                    <button id="btn-submit"
                            class="px-14 py-2 text-white bg-primary hover:bg-primary-darker rounded-lg mt-4">
                        Tìm mã
                    </button>
                </div>
            </div>

            <div class="voucher-info"></div>

            <p class="font-bold text-2xl my-4">Các mã giảm giá đang có ({{ count($voucherCollected) }})</p>
            <div class="grid grid-cols-2 gap-4 list-voucher">
                @forelse($voucherCollected as $voucher)
                    @include('vouchers.info_card', ['voucher' => $voucher])
                @empty
                    <p class="text-center no-voucher mx-3 p-30 w-full bg-white"> Không có mã giảm giá nào </p>
                @endforelse
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4 hidden lg:block">
            @include('layouts.sidebar_widget')
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function () {
                $('#btn-submit').on('click', function () {
                    if ($('#input-code').val() != '') {
                        $('.loader').removeClass('hidden');
                        axios.get('ma-giam-gia/' + $('#input-code').val(), {})
                            .then(response => {
                                $('.loader').addClass('hidden');
                                if (response.data.error) {
                                    showError(response.data.error);
                                } else {
                                    $('.voucher-info').html(response.data);
                                }
                            })
                            .catch(error => {
                                $('.loader').addClass('hidden');
                                var errors = error.response.data.errors;
                                var message = '';
                                jQuery.each(errors, function (key, value) {
                                    value.forEach(function (error) {
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
    @endpush
@endsection
