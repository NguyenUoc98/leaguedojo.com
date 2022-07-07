@extends('layouts.master')
@section('page_title', 'Kết quả thanh toán')

@section('content')

<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-size: 1rem;
    }
</style>

<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<div class="py-3 px-2 ">
    <div class="col-md-5 col-xs-5" style="margin-left:auto; margin-right:auto">
        <div id="invoice" class="p-4 bg-white" style="max-width: 556px; border: 1px dashed #dee2e6;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mt-2">HÓA ĐƠN NỘP HỌC PHÍ</h2>
                    <div style="font-size:13px">Công ty TNHH Đào Tạo & Phát Triển Thể Chất Việt Nam</div>
                    <div style="font-size:13px">SĐT: 0942332444</div><br>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-6 col-md-6"><b>Ngày: </b>{{ date('d/m/Y',$orderId) }}</div>
                        <div class="col-6 col-md-6"><b>Thời gian: </b>{{ date('H:i:s',$orderId) }}</div>

                    </div>
                    <div class="row">
                        <div class="col-12"><b>Nội dung:</b> {{ $orderInfo }}</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table borderless m-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="background-color: unset">Tháng</th>
                                    <th scope="col" style="background-color: unset">Học phí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $indexMonth = $tuitionInfo['monthStart'];
                                    $month_end = $tuitionInfo['monthEnd'];
                                    $totalPrice = 0;
                                    while ($indexMonth <= $month_end) {
                                        $student = \App\Models\Student::find($tuitionInfo['student_id']);
                                        $transferDojo = $student->transferDojos()->where('confirmed', 'CONFIRMED')->where('date_transfer', '>', $indexMonth . '-01')->first();
                                        $dojo = $transferDojo->currentDojo ?? $student->dojo;
                                        $policy = $dojo->tuitionPolicys()->where('date_apply', '<=', $indexMonth . '-01')->first();

                                        echo '<tr><td class="text-center">' . date_create($indexMonth)->format('m/Y') . '</td>';
                                        echo '<td class="text-center">' . number_format($policy->price, 0, '', '.') . 'VNĐ' . '</td></tr>';
                                        $indexMonth = \Carbon\Carbon::parse($indexMonth, 'Asia/Ho_Chi_Minh')->addMonth()->format('Y-m');
                                        $totalPrice += $policy->price;
                                    }
                                @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <hr style="border: .5px dashed #000">
                    <div class="row">
                        <div class="col-6 col-md-6"><b>Tổng học phí: </b></div>
                        <div class="col-6 col-md-6 text-left"><b>{{ number_format($totalPrice, 0, '', '.') }}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6"><b>Số dư đợt trước: </b></div>
                        <div class="col-6 col-md-6 text-left"><b>-{{ number_format($tuitionInfo['excess_cash'], 0, '', '.') }}</b></div>
                    </div>

                    @if(!is_null(json_decode($tuitionInfo['bonus'])))
                    <div class="row">
                        <div class="col-6 col-md-6"><b>Ưu đãi mặc định: </b></div>
                        @php
                        $bonus_default = json_decode($tuitionInfo['bonus']);
                        $bonus_default = \App\Models\BonusDefault::find($bonus_default);
                        @endphp
                        <div class="col-6 col-md-6 text-left">
                            @foreach ($bonus_default as $bonus)
                            @php
                            $money = $bonus->percent * $totalPrice / 100;
                            $money = $money <= $bonus->max_price ? $money : $bonus->max_price;
                                @endphp
                                <b>-{{ number_format($money, 0, '', '.') . '(' . $bonus->percent . '%)' }}</b><br>
                                @endforeach
                        </div>
                    </div>
                    @endif

                    @if(!is_null(json_decode($tuitionInfo['voucher'])))
                    <div class="row">
                        <div class="col-6 col-md-6"><b>Mã giảm giá: </b></div>
                        @php
                        $vouchers = json_decode($tuitionInfo['voucher']);
                        $vouchers = \App\Models\Voucher::find($vouchers);
                        @endphp
                        <div class="col-6 col-md-6 text-left">
                            @foreach ($vouchers as $voucher)
                            @php
                            $money = $voucher->percent * $totalPrice / 100;
                            $money = $money <= $voucher->max_price ? $money : $voucher->max_price;
                                @endphp
                                <b>-{{ number_format($money, 0, '', '.') . '(' . $voucher->percent . '%)[' . $voucher->code . ']' }}</b><br>
                                @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-6 col-md-6"><b>Tổng: </b></div>
                        <div class="col-6 col-md-6 text-left"><b>{{ number_format($amount, 0, '', '.') }} VNĐ</b></div>
                    </div>
                    <hr style="border: .5px dashed #000">
                    <div style="font-size:12px">
                        @if(!is_null(json_decode($tuitionInfo['bonus'])))
                        @foreach ($bonus_default as $bonus)
                        <li>{{ $bonus->note }}</li>
                        @endforeach
                        @endif

                        @if(!is_null(json_decode($tuitionInfo['voucher'])))
                        @foreach ($vouchers as $voucher)
                        <li>{{ $voucher->note }}</li>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG($transId, 'C128') }}" alt="barcode" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $transId }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12" style="font-size: 13px;">
                    <hr class="section-breakdown">
                    <div>Liên hệ : 0942332444</div>
                    <div>Fanpage: https://www.facebook.com/LEAGUEDOJO</div>
                    <div>Cảm ơn bạn đã tin tưởng và đồng hành cùng chúng tôi!</div>
                    <p>{{ config('app.name') }}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-2 text-center">
        <a class="btn btn-danger" href="{{ route('tuitions.index') }}" style="font-size:14px">Quay lại</a>
        <button class="btn btn-primary print-invoice" style="font-size:14px">In hóa đơn</button>
    </div>
</div>

<script>
    $('.print-invoice').click(function() {
        // var mode = "iframe";
        // var close = mode == "popup";
        // var options = {
        //     mode: mode,
        //     popClose: close
        // };
        // $('#invoice').printArea(options);
        $('.loader').show();
        domtoimage.toJpeg($('#invoice')[0], {
                quality: 1
            })
            .then(function(dataUrl) {
                var link = document.createElement('a');
                link.download = 'Hóa đơn nộp học phí.jpeg';
                link.href = dataUrl;
                link.click();
                $('.loader').hide();
            });
    });
</script>
@endsection
