<div class="p-2 rounded-lg border border-dashed border-cancel">
    <div>
        <img class="@if(isset($type) && ($type == 'not-sign'))h-64 @else h-96 @endif object-cover rounded-lg shadow-lg border-4 border-white w-full mb-4"
             src="{{ Voyager::image($event->image) }}">
    </div>
    <div class="ml-2 w-full">
        <p class="font-bold">{{ $event->name }}</p>
        <p class="text-xs text-gray-700 mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"/>
            </svg>
            {{ $event->address }}
        </p>
        <p class="text-xs text-gray-700 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                      clip-rule="evenodd"/>
            </svg>
            {{ \Carbon\Carbon::parse($event->date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') . ' ' . \Carbon\Carbon::parse($event->start_at)->format('H:i') . ' - ' . \Carbon\Carbon::parse($event->end_at)->format('H:i') }}
        </p>
        <p class="text-xs text-gray-700 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
            {{ $event->point }}đ
        </p>
        @if(isset($type) && ($type == 'not-sign'))
            <div class="mt-2 p-2 text-right">
                <a class="bg-primary hover:bg-primary-darker mt-2 px-10 px-4 py-2 rounded-lg text-md text-white"
                   href="{{ route('attends.create', ['id' => $event->id]) }}">
                    Đăng ký
                </a>
            </div>
        @endif
    </div>
</div>
