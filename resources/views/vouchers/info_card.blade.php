<div class="col-span-2 md:col-span-1 border rounded-lg p-4 space-y-2">
    <div class="relative">
        <img class="w-full" src="{{ Voyager::image($voucher->image) }}">
        @if(isset($voucher->pivot->used) && $voucher->pivot->used == 1)
            <div class="absolute bg-primary px-2 py-1 right-3 rounded-full shadow-md text-white text-xs top-3">
                Đã dùng
            </div>
        @endif
    </div>
    <p class="mx-auto font-bold text-lg text-center">{{ $voucher->code }}</p>

    <div class="flex">
        <div class="w-1/2 text-center pr-2 border-r">
            <p class="text-primary font-bold">{{ $voucher->percent }}%</p>
            <p>Tối đa: {{ number_format($voucher->max_price, 0, '', ' ') }} VNĐ</p>
            <p class="text-sm">Khi nộp tối thiểu {{ $voucher->month_limit }} tháng HP</p>
            <small>HSD: {{ \Carbon\Carbon::parse($voucher->expiry_date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') }}</small>
        </div>

        <div class="w-1/2 text-left border-l pl-2">
            <span class="text-xs">{{ $voucher->note }}</span>
        </div>
    </div>
</div>
