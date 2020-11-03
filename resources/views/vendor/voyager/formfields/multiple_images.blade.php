<br>
@if(isset($dataTypeContent->{$row->field}))
    <?php $images = json_decode($dataTypeContent->{$row->field}); ?>
    @if($images != null)
        @foreach($images as $image)
            <div class="img_settings_container" data-field-name="{{ $row->field }}" style="float:left;padding-right:15px;">
                <a href="#" class="voyager-x remove-multi-image" style="position: absolute;"></a>
                <img class="img-thumbnail" src="{{ Voyager::image( $image ) }}" data-file-name="{{ $image }}" data-id="{{ $dataTypeContent->getKey() }}" style="max-width:200px; height:auto; margin-bottom:5px;">
            </div>
        @endforeach
    @endif
@endif
<div id="output-{{ $row->field }}"></div>
<div class="clearfix"></div>
<label class="custom-file">
    <input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif
        class="custom-file-input"
        type="file" name="{{ $row->field }}[]" accept="image/*" multiple onchange="loadFile(event)">
    <span class="custom-file-control form-control-file"></span>
</label>

<script>
    var loadFile = function(event) {
        var files = event.target.files;
        $('input[name="{{ $row->field }}[]"]').next().after().text('Đã chọn ' + files.length + ' tệp');
        $('#output-{{ $row->field }}').html('');
        for (var i = 0; i < files.length; i++) {
            $('#output-{{ $row->field }}').append('<div class="img-thumbnail img-upload"> <img src="' + URL.createObjectURL(files[i]) + '" ></div>');
        };
    };
</script>
