<div class="clonedInput" id="{{ $varId }}">
    <div class="row" id="clonedInput">
        <div class="col-xs-5">
            <input required type="time" class="form-control" name="start_at[]" id="start_at{{ $id }}" value="{{ $start_at ?? ''}}">
        </div>
        <div class="col-xs-5">
            <input required type="time" class="form-control" name="end_at[]" id="end_at{{ $id }}" value="{{ $end_at ?? ''}}">
        </div>
        <div class="col-xs-1">
            <span class="btn btn-danger" name="del_item" onClick="removedClone({{ $varId }});" style="margin-top: 0; margin-bottom: 0"><i class="voyager-x"></i></span>
        </div>
    </div>
</div>
