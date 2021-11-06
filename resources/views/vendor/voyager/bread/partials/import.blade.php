<div class="btn-group export">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
        <i class="voyager-download"></i> Nhập
    </button>
    <form action="{{ route('voyager.' . $slug . '.import') }}" method="post" class="dropdown-menu dropdown-menu-right" 
        enctype="multipart/form-data" style="padding:15px;min-width:300px;">
        @csrf
        <label class="control-label">Chọn file</label>
        <label class="custom-file">
            <input required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])"
                class="custom-file-input" type="file" name="import-file">
            <span class="custom-file-control form-control-file"></span>
        </label>
        <button type="submit" style="width:100%;" class="btn btn-success">OK</button>
    </form>
</div>