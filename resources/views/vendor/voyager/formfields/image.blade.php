@if(isset($dataTypeContent->{$row->field}))
<div data-field-name="{{ $row->field }}">
    <a href="#" class="voyager-x remove-single-image" style="position:absolute;"></a>
    <img class="img-thumbnail" src="@if( !filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $dataTypeContent->{$row->field} ) }}@else{{ $dataTypeContent->{$row->field} }}@endif" data-file-name="{{ $dataTypeContent->{$row->field} }}" data-id="{{ $dataTypeContent->getKey() }}" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
</div>
@endif
<div id="output-{{ $row->field }}"></div>
<label class="custom-file">
    <input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif
        class="custom-file-input"
        type="file" name="{{ $row->field }}" accept="image/*" onchange="loadFile(event)">
    <span class="custom-file-control form-control-file"></span>
</label>

<script>
    var loadFile = function(event) {
        $('input[name="{{ $row->field }}"]').next().after().text($('input[name="{{ $row->field }}"]').val().split('\\').slice(-1)[0]);

        var files = event.target.files;
        $('#output-{{ $row->field }}').html('');
        for (var i = 0; i < files.length; i++) {
            $('#output-{{ $row->field }}').append('<div class="img-thumbnail img-upload pull-left"> <img src="' + URL.createObjectURL(files[i]) + '" ></div>');
        };
    };
</script>