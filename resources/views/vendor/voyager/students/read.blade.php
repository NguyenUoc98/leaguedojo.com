@php

    // Get FormField
    $formFieldsDetails = [];
    $formFieldsScore = [];
    if(in_array("App\Traits\FormLayoutTrait", class_uses($dataTypeContent))) {
        $formFieldsDetails = $dataTypeContent->formFieldsDetails();
        $formFieldsScore = $dataTypeContent->formFieldsScore();
    }
@endphp

@extends('voyager::master')

@section('page_title', 'Thông tin '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> Thông tin {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-primary">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                Chỉnh sửa
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-info restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-download"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan

        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>

        <button id="test" class="btn btn-info">In thẻ</button>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">

                        <!-- ### INFORMATION ### -->
                        <div class="panel panel panel-bordered panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="voyager-activity"></i> Thông tin cá nhân
                                    <span class="panel-desc"> Các thông tin cơ bản về bản thân</span>
                                </h3>
                            </div>
                            <div class="panel-body">
                                @if(!empty($formFieldsDetails))
                                    @foreach($formFieldsDetails as $field)
                                        @php
                                            $row = $dataType->readRows->filter(function ($row, $key) use ($field) {
                                                return $field['name'] === $row->field;
                                            })->first();
                                            if (!$row) {
                                                continue;
                                            }
                                            if ($dataTypeContent->{$row->field.'_read'}) {
                                                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                                            }
                                        @endphp
                                        @if (isset($row->details->legend) && isset($row->details->legend->text))
                                            <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                        @endif
                                        <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $field['grid'] ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            <div class="panel panel-bordered" style="border: 1px solid #1abc9c; border-radius: 0;">
                                                <div class="panel-heading"
                                                    style="border-bottom: 1px solid #1abc9c; background-color: #99e9d9; color: #006551;">
                                                    <h6 class="panel-title"
                                                        style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                        {{ $row->getTranslatedAttribute('display_name') }}
                                                    </h6>
                                                </div>

                                                <div class="panel-body" style="padding: 15px 10px 10px;">
                                                    @if (isset($row->details->view))
                                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => 'read'])
                                                    @elseif($row->type == 'relationship')
                                                        @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                                                    @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options') &&
                                                            !empty($row->details->options->{$dataTypeContent->{$row->field}})
                                                    )
                                                    <?php echo $row->details->options->{$dataTypeContent->{$row->field}};?>
                                                    @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                        @if ( property_exists($row->details, 'format') && !is_null($dataTypeContent->{$row->field}) )
                                                            {{ \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) }}
                                                        @else
                                                            {{ $dataTypeContent->{$row->field} }}
                                                        @endif
                                                    @else
                                                        @include('voyager::multilingual.input-hidden-bread-read')
                                                        <p style="overflow: auto;">{{ $dataTypeContent->{$row->field} }}</p>
                                                    @endif
                                                </div><!-- panel-body -->
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <!-- ### IMAGE ### -->
                        <div class="panel panel-bordered panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="voyager-images"></i> Ảnh thẻ</h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if(isset($dataTypeContent->image))
                                    <img src="{{ filter_var($dataTypeContent->image, FILTER_VALIDATE_URL) ? $dataTypeContent->image : Voyager::image( $dataTypeContent->image ) }}" style="width:100%" />
                                @endif
                            </div>
                        </div>

                        <!-- ### DETAILS ### -->
                        <div class="panel panel panel-bordered panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="voyager-trophy"></i> Thông tin sự nghiệp</h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if(!empty($formFieldsScore))
                                    @foreach($formFieldsScore as $field)
                                        @php
                                            $row = $dataType->readRows->filter(function ($row, $key) use ($field) {
                                                return $field['name'] === $row->field;
                                            })->first();
                                            if (!$row) {
                                                continue;
                                            }
                                            if ($dataTypeContent->{$row->field.'_read'}) {
                                                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                                            }
                                        @endphp
                                        <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $field['grid'] ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                                <div class="panel-heading"
                                                    style="border-bottom: 1px solid #FF9800; background-color: #FFCC80; color: #7c4606;">
                                                    <h6 class="panel-title"
                                                        style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                        {{ $row->getTranslatedAttribute('display_name') }}
                                                    </h6>
                                                </div>

                                                <div class="panel-body" style="padding: 15px 10px 10px;">
                                                    @if (isset($row->details->view))
                                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => 'read'])
                                                    @elseif($row->type == 'relationship')
                                                        @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                                                    @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options') &&
                                                            !empty($row->details->options->{$dataTypeContent->{$row->field}})
                                                    )
                                                    <?php echo $row->details->options->{$dataTypeContent->{$row->field}};?>
                                                    @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                        @if ( property_exists($row->details, 'format') && !is_null($dataTypeContent->{$row->field}) )
                                                            {{ \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) }}
                                                        @else
                                                            {{ $dataTypeContent->{$row->field} }}
                                                        @endif
                                                    @else
                                                        @include('voyager::multilingual.input-hidden-bread-read')
                                                        <p style="overflow: auto;">{{ $dataTypeContent->{$row->field} }}</p>
                                                    @endif
                                                </div><!-- panel-body -->
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

        $('#test').on('click', function() {
            $('.page-content').print();
        });

    </script>
@stop
