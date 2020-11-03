<div class="clonedInput col-md-12" id="{{ $varId }}">
    <div class="row" id="clonedInput">
        <div class="col-xs-5">
            <select class="form-control select2" name="kuys[]"id="kuy{{ $id }}">
                <option value="Đai nâu Kyu 1">Kyu 1</option>
                <option value="Đai nâu Kyu 2">Kyu 2</option>
                <option value="Đai nâu Kyu 3">Kyu 3</option>
                <option value="Đai xanh đậm Kyu 4">Kyu 4</option>
                <option value="Đai xanh đậm Kyu 5">Kyu 5</option>
                <option value="Đai xanh lá Kyu 6">Kyu 6</option>
                <option value="Đai xanh nhạt Kyu 7">Kyu 7</option>
                <option value="Đai vàng Kyu 8">Kyu 8</option>
            </select>
        </div>

        <div class="col-xs-5">
            <input required type="number" min="1000" step="1" class="form-control" name="tuitions[]" id="tuition{{ $id }}">
        </div>

        <div class="col-xs-2" style="padding-left:0;">
            <span class="btn btn-danger" name="del_item" onClick="removedClone({{ $varId }});" style="margin-top: 0; margin-bottom: 0; border-radius: 50px;padding: 5px 9px;">
                <i class="voyager-x"></i>
            </span>
        </div>
    </div>
</div>