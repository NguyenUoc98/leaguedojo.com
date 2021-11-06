<div class="col-md-6 col-lg-4 mb-30">
    <div class="single-blog-post style-4 bg-white">
        <div class="post-thumbnail thumbnail-img p-2 mb-0" style="height: 180px;">
            <img class="box-shadow" src="{{ Voyager::image($voucher->image) }}">
            @if(isset($voucher->pivot->used) && $voucher->pivot->used == 1)
            <div class="tag" style="top:12px">Đã dùng</div>
            @endif
        </div>

        <div class="post-content text-center">
            <h3>{{ $voucher->code }}</h3>
            <div class="row px-4 pb-4">
                <div class="col-6 border-right">
                    <h4 style="color: #1caf5e;">{{ $voucher->percent }}%</h4>
                    <span style="font-size: 14px;">Tối đa: {{ number_format($voucher->max_price, 0, '', ' ') }} VNĐ</span><br>
                    <span style="font-size: 11px;">Khi nộp tối thiểu {{ $voucher->month_limit }} tháng HP</span><br>
                    <small>HSD: {{ \Carbon\Carbon::parse($voucher->expiry_date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') }}</small>
                </div>

                <div class="col-6 text-left border-left">
                    <span style="font-size: 12px;">{{ $voucher->note }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
