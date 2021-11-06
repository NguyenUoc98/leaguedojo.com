

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
                {{ __('voyager::generic.edit') }}
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
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- ### IMAGE ### -->
                <div class="panel panel-bordered panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="voyager-images"></i> {{ __('voyager::post.image') }}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body" style="display:flex;justify-content:center;">
                        @php
                            $row = $dataType->readRows->filter(function ($row, $key) {
                                return $row->field == 'image';
                            })->first();
                            if ($dataTypeContent->{$row->field.'_read'}) {
                                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                            }
                        @endphp
                        @if(count(json_decode($dataTypeContent->{$row->field})) > 1)

                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach(json_decode($dataTypeContent->{$row->field}) as $index=>$file)
                                <li data-target="#myCarousel" data-slide-to="{{ $index }}" @if($index == 0) class="active"> @endif</li>
                                @endforeach
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach(json_decode($dataTypeContent->{$row->field}) as $index=>$file)
                                <div class="item @if($index == 0)active @endif">
                                    <img class="img-responsive" src="{{ filter_var($file, FILTER_VALIDATE_URL) ? $file : Voyager::image($file) }}">
                                </div>
                                @endforeach
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        @else
                        <img class="img-responsive"
                            src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">

                        <!-- ### TITLE ### -->
                        <div class="panel panel-bordered panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="voyager-pen"></i> {{ __('voyager::post.title') }}
                                </h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                @php
                                    $row = $dataType->readRows->filter(function ($row, $key) {
                                        return $row->field == 'title';
                                    })->first();
                                @endphp
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p style="overflow: auto;">{{ $dataTypeContent->title }}</p>
                            </div>
                        </div>

                        <!-- ### EXCERPT ### -->
                        <div class="panel panel-bordered panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">{!! __('voyager::post.excerpt') !!}</h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                @php
                                    $row = $dataType->readRows->filter(function ($row, $key) {
                                        return $row->field == 'excerpt';
                                    })->first();
                                @endphp
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p style="overflow: auto;">{{ $dataTypeContent->excerpt ?? 'Không có nội dung tóm tắt'}}</p>
                            </div>
                        </div>
                        <!-- ### CONTENT ### -->
                        <div class="panel panel-bordered panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="voyager-edit"></i> {{ __('voyager::post.content') }}
                                </h3>
                            </div>
                            <div class="panel-body">
                                {!! $dataTypeContent->body !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <!-- ### DETAILS ### -->
                        <div class="panel panel panel-bordered panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="voyager-tag"></i> {{ __('voyager::post.details') }}</h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                        <div class="panel-heading"
                                            style="border-bottom: 1px solid #FF9800; background-color: #FFCC80; color: #7c4606;">
                                            <h6 class="panel-title"
                                                style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                {{ __('voyager::post.slug') }}
                                            </h6>
                                        </div>
                                        <div class="panel-body" style="padding: 15px 10px 10px;">
                                            <p style="overflow: auto;">{{ $dataTypeContent->slug }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                        <div class="panel-heading"
                                            style="border-bottom: 1px solid #FF9800; background-color: #FFCC80; color: #7c4606;">
                                            <h6 class="panel-title"
                                                style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                {{ __('voyager::post.category') }}
                                            </h6>
                                        </div>
                                        <div class="panel-body" style="padding: 15px 10px 10px;">
                                             @php
                                                $row = $dataType->readRows->filter(function ($row, $key) {
                                                    return $row->field == 'post_belongsto_category_relationship';
                                                })->first();
                                            @endphp
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                        <div class="panel-heading"
                                            style="border-bottom: 1px solid #FF9800; background-color: #FFCC80; color: #7c4606;">
                                            <h6 class="panel-title"
                                                style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                {{ __('voyager::post.status') }}
                                            </h6>
                                        </div>
                                        <div class="panel-body" style="padding: 15px 10px 10px;">
                                            @php
                                                $row = $dataType->readRows->filter(function ($row, $key) {
                                                    return $row->field == 'status';
                                                })->first();
                                            @endphp
                                            @if (!empty($row->details->options->{$dataTypeContent->status}))
                                                <?php echo '<p>'.$row->details->options->{$dataTypeContent->{$row->field}}.'</p>';?>
                                            @else
                                                {{ __('voyager::generic.none') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                        <div class="panel-heading"
                                            style="border-bottom: 1px solid #FF9800; background-color: #FFCC80; color: #7c4606;">
                                            <h6 class="panel-title"
                                                style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                Người viết
                                            </h6>
                                        </div>
                                        <div class="panel-body" style="padding: 15px 10px 10px;">
                                            @php
                                                $row = $dataType->readRows->filter(function ($row, $key) {
                                                    return $row->field == 'post_belongsto_user_relationship';
                                                })->first();
                                            @endphp
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                        <div class="panel-heading"
                                            style="border-bottom: 1px solid #FF9800; background-color: #FFCC80; color: #7c4606;">
                                            <h6 class="panel-title"
                                                style="color: #000; font-size: 15px; padding: 10px 15px 10px 7px;">
                                                Nguồn
                                            </h6>
                                        </div>
                                        <div class="panel-body" style="padding: 15px 10px 10px;">
                                            @include('voyager::multilingual.input-hidden-bread-read')
                                            <p style="overflow: auto;">
                                                {{ $dataTypeContent->source == '' ? 'Không có nguồn' : $dataTypeContent->source}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel panel-bordered" style="border: 1px solid #FF9800; border-radius: 0;">
                                        <div class="panel-body" style="padding: 15px 10px 10px;">
                                            <h6 class="panel-title"
                                                style="color: #000; font-size: 14px; padding: 10px 15px 10px 7px;">
                                                {{ __('voyager::generic.featured') }}
                                                @php
                                                    $row = $dataType->readRows->filter(function ($row, $key) {
                                                        return $row->field == 'featured';
                                                    })->first();
                                                @endphp
                                                @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                    @if($dataTypeContent->{$row->field})
                                                    <span class="label label-info">{{ $row->details->on }}</span>
                                                    @else
                                                    <span class="label label-primary">{{ $row->details->off }}</span>
                                                    @endif
                                                @else
                                                {{ $dataTypeContent->{$row->field} }}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
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

    </script>
@stop
