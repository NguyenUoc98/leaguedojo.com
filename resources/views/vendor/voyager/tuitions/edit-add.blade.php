@php
$edit = !is_null($dataTypeContent->getKey());
$add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    @media screen and (max-width: 480px) {

        .panel-body,
        .panel-footer,
        .panel-title {
            padding-right: 5px;
            padding-left: 5px;
        }
    }
</style>

@stop

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
<h1 class="page-title">
    <i class="{{ $dataType->icon }}"></i>
    {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="sync-loader" style="display:none">
    <img src="/admin/voyager-assets?path=images%2Flogo-icon.png" alt="Voyager Loader">
    <p>ĐANG THỰC HIỆN ...</p>
</div>

<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered panel-success">
                <!-- form start -->
                <form role="form" class="form-edit-add" action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}" method="POST" enctype="multipart/form-data">
                    <!-- PUT Method if we are editing -->
                    @if($edit)
                    {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                    {{ csrf_field() }}

                    <div class="panel-body">

                        <div class="alert alert-danger @if(count($errors) == 0) hidden @endif">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="name">Võ sinh</label>
                                    @if($edit)
                                    @php
                                    $query = App\Models\Student::where('id', $dataTypeContent->student_id)->get();
                                    @endphp

                                    @foreach($query as $relationshipData)
                                    <input type="hidden" name="student_id" id="student_id" value="{{ $relationshipData->id }}">
                                    <select class="form-control" disabled>
                                        <option value="{{ $relationshipData->id }}" @if($dataTypeContent->student_id == $relationshipData->id){{ 'selected="selected"' }}@endif>{{ $relationshipData->name . ' (' . $relationshipData->birthday.')' }}</option>
                                    </select>
                                    @endforeach
                                    @else
                                    <select class="form-control select2-ajax" name="student_id" id="students-selector" data-get-items-route="{{ route('students.alone', [
                                                'label' => ['id', 'name', 'birthday'],
                                                'format' => 'id | name (birthday)'
                                                ]) }}">
                                    </select>
                                    @endif
                                </div>

                                <div class="form-group col-sm-3">
                                    <label class="control-label" for="name">Số tháng</label>
                                    <input type="number" class="form-control" name="month" required="" step="any" placeholder="Số tháng" value="{{ old('month', $dataTypeContent->{'month'}) }}">
                                </div>

                                <div class="form-group col-sm-2 text-center">
                                    <a class="btn check-btn btn-info" id="check-info" @if($edit) disabled @endif style="padding: 4px 15px; margin-top:28px">
                                        <span class="signingin hidden"><span class="voyager-refresh spin"></span> Đang kiểm tra...</span>
                                        <span class="signin">Kiểm tra</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Adding / Editing -->
                        <div class="edit-add @if($add) hidden @endif">
                            @php
                            $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            $formFields = [];
                            if(in_array("App\Traits\FormLayoutTrait", class_uses($dataTypeContent))){
                            $formFields = $dataTypeContent->formFields();
                            }
                            @endphp

                            @foreach($formFields as $field)
                            @php
                            $type = $field['type'];
                            @endphp

                            @if($type == 'subView')
                            @include($field['name'], $field['params'])
                            @elseif($type == 'html')
                            {!! $field['content'] !!}
                            @elseif ($type != ':voyager')
                            @php
                            $isEnd = $field['isEnd'];

                            if(!$isEnd){
                            $attributes = isset($field['options']) ? collect($field['options'])->map(function($value, $key) {
                            return "$key='$value'";
                            })->implode(' ') : '';

                            $text = isset($field['text']) ? $field['text'] : '';
                            echo "<$type $attributes>$text";

                                }else{
                                echo "</$type>";
                            }
                            @endphp
                            @else
                            @php
                            $row = $dataTypeRows->filter(function ($row, $key) use ($field) {
                            return $field['name'] === $row->field;
                            })->first();
                            if (!$row) {
                            continue;
                            }
                            $display_options = $row->details->display ?? NULL;
                            if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                            }
                            @endphp
                            @if (isset($row->details->legend) && isset($row->details->legend->text))
                            <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                            @endif

                            <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $field['grid'] ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                {{ $row->slugify }}
                                <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                @if (isset($row->details->view))
                                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                @elseif ($row->type == 'relationship')
                                @include('voyager::formfields.relationship', ['options' => $row->details])
                                @else
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                @if($row->field == 'cashier' && $add)
                                <div class="form-group" style="margin-top:15px">
                                    <label class="control-label" for="name">Voucher</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <select class="form-control select2" name="vouchers[]" id="voucher-selector" multiple>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn btn-warning" id="apply-voucher" style="margin:0">Áp dụng</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endif

                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                @endforeach
                                @if ($errors->has($row->field))
                                @foreach ($errors->get($row->field) as $error)
                                <span class="help-block">{{ $error }}</span>
                                @endforeach
                                @endif
                            </div>
                            @endif
                            @endforeach

                            @section('submit-buttons')
                            <div class="col-md-12" style="margin-top: -15px">
                                @if($add)
                                <a id="btn-pay" class="btn btn-primary save pull-right">
                                    Thanh toán
                                </a>
                                <button id="btn-save" type="submit" class="btn btn-primary save pull-right" style="display: none;">
                                    {{ __('voyager::generic.save') }}
                                </button>
                                @else
                                <button id="btn-save" type="submit" class="btn btn-primary save pull-right">
                                    {{ __('voyager::generic.save') }}
                                </button>
                                @endif
                            </div>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </div><!-- panel-body -->
                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    var params = {};
    var $file;
    var note1;
    var note2;
    var note3;
    var note11;
    var note33;
    var total = $("input[name='total']").val();
    var total_after_apply_voucher;
    var dojo_id;
    var totalPrice = 0;

    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);

            params = {
                slug: '{{ $dataType->slug }}',
                filename: $file.data('file-name'),
                id: $file.data('id'),
                field: $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
        };
    }

    $('document').ready(function() {
        var test = $('input');
        $('.toggleswitch').bootstrapToggle();

        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function(idx, elt) {
            if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            }
        });

        @if($isModelTranslatable)
        $('.side-body').multilingual({
            "editing": true
        });
        @endif

        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function() {
            $.post("{{ route('voyager.'.$dataType->slug.'.media.remove') }}", params, function(response) {
                if (response &&
                    response.data &&
                    response.data.status &&
                    response.data.status == 200) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() {
                        $(this).remove();
                    })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    // Lấy thông tin học phí
    $('#check-info').click(function() {
        if ($("#students-selector option:selected").text() != '') {
            $('.signingin').removeClass('hidden');
            $('.signin').addClass('hidden');

            axios.post("{{ route('tuitions.check') }}", {
                    student_id: $("#students-selector option:selected").val(),
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

                    $('.signingin').addClass('hidden');
                    $('.signin').removeClass('hidden');
                    $('#btn-pay').show();
                    $('#btn-save').hide();

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
                    $("input[name='month_start']").val(data.month_start);
                    $("input[name='month_end']").val(data.month_end);
                    $("input[name='total']").val(total);
                    $("input[name='total_price']").val(totalPrice);
                    $("input[name='status']").val('SUCCESS');
                    $("input[name='note'], textarea").val(note1 + note2 + note3);
                    $('.panel-body .edit-add').removeClass('hidden');
                });
        }
    });

    $('#voucher-selector').on('change', function() {
        $('#btn-pay').show();
        $('#btn-save').hide();
    });

    $("input[name='month']").keyup(function() {
        $('.panel-body .edit-add').addClass('hidden');
    });

    // Áp mã giảm giá
    $('#apply-voucher').click(function() {
        var vouchers = [];
        $.each($("#voucher-selector :selected"), function() {
            vouchers.push($(this).val());
        });

        if (vouchers.length > 0 && vouchers !== undefined) {
            $('.sync-loader').show();
            axios.post("{{ route('tuitions.applyVouchers') }}", {
                    vouchers_id: vouchers,
                    dojo_id: dojo_id,
                    month: $("input[name='month']").val(),
                    total: total,
                    totalPrice: totalPrice,
                })
                .then(response => {
                    $('.sync-loader').hide();
                    var data = response.data;
                    if (data.check == false) {
                        toastr.error(data.message);
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
                        $("input[name='note'], textarea").val(note11 + note33);
                        $("input[name='total']").val(data.total);
                    }
                });
        } else {
            $("input[name='total']").val(total);
            $("input[name='note'], textarea").val(note1 + note2 + note3);
        }
    });

    // Tính tiền dư
    $("input[name='amount']").keyup(function() {
        $('#btn-pay').show();
        $('#btn-save').hide();
    });

    $('#btn-pay').click(function() {
        if ($("input[name='amount']").val() != '') {
            if ($("#voucher-selector :selected").val() == null) {
                $("input[name='excess_cash'").val($("input[name='amount']").val() - total);
                $("input[name='refunds'").val($("input[name='amount']").val() - total);
                var note111 = note1 + note2 + "Khách đưa:                    " + $("input[name='amount']").val() + "VNĐ" + '\r\n';
                note111 += "Còn dư:                          " + $("input[name='excess_cash'").val() + "VNĐ" + '\r\n';
                $("input[name='note'], textarea").val(note111 + note33);
            } else {
                $("input[name='excess_cash'").val($("input[name='amount']").val() - total_after_apply_voucher);
                $("input[name='refunds'").val($("input[name='amount']").val() - total_after_apply_voucher);
                var note111 = note11 + "Khách đưa:                    " + $("input[name='amount']").val() + "VNĐ" + '\r\n';
                note111 += "Còn dư:                          " + $("input[name='excess_cash'").val() + "VNĐ" + '\r\n';
                $("input[name='note'], textarea").val(note111 + note33);
            }
            $('#btn-pay').hide();
            $('#btn-save').show();
        } else {
            toastr.error('Nhập số tiền khách đưa');
        }

    });
</script>

@if($edit)
<script>
    $('document').ready(function() {
        axios.post("{{ route('students.vouchers') }}", {
                "student_id": $("#students-selector").val(),
            })
            .then(response => {
                response.data.forEach(function(item, index) {
                    $('#voucher-selector').append(`<option value="${item.id}"> ${item.code} - ${item.type}</option>`);
                });
            });

        $("input[name='month_start']").prop("readonly", true);
        $("input[name='month_end']").prop("readonly", true);
        $("input[name='amount']").prop("readonly", true);
        $("input[name='month']").prop("readonly", true);
        $("input[name='cashier']").prop("readonly", true);
        $("input[name='cashier']").prop("readonly", true);

    });
</script>

@else
<script>
    // Lấy các voucher của võ sinh
    $("#students-selector").on('change', function() {
        axios.post("{{ route('students.vouchers') }}", {
                "student_id": this.value,
            })
            .then(response => {
                response.data.forEach(function(item, index) {
                    $('#voucher-selector').append(`<option value="${item.id}"> ${item.code} - ${item.type}</option>`);
                });
            });
    });
</script>
@endif

<!-- Custom Loader -->
<script>
    var appContainer = document.querySelector('.app-container'),
        sidebar = appContainer.querySelector('.side-menu');
    if (window.innerWidth > 768 && window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
        $('.sync-loader')[0].style.left = (sidebar.clientWidth / 2) + 'px';
    }
    $('#btn-save').on('click', function() {
        if ($("input[name='cashier']").val() != '') {
            $('.sync-loader').show();
        }
    });
</script>

@stop