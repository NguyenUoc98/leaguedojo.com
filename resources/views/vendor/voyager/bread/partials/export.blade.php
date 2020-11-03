<div class="btn-group export">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
        <i class="voyager-download"></i> Xuất
    </button>
    <form action="{{ route('voyager.' . $dataType->slug . '.export') }}" method="post" class="dropdown-menu dropdown-menu-right" style="padding:15px;width:300px;">
        @csrf
        <label class="control-label">Đối tượng</label>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="choose" id="all" value="all" checked>
                <label class="form-check-label" for="all">
                    Tất cả
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input " type="radio" name="choose" id="ids" value="selected">
                <label class="form-check-label" for="ids">
                    Các mục đã chọn
                </label>
                <input type="hidden" name="ids" class="selected_ids">
            </div>
        </div>
        <hr>
        <label class="control-label" for="fields">Các trường</label>
        <div class="form-group">

            @foreach($dataType->rows as $row)
            @if($row->field != 'created_at' && $row->field != 'updated_at' && $row->field != 'deleted_at' && $row->type != 'relationship')
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="fields[{{ $row->field }}]" class="custom-control-input" value="{{ $row->field }}" checked>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">{{ $row->display_name }}</span>
            </label>
            @endif
            @endforeach
        </div>
        <hr>
        <button type="submit" style="width: 100%;" class="btn btn-success">Xuất</button>
    </form>
</div>