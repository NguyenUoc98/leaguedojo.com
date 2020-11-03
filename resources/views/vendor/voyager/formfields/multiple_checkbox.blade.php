<br>
<?php $checked = false; ?>
@if(isset($options->options))
    @foreach($options->options as $key => $label)
        @if(isset($dataTypeContent->{$row->field}) || old($row->field))
            @php
                $checkedData = old($row->field, $dataTypeContent->{$row->field});
                $checkedData = is_array($checkedData) ? $checkedData : json_decode($checkedData, true);
                $checked = in_array($key, $checkedData);
            @endphp
        @else
            <?php $checked = isset($options->checked) && $options->checked ? true : false; ?>
        @endif

        <label class="custom-control custom-checkbox">
            <input type="checkbox" name="{{ $row->field }}[{{$key}}]" class="custom-control-input"
                {!! $checked ? 'checked="checked"' : '' !!} value="{{$key}}" />
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">{{$label}}</span>
        </label>
    @endforeach
@endif
