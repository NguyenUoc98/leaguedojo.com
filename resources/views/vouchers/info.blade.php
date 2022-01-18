<div class="bg-white border rounded-lg px-2 py-4 grid grid-cols-2 shadow-md mt-4">
    <div class="col-span-2 lg:col-span-1 lg:border-r px-2 mb-2">
        <img src="{{ Voyager::image($voucher->image) }}" alt="">
        <p class="font-bold text-lg mt-4">Nội dung:</p>
        <p>{{ str_replace('\r\n', '</br>', $voucher->note) }}</p>
    </div>
    <div class="col-span-2 lg:col-span-1">
        <div class="grid grid-cols-2 gap-4 lg:px-4 px-2">
            <div>
                <b class="font-bold">Mã: </b>
                <span> {{ $voucher->code }}</span>
            </div>
            <div>
                <b class="font-bold">Mức ưu đãi: </b>
                <span> {{ $voucher->percent }}%</span>
            </div>
            <div>
                <p class="font-bold">Số tháng HP tối thiểu: </p>
                <span> {{ $voucher->month_limit }} tháng</span>
            </div>
            <div>
                <p class="font-bold">Mức thưởng tối đa: </p>
                <span> {{ number_format($voucher->max_price, 0, '', ' ') }}VNĐ </span>
            </div>
            <div class="col-span-2">
                <p class="font-bold">Cơ sở áp dụng: </p>
                <ul class="ml-8">
                    @foreach($voucher->dojos as $dojo)
                        <li class="list-disc list-inline">{{ $dojo->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mt-3 text-right">
            <button id="btn-submit-{{$voucher->id}}"
                    class="px-14 py-2 text-white bg-primary hover:bg-primary-darker rounded-lg mt-4 mr-2">
                Thu thập
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#btn-submit-{{$voucher->id}}').on('click', function () {
            $('.loader').removeClass('hidden');
            axios.post("{{ route('vouchers.getVoucher') }}", {
                voucher_id: '{{ $voucher->id }}',
            })
                .then(response => {
                    $('.loader').addClass('hidden');
                    if (response.data.error) {
                        showError(response.data.error);
                    } else {
                        showSuccess('Lấy mã thành công!');
                        $('.no-voucher').addClass('hidden');
                        $('.list-voucher').append(response.data);
                    }
                })
                .catch(error => {
                    $('.loader').addClass('hidden');
                    // console.log(error);
                    var errors = error.response.data.errors;
                    var message = '';
                    jQuery.each(errors, function (key, value) {
                        value.forEach(function (error) {
                            message += error + '<br>';
                        });
                    });
                    showError(message);
                })
        });
    });
</script>
