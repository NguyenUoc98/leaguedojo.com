@extends('layouts.master')
@section('page_title', 'Học phí')

@section('content')

<link type="text/css" href="/css/argon.css" rel="stylesheet">
<link type="text/css" href="/css/tail.select-full.css" rel="stylesheet">

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>LỊCH SỬ HỌC PHÍ</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="pt-md-3">
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
                        <a href="#" class="mr-2 ml-2">Học phí</a>
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
        <div class="text-right pr-md-0 pr-2">
            <span class="btn btn-success mb-3 mr-1" id="btn-show-pay-tuition" style="border-radius: 10px; padding: 8px; font-size:13px"><i class="fa fa-plus" aria-hidden="true"></i> Nộp học phí</span>
            <span class="btn btn-success mb-3 mr-1" id="btn-tuition-info" style="border-radius: 10px; padding: 8px; font-size:13px">Thông tin học phí</span>
            <span class="btn btn-danger mb-3" style="padding: 8px; border-radius: 10px;">Số dư:
                {{ number_format($excess_cash, 0, '', ' ') }} VNĐ</span>
        </div>

        <div class="modal fade" id="tuition_info_modal" tabindex="-1" role="dialog" aria-labelledby="roomModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h3 class="modal-title text-white" id="roomModalLabel"><i class="fa fa-money mr-2"></i>Thông tin học phí</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:1">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body" style="font-size: 14px; line-height:2; max-height: 290px;overflow: auto;">
                        <div class="table-responsive">
                            <table class="table table-bordered align-items-center" style="background: #fff;">
                                <thead>
                                    <tr>
                                        <th>Tháng</th>
                                        <th>Cơ sở</th>
                                        <th>Học phí</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($policyInfo as $tuitionInfo)
                                    <tr>
                                        <td class="text-center">
                                            {{ date_create($tuitionInfo->date_apply)->format('m/Y') }}
                                        </td>
                                        <td class="text-center">
                                            {{ $tuitionInfo->dojo->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ number_format($tuitionInfo->price, 0, '', ' ') . 'VNĐ' }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('tuitions.store') }}" id="pay-tuition-form" style="display:none" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <input type="hidden" name="excess_cash" value="{{ $excess_cash }}">
            <input type="hidden" name="total_price">
            <div class="bonus-input"></div>
            <div class="voucher-input"></div>

            <div class="section-heading bg-white box-shadow">
                <h5>Nộp học phí</h5>
            </div>

            <div class="row bg-white box-shadow py-4 p-15 mx-0 mb-4">
                <div class="col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="student_id">Người nộp</label>
                                <div class="input-group input-group-alternative">
                                    <input name="student_name" class="form-control pl-2" style="border: 1px solid #adb5bd " value="{{ $student->name }}" type="text" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-month">Số tháng</label>
                                <div class="input-group input-group-alternative">
                                    <input id="input-month" min="1" max="12" step="any" name="month" class="form-control pl-2" style="border: 1px solid #adb5bd " value="{{ old('month', 1)}}" type="number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 text-center">
                            <span class="btn btn-danger btn-long" id="check-info" style="border-radius: 6px">
                                <span class="checking" style="display:none">Đang kiểm tra...</span>
                                <span class="check">Kiểm tra</span>
                            </span>
                        </div>
                    </div>

                    <div class="info-tuition">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="month_start">Tháng bắt đầu</label>
                                    <div class="input-group input-group-alternative">
                                        <input type="month" class="form-control" id="month_start" name="month_start" placeholder="Tháng bắt đầu" style="border: 1px solid #adb5bd" readonly value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="month_end">Tháng kết thúc</label>
                                    <div class="input-group input-group-alternative">
                                        <input type="month" class="form-control" id="month_end" name="month_end" placeholder="Tháng kết thúc" style="border: 1px solid #adb5bd" readonly value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="total">Cần thanh toán(VNĐ)</label>
                                    <div class="input-group input-group-alternative">
                                        <input type="number" class="form-control" id="total" name="total" required="" step="any" placeholder="Cần thanh toán (VNĐ)" style="border: 1px solid #adb5bd" readonly value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hình thức thanh toán</label>
                                    <div class="input-group input-group-alternative">
                                        <select name="payment" class="form-control pl-2" style="border: 1px solid #adb5bd">
                                            <option>Thanh toán qua ví điện tử Momo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="form-control-label">Mã giảm giá</label>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control" name="vouchers[]" id="voucher-selector" multiple>
                                            @foreach($vouchers as $type=>$listVoucher)
                                            <optgroup label="{{ $type }}">
                                                @foreach($listVoucher as $voucher)
                                                <option value="{{ $voucher->id }}"> {{ $voucher->code }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                                <span class="btn btn-danger w-100" id="apply-voucher" style="border-radius: 6px; font-size: 13px">Áp dụng</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <label class="form-control-label" for="note">Thông tin học phí</label>
                    <div class="input-group input-group-alternative">
                        <textarea name="note" id="note" rows="17" class="form-control pl-2" style="resize: none;border: 1px solid #adb5bd;white-space: pre;" placeholder="Thông tin học phí" value="{{ old('note') }}" required readonly></textarea>
                    </div>
                </div>

                <div class="text-right col-12">
                    <button type="submit" id="btn-pay" class="btn btn-success btn-long" style="border-radius: 6px" disabled>Thanh toán</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-items-center" style="background: #fff;">
                <thead class="thead-danger">
                    <tr>
                        <th class="text-white">Ngày nộp</th>
                        <th class="text-white">Số tháng</th>
                        <th class="text-white">Bắt đầu</th>
                        <th class="text-white">Kết thúc</th>
                        <th class="text-white">Cần thánh toán</th>
                        <th class="text-white">Khách đưa</th>
                        <th class="text-white">Còn dư</th>
                        <th class="text-white">Trả lại</th>
                        <th class="text-white">Người thu</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse($tuitions as $index => $tuition)
                    <tr>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($tuition->created_at, 'Asia/Ho_Chi_Minh')->isoFormat('DD/MM/YYYY HH:mm') }}
                        </td>
                        <td class="text-center">
                            {{ $tuition->month }}
                        </td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($tuition->month_start, 'Asia/Ho_Chi_Minh')->format('m/Y') }}
                        </td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($tuition->month_end, 'Asia/Ho_Chi_Minh')->format('m/Y') }}
                        </td>
                        <td class="text-center">
                            {{ number_format($tuition->total, 0, '', ' ') }} VNĐ
                        </td>
                        <td class="text-center">
                            {{ number_format($tuition->amount, 0, '', ' ') }} VNĐ
                        </td>
                        <td class="text-center">
                            {{ number_format($tuition->excess_cash, 0, '', ' ') }} VNĐ
                        </td>
                        <td class="text-center">
                            {{ number_format($tuition->refunds, 0, '', ' ') }} VNĐ
                        </td>
                        <td class="text-center">
                            {{ $tuition->cashier }}
                        </td>
                    </tr>
                    <tr style="display:none" class="note-{{ 2 * $index + 1 }}">
                        <td colspan="9">
                            {!! str_replace("\r\n", "<br>", $tuition->note) !!}<br>
                            ---------------------------------<br>
                            Hình thức thanh toán: {{ $tuition->type == 0 ? 'Offline' : 'Online' }}<br>
                            @if($tuition->type == 1)
                            Mã giao dịch: {{ $tuition->trans_id }}
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->

<script src="/js/tail.select-full.js"></script>

<script>
    $('#btn-show-pay-tuition').click(function() {
        $('#pay-tuition-form').show();
    });

    $('#btn-tuition-info').click(function() {
        $('#tuition_info_modal').modal('show');
    });

    // $('#btn-pay').click(function() {
    //     Swal({
    //         title: "Thông báo",
    //         background: 'url(/img/core-img/notify-bg.png)',
    //         text: "Chức này đang trong quá trình thử nghiệm và sẽ sớm được triển khai trong thời gian tới.",
    //         type: "info",
    //     });
    // });

    tail.select('#voucher-selector', {
        search: true,
        hideSelected: true,
        hideDisabled: true,
        multiShowCount: false,
        multiContainer: true,
        locale: "vi",
    }).on('change', function() {
        $('#btn-pay').attr('disabled', 'disabled');
    });
</script>

<script>
    var note1;
    var note2;
    var note3;
    var note11;
    var note33;
    var total = $("input[name='total']").val();
    var total_after_apply_voucher;
    var dojo_id;
    var totalPrice;

    $(document).ready(function() {
        $(".table tr").click(function() {
            $('.note-' + ($(this).index() + 1)).slideToggle("slow");
        });

        // Lấy thông tin học phí
        $('#check-info').click(function() {
            $('.checking').css("display", "");
            $('.check').css("display", "none");
            $('#btn-pay').removeAttr('disabled');

            axios.post("{{ route('tuitions.check') }}", {
                    student_id: $("input[name='student_id']").val(),
                    month: $("input[name='month']").val(),
                })
                .then(response => {
                    var data = response.data;
                    note1 = "";
                    note2 = "";
                    note3 = "";
                    total = data.total;
                    dojo_id = data.dojo_id;
                    totalPrice = data.totalPrice;

                    $('.check').css("display", "");
                    $('.checking').css("display", "none");

                    data.note1.forEach(function(item, index) {
                        if (item != "") {
                            note1 += item + '\r\n';
                        }
                    });
                    data.note2.forEach(function(item, index) {
                        if (item != "") {
                            note2 += item + '\r\n';
                        }
                    });
                    data.note3.forEach(function(item, index) {
                        if (item != "") {
                            note3 += item + '\r\n';
                        }
                    });
                    note11 = note1;
                    note33 = note3;
                    $('.bonus-input').html('');
                    $('.info-bonus-input').html('');
                    data.bonus_default.forEach(function(item, index) {
                        $('.bonus-input').append('<input type="hidden" name="bonus_default[]" value="' + item.id + '">');
                    });
                    $("input[name='price']").val(data.price);
                    $("input[name='month_start']").val(data.month_start);
                    $("input[name='month_end']").val(data.month_end);
                    $("input[name='total']").val(total);
                    $("input[name='total_price']").val(totalPrice);
                    $("input[name='note'], textarea").val(note1 + note2 + note3);
                });
        });

        // Áp mã giảm giá
        $('#apply-voucher').click(function() {
            $('#btn-pay').removeAttr('disabled');
            var vouchers = [];
            $.each($("#voucher-selector :selected"), function() {
                vouchers.push($(this).val());
            });

            if (vouchers.length > 0 && vouchers !== undefined) {
                axios.post("{{ route('tuitions.applyVouchers') }}", {
                        vouchers_id: vouchers,
                        dojo_id: dojo_id,
                        month: $("input[name='month']").val(),
                        total: total,
                        totalPrice: totalPrice,
                    })
                    .then(response => {
                        var data = response.data;
                        if (data.check == false) {
                            showError(data.message);
                        } else {
                            total_after_apply_voucher = data.total;
                            note11 = note1;
                            note33 = note3;

                            data.voucherNote1.forEach(function(item, index) {
                                note11 += item + '\r\n';

                            });
                            data.voucherNote2.forEach(function(item, index) {
                                if (item != "") {
                                    note33 += item + '\r\n';
                                }
                            });

                            $('.voucher-input').html('');
                            $('.info-voucher-input').html('');
                            data.vouchers.forEach(function(item, index) {
                                $('.voucher-input').append('<input type="hidden" name="vouchers_apply[]" value="' + item.id + '">');
                            });
                            $("input[name='note'], textarea").val(note11 + note33);
                            $("input[name='total']").val(data.total);
                        }
                    });
            } else {
                $('.voucher-input').html('');
                $('.info-voucher-input').html('');
                $("input[name='total']").val(total);
                $("input[name='note'], textarea").val(note1 + note2 + note3);
            }
        });
    });
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