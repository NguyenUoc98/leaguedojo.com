<div class="clonedInput" id="{{ $varId }}">
    <div class="row" id="clonedInput">
        <div class="col-xs-10" style="margin-bottom:10px">
            <input required type="text" class="form-control" name="keywords[]" id="keyword{{ $id }}" value="{{ $keyword ?? ''}}">
        </div>
        <div class="col-xs-2" style="padding-left:0; margin-bottom:10px">
            <span class="btn btn-danger" name="del_item" onClick="removedClone({{ $varId }});"
                style="margin-top: 0; margin-bottom: 0; border-radius: 50px;padding: 5px 9px;">
                <i class="voyager-x"></i>
            </span>
        </div>
    </div>
</div>
