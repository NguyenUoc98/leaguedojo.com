<style>
    @media (min-width:768px) {
        .btn-collect {
            position: absolute!important;
            bottom: 0;
            right: 15px;
        }
    }
</style>

<div class="row bg-white py-4 px-2 mb-30 mx-1">
    <div class="col-md-6 voucher-img">
        <img src="{{ Voyager::image($voucher->image) }}" alt="">
        </br></br>
        <h5>Nội dung:</h5>
        <p>{{ str_replace('\r\n', '</br>', $voucher->note) }}</p>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6 my-2">
                <b class="field">Mã: </b>
                <span class="field-content"> {{ $voucher->code }}</span>
            </div>
            <div class="col-md-6 my-2">
                <b class="field">Mức ưu đãi: </b>
                <span class="field-content"> {{ $voucher->percent }}%</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 my-2">
                <h5 class="field">Số tháng HP tối thiểu: </h5>
                <span class="field-content"> {{ $voucher->month_limit }} tháng</span>
            </div>
            <div class="col-md-6 my-2">
                <h5 class="field">Mức thưởng tối đa: </h5>
                <span class="field-content"> {{ number_format($voucher->max_price, 0, '', ' ') }}VNĐ</span>
            </div>
        </div>

        <h5 class="field">Cơ sở áp dụng: </h5>
        <ul class="field-content">
            @foreach($voucher->dojos as $dojo)
            <li style="list-style: inside;">{{ $dojo->name }}</li>
            @endforeach
        </ul>

        <div class="mt-3 btn-collect">
            <button id="btn-submit-{{$voucher->id}}" class="btn btn-danger btn-long">Thu thập</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn-submit-{{$voucher->id}}').on('click', function() {
            $('.loader').show();
            axios.post("{{ route('vouchers.getVoucher') }}", {
                        voucher_id: '{{ $voucher->id }}',
                    })
                .then(response => {
                    $('.loader').hide();
                    if (response.data.error) {
                        showError(response.data.error);
                    } else {
                        showSuccess('Lấy mã thành công!');
                        $('.no-voucher').hide();
                        $('.list-voucher').append(response.data);
                    }
                })
                .catch(error => {
                    $('.loader').hide();
                    // console.log(error);
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
    });
</script>