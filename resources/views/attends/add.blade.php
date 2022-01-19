@extends('layouts.master')
@section('page_title','Đăng ký xác nhận sự kiện')

@section('content')
    {{ Breadcrumbs::render('dang-ky-su-kien') }}

    <h1 class="font-bold text-2xl my-4 text-center lg:text-left">Đăng ký xác nhận sự kiện</h1>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-8 border rounded-lg p-4 md:p-8" id="form-attend"
          action="{{ route('attends.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            @include('events.not-sign', ['event' => $event])
            <input type="hidden" name="event_id" value="{{ $event->id }}">
        </div>
        <div>
            <label class="font-bold" for="note">Ghi chú</label>
            <textarea class="border rounded-lg p-4 resize-none w-full mb-2"
                      name="note" id="note" rows="5" placeholder="Ghi chú"
                      value="{{ old('note') }}" required></textarea>

            <label class="font-bold" for="note">Ảnh minh chứng</label>
            <div id="output" class="mb-2 grid grid-cols-3 gap-2"></div>
            <div class="custom-file">
                <input
                    class="border p-1 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm
                    file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker w-full mb-4"
                    type="file" accept="image/*" name="image[]" id="image" multiple>
            </div>
            <button type="submit" class="w-full bg-primary rounded-lg outline-none text-white hover:bg-primary-darker py-2">
                Đăng ký
            </button>
        </div>
    </form>
@endsection

@push('script')
    <script>
        $('#image').change(function (event) {
            var files = event.target.files;
            $('.custom-file-label').text('Đã chọn ' + files.length + ' tệp');
            $('#output').html('');
            for (var i = 0; i < files.length; i++) {
                $('#output').append('<img class="rounded border-2 border-white shadow-md w-full h-28 object-cover" src="' + URL.createObjectURL(files[i]) + '" >');
            }
        });
        $("#form-attend").submit(function () {
            $('.loader').removeClass('hidden');
        });
    </script>
@endpush
