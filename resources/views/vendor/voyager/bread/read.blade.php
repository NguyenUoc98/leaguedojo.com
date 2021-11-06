@php
    $formFields = [];
    if(in_array("App\Traits\FormLayoutTrait", class_uses($dataTypeContent))) {
        $formFields = $dataTypeContent->formFields();
    }
@endphp

@extends('voyager::master')

@section('page_title', 'Thông tin '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <link rel="stylesheet" href="/css/slide.css">
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

        @can('confirm', $dataTypeContent)
            @if($dataTypeContent->confirmed == 'WAIT')
            <button class="btn btn-primary" id="btn-confirm">
                <span class="voyager-check"></span>&nbsp;
                Xác nhận
            </button>

            <button class="btn btn-danger" id="btn-reject">
                <span class="voyager-x"></span>&nbsp;
                Từ chối
            </button>
            @endif
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')

    <div class="sync-loader" style="display:none">
        <img src="/admin/voyager-assets?path=images%2Flogo-icon.png" alt="Voyager Loader">
        <p>ĐANG THỰC HIỆN ...</p>
    </div>

    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- form start -->
                @if(!empty($formFields))
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
                                        @elseif($row->type == "image")
                                            <img class="img-responsive"
                                                src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                                        @elseif($row->type == 'multiple_images')
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
                                        @elseif($row->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                                        @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options') &&
                                                !empty($row->details->options->{$dataTypeContent->{$row->field}})
                                        )
                                            <?php echo $row->details->options->{$dataTypeContent->{$row->field}};?>
                                        @elseif($row->type == 'select_multiple')
                                            @if(property_exists($row->details, 'relationship'))

                                                @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                                    {{ $item->{$row->field}  }}
                                                @endforeach

                                            @elseif(property_exists($row->details, 'options'))
                                                @if (!empty(json_decode($dataTypeContent->{$row->field})))
                                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                                        @if (@$row->details->options->{$item})
                                                            {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{ __('voyager::generic.none') }}
                                                @endif
                                            @endif
                                        @elseif($row->type == 'date' || $row->type == 'timestamp')
                                            @if ( property_exists($row->details, 'format') && !is_null($dataTypeContent->{$row->field}) )
                                                {{ \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) }}
                                            @else
                                                {{ $dataTypeContent->{$row->field} }}
                                            @endif
                                        @elseif($row->type == 'checkbox')
                                            @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                @if($dataTypeContent->{$row->field})
                                                <span class="label label-info">{{ $row->details->on }}</span>
                                                @else
                                                <span class="label label-primary">{{ $row->details->off }}</span>
                                                @endif
                                            @else
                                            {{ $dataTypeContent->{$row->field} }}
                                            @endif
                                        @elseif($row->type == 'color')
                                            <span class="badge badge-lg" style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                                        @elseif($row->type == 'coordinates')
                                            @include('voyager::partials.coordinates')
                                        @elseif($row->type == 'rich_text_box')
                                            @include('voyager::multilingual.input-hidden-bread-read')
                                            <p>{!! $dataTypeContent->{$row->field} !!}</p>
                                        @elseif($row->type == 'file')
                                            @if(json_decode($dataTypeContent->{$row->field}))
                                                @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                                        {{ $file->original_name ?: '' }}
                                                    </a>
                                                    <br/>
                                                @endforeach
                                            @else
                                                <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($row->field) ?: '' }}">
                                                    {{ __('voyager::generic.download') }}
                                                </a>
                                            @endif
                                        @elseif($row->type == 'number')
                                            @include('voyager::multilingual.input-hidden-bread-read')
                                            <span>{{ number_format($dataTypeContent->{$row->field}, 0,'','.') }}</span>
                                        @else
                                            @include('voyager::multilingual.input-hidden-bread-read')
                                            <p>{!! str_replace("\r\n", "<br>", $dataTypeContent->{$row->field}) ?? 'Không có nội dung'!!}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach($dataType->readRows as $row)
                        @php
                        if ($dataTypeContent->{$row->field.'_read'}) {
                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                        }
                        @endphp
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">{{ $row->getTranslatedAttribute('display_name') }}</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            @if (isset($row->details->view))
                                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => 'read'])
                            @elseif($row->type == "image")
                                <img class="img-responsive"
                                    src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                            @elseif($row->type == 'multiple_images')
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
                            @elseif($row->type == 'relationship')
                                @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                            @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options') &&
                                    !empty($row->details->options->{$dataTypeContent->{$row->field}})
                            )
                                <?php echo $row->details->options->{$dataTypeContent->{$row->field}};?>
                            @elseif($row->type == 'select_multiple')
                                @if(property_exists($row->details, 'relationship'))

                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                        {{ $item->{$row->field}  }}
                                    @endforeach

                                @elseif(property_exists($row->details, 'options'))
                                    @if (!empty(json_decode($dataTypeContent->{$row->field})))
                                        @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                            @if (@$row->details->options->{$item})
                                                {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ __('voyager::generic.none') }}
                                    @endif
                                @endif
                            @elseif($row->type == 'date' || $row->type == 'timestamp')
                                @if ( property_exists($row->details, 'format') && !is_null($dataTypeContent->{$row->field}) )
                                    {{ \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) }}
                                @else
                                    {{ $dataTypeContent->{$row->field} }}
                                @endif
                            @elseif($row->type == 'checkbox')
                                @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                    @if($dataTypeContent->{$row->field})
                                    <span class="label label-info">{{ $row->details->on }}</span>
                                    @else
                                    <span class="label label-primary">{{ $row->details->off }}</span>
                                    @endif
                                @else
                                {{ $dataTypeContent->{$row->field} }}
                                @endif
                            @elseif($row->type == 'color')
                                <span class="badge badge-lg" style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                            @elseif($row->type == 'coordinates')
                                @include('voyager::partials.coordinates')
                            @elseif($row->type == 'rich_text_box')
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p>{!! $dataTypeContent->{$row->field} !!}</p>
                            @elseif($row->type == 'file')
                                @if(json_decode($dataTypeContent->{$row->field}))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                            {{ $file->original_name ?: '' }}
                                        </a>
                                        <br/>
                                    @endforeach
                                @else
                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($row->field) ?: '' }}">
                                        {{ __('voyager::generic.download') }}
                                    </a>
                                @endif
                            @else
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p>{!! str_replace("\r\n", "<br>", $dataTypeContent->{$row->field}) ?? 'Không có nội dung'!!}</p>
                            @endif
                        </div><!-- panel-body -->
                        @if(!$loop->last)
                            <hr style="margin:0;">
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Single delete modal -->
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
            </div>
        </div>
    </div>

    @can('confirm', $dataTypeContent)
        @if($dataTypeContent->confirmed == 'WAIT')
        <!-- Single reject modal -->
        <div class="modal modal-danger fade" tabindex="-1" id="reject_modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> Bạn có chắc từ chối đơn đăng ký này?</h4>
                    </div>

                    <form action="{{ route('voyager.' . $dataType->slug . '.reject') }}" id="reject_form" method="POST">
                            {{ csrf_field() }}
                        <div class="modal-body">
                            <label class="control-label" for="reason">Lý do từ chối</label>
                            <textarea required rows="4" class="form-control" name="reason" style="resize: none;" placeholder="Lý do từ chối" value=""></textarea>

                            <input type="hidden" class="form-control" name="id" value="{{ $dataTypeContent->id }}">
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Từ chối">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @endif
    @endcan
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif

    @can('confirm', $dataTypeContent)
        @if($dataTypeContent->confirmed == 'WAIT')
        <script>
            $(document).ready(function () {
                // Confirm or reject
                $('#btn-confirm').on('click', function(){
                    $('.sync-loader').show();
                    axios.post("{{ route('voyager.' . $dataType->slug . '.confirm') }}", {
                        "id": "{{$dataTypeContent->id}}",
                    })
                    .then(response => {
                        window.location.href = "{{ route('voyager.' . $dataType->slug . '.index') }}";
                    });;
                });

                $('#btn-reject').on('click', function(){
                    $('#reject_modal').modal('show');
                });
            });
        </script>
        @endif
    @endcan

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
