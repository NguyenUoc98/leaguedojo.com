@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered panel-success">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
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
                            <div class="video-info col-md-12"></div>

                            <div class="col-md-12" >
                                <label class="control-label" for="name">Link video (Youtube)</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input required="" type="text" class="form-control" name="link" placeholder="Link video (Youtube)"
                                            value="@if($edit) {{ old('youtubeId', 'https://www.youtube.com/watch?v=' .  $dataTypeContent->youtubeId) }} @endif">
                                    </div>
                                    <div class="text-center">
                                        <a class="btn check-btn btn-info" id="check-yb" style="padding: 4px 15px; margin:0">
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
                                            @if($row->field == 'video_belongsto_playlist_relationship')
                                                <a href="#" id="add_playlist">Thêm danh sách</a>
                                            @endif
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
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
                                @endforeach

                                <div class="form-group col-md-12">
                                    <label class="control-label">Từ khóa</label>
                                    <span onclick="createClone()"><i class="voyager-plus"></i></span>
                                    <div class="row">
                                        @php
                                            $keywords = json_decode($dataTypeContent->keywords);
                                        @endphp
                                        <div class="add-field">
                                            <div class="clonedInput col-md-3" id="keyword_1">
                                                <div class="row">
                                                    <div class="col-xs-10" style="margin-bottom:10px">
                                                        <input required type="text" class="form-control" name="keywords[]" value="{{ $keywords[0] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            @if(!is_null($keywords) && count($keywords) > 1)
                                            @foreach($keywords as $index=>$keyword)
                                            @if($index > 0)
                                            @include('voyager::videos.keyword-fields', 
                                                [
                                                    'id' => $index + 1,
                                                    'varId' => 'keyword_' . ($index + 1),
                                                    'keyword' => $keyword
                                                ])
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @section('submit-buttons')
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary save pull-right" style="margin-top: 20px">
                                        {{ __('voyager::generic.save') }}
                                    </button>
                                </div>
                                @stop
                                @yield('submit-buttons')
                            </div>
                        </div><!-- panel-body -->
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
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
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
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

    <!-- Modal add new playlist -->
    <div class="modal fade modal-info" id="add_playlist_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-play"></i> Thêm mới Playlist</h4>
                </div>

                <div class="modal-body">
                    <label class="control-label" for="name">Tên</label>
                    <input required="" type="text" class="form-control" name="name" placeholder="Tên" value="">
                    <input type="hidden" class="form-control" name="slug">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirm_add">
                        <span class="adding hidden"><span class="voyager-refresh spin"></span> Đang tạo...</span>
                        <span class="add">Thêm mới</span>           
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

        $('#add_playlist').click(function() {
            $('#add_playlist_modal').modal('show');
        });

        // Add new playlist
        $('#confirm_add').click(function() {
            var name = $('#add_playlist_modal input[name="name"]').val();
            if (name != '') {
                $('.alert').addClass('hidden');
                $('.adding').removeClass('hidden');
                $('.add').addClass('hidden');
                axios.post('{{ route('voyager.playlists.store') }}', {
                    name: name,
                    slug: genarateSlug(name),
                    _tagging: 'data',
                })
                .then(response => {
                    $('.add').removeClass('hidden');
                    $('.adding').addClass('hidden');
                    $('#add_playlist_modal').modal('hide');
                    toastr.success('Tạo mới Playlist thành công');
                })
                .catch(error => {
                    $('.add').removeClass('hidden');
                    $('.adding').addClass('hidden');
                    $('#add_playlist_modal').modal('hide');
                    toastr.error("Playlists đã có trong cơ sở dữ liệu");
                    $('.alert').html('<li>Playlists đã có trong cơ sở dữ liệu</li>');
                    $('.alert').removeClass('hidden');
                });
            };
        });

        // Check link video on Youtube
        $('#check-yb').click(function() {
            if ($("input[name='link']").val() != '') {
                $('.signingin').removeClass('hidden');
                $('.signin').addClass('hidden');
                $('.alert').addClass('hidden');
                $('.video-info').html('');

                axios.post('{{ route('videos.check') }}', {
                    url: $("input[name='link']").val(),
                })
                .then(response => {
                    $('.signingin').addClass('hidden');
                    $('.signin').removeClass('hidden');
                    if (response.data == false) {
                        $('.alert').html('<li>Không truy xuất được thông tin video</li>');
                        $('.alert').removeClass('hidden');
                    } else {
                        $('.video-info').html(response.data['view']);
                        var video = response.data['video'];
                        $('input[name="youtubeId"]').val(video.id);
                        $('input[name="title"]').val(video.snippet.title);
                        $('input[name="seo_title"]').val(video.snippet.title);
                        $('input[name="thumbnail"]').val(video.snippet.thumbnails.high.url);
                        $('input[name="duration"]').val(video.contentDetails.duration);
                        $('input[name="description"]').val(video.snippet.description);
                        $('input[name="view_count"]').val(video.statistics.viewCount);
                        $('input[name="like_count"]').val(video.statistics.likeCount);
                        $('input[name="dislike_count"]').val(video.statistics.dislikeCount);
                        $('input[name="comment_count"]').val(video.statistics.commentCount);
                        $('input[name="slug"]').val(genarateSlug(video.snippet.title));
                        $('.panel-body .edit-add').removeClass('hidden');
                    }
                });
            }
        });

        function genarateSlug(str) {
            str = str
                    .toString()
                    .toLowerCase();

                var _slug = '';

                // Replace Char Map
                //
                for (var i=0, l=str.length ; i<l ; i++) {
                    _slug += (map_vietnam()[str.charAt(i)])
                             ? map_vietnam()[str.charAt(i)]
                             : str.charAt(i);
                }

                str = _slug
                .replace(/[^a-z0-9]/g, '-')
                .replace(new RegExp('\\'+'-'+'\\'+'-'+'+', 'g'), '-')
                .replace(new RegExp('^\\'+'-'+'+|\\'+'-'+'+$', 'g'), '');

                return str;
        }

        function map_vietnam() {
            return {
                'ạ': 'a','ả': 'a','ầ': 'a','ấ': 'a','ậ': 'a','ẩ': 'a','ẫ': 'a','ằ': 'a',
                'ắ': 'a','ặ': 'a','ẳ': 'a','ẵ': 'a','ẹ': 'e','ẻ': 'e','ẽ': 'e','ề': 'e',
                'ế': 'e','ệ': 'e','ể': 'e','ễ': 'e','ị': 'i','ỉ': 'i','ọ': 'o','ỏ': 'o',
                'ồ': 'o','ố': 'o','ộ': 'o','ổ': 'o','ỗ': 'o','ờ': 'o','ớ': 'o','ợ': 'o',
                'ở': 'o','ỡ': 'o','ụ': 'u','ủ': 'u','ừ': 'u','ứ': 'u','ự': 'u','ử': 'u',
                'ữ': 'u','ỳ': 'y','ỵ': 'y','ỷ': 'y','ỹ': 'y','Ạ': 'A','Ả': 'A','Ầ': 'A',
                'Ấ': 'A','Ậ': 'A','Ẩ': 'A','Ẫ': 'A','Ằ': 'A','Ắ': 'A','Ặ': 'A','Ẳ': 'A',
                'Ẵ': 'A','Ẹ': 'E','Ẻ': 'E','Ẽ': 'E','Ề': 'E','Ế': 'E','Ệ': 'E','Ể': 'E',
                'Ễ': 'E','Ị': 'I','Ỉ': 'I','Ọ': 'O','Ỏ': 'O','Ồ': 'O','Ố': 'O','Ộ': 'O',
                'Ổ': 'O','Ỗ': 'O','Ờ': 'O','Ớ': 'O','Ợ': 'O','Ở': 'O','Ỡ': 'O','Ụ': 'U',
                'Ủ': 'U','Ừ': 'U','Ứ': 'U','Ự': 'U','Ử': 'U','Ữ': 'U','Ỳ': 'Y','Ỵ': 'Y',
                'đ': 'd','Đ': 'D','Ỷ': 'Y','Ỹ': 'Y','ă': 'a','Ă': 'a','Ư': 'u','Ơ': 'o',
                'ư': 'u','ơ': 'o','à': 'a','á': 'a','â': 'a','ã': 'a','å': 'a','è': 'e',
                'é': 'e','ê': 'e','ì': 'i','í': 'i','ò': 'o','ó': 'o','ô': 'o','õ': 'o',
                'ő': 'o','ù': 'u','ú': 'u','ű': 'u', 'ý': 'y'
            };
        }

        var divCount = $('div.clonedInput').length;
        function createClone() {
            axios.post("{{ route('videos.clone-fields') }}", {
                divCount: ++divCount,
            })
            .then(response => {
                $('.add-field').append(response.data);
            });
        }

        function removedClone(id){
            $(id).remove();
        }
       
    </script>
@stop
