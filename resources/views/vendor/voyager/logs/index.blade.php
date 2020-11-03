@extends('voyager::master')

@section('css')

@include('vendor.voyager.logs.styles')

@stop

@section('content')

<div id="gradient_bg"></div>

<div class="container-fluid">
    @include('voyager::alerts')
</div>

<div class="page-content compass container-fluid" style="margin-right:-12px">
    <h2><i class="voyager-logbook"></i> Nhật ký hệ thống</h2>
    <div id="logs" style="background: #fff;padding-bottom: 30px;margin-top: 40px;padding-right: 9px;">
        <div class="col-sm-3 col-md-3 sidebar">
            <div class="list-group">
                @foreach($files as $file)
                <a href="?log={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                    <i class="voyager-file-text"></i> {{$file}}
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-9 col-md-9 table-container" style="overflow: scroll;margin-bottom: 30px;">
            @if ($logs === null)
            <div>
                {{ __('voyager::compass.logs.file_too_big') }}
            </div>
            @else
            <table id="table-log" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('voyager::compass.logs.level') }}</th>
                        <th>{{ __('voyager::compass.logs.context') }}</th>
                        <th>{{ __('voyager::compass.logs.date') }}</th>
                        <th>{{ __('voyager::compass.logs.content') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($logs as $key => $log)
                    <tr data-display="stack{{{$key}}}">
                        <td class="text-{{{$log['level_class']}}} level"><span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                        <td class="text">{{$log['context']}}</td>
                        <td class="date">{{{$log['date']}}}</td>
                        <td class="text">
                            @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}"><span class="glyphicon glyphicon-search"></span></a>@endif
                            {{{$log['text']}}}
                            @if (isset($log['in_file'])) <br />{{{$log['in_file']}}}@endif
                            @if ($log['stack'])
                            <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                            </div>@endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endif

        </div>

        <div class="text-center">
            @if($current_file)
            <a href="?download={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span>
                {{ __('voyager::compass.logs.download_file') }}</a>
            -
            <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> {{ __('voyager::compass.logs.delete_file') }}</a>
            @if(count($files) > 1)
            -
            <a id="delete-all-log" href="?delall=true"><span class="glyphicon glyphicon-trash"></span> {{ __('voyager::compass.logs.delete_all_files') }}</a>
            @endif
            @endif
        </div>
    </div>
</div>

@stop
@section('javascript')

<!-- JS for logs -->
<script>
    $(document).ready(function() {
        $('.table-container tr').on('click', function() {
            $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
            "order": [1, 'desc'],
            "stateSave": true,
            "language": {
                !!json_encode(__('voyager::datatable')) !!
            },
            "stateSaveCallback": function(settings, data) {
                window.localStorage.setItem("datatable", JSON.stringify(data));
            },
            "stateLoadCallback": function(settings) {
                var data = JSON.parse(window.localStorage.getItem("datatable"));
                if (data) data.start = 0;
                return data;
            }
        });

        $('#delete-log, #delete-all-log').click(function() {
            return confirm('{{ __('
                voyager::generic.are_you_sure ') }}');
        });
    });
</script>
@stop