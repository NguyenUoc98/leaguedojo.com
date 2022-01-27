<div class="event-item">
    <div class="rounded-lg border p-4 mb-5">
        <div class="grid grid-cols-6 gap-2 md:flex md:flex-wrap">
            <img class="md:w-20 md:h-20 h-auto object-cover border-2 border-gray-200 shadow-md rounded-full"
                 src="{{ Voyager::image($event->image) }}">
            <div class="md:ml-2 col-span-5">
                <p class="font-bold text-base md:text-xl">{{ $event->name }}</p>
                <p class="text-xs md:text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="md:h-5 md:w-5 w-3 h-3 inline"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                              clip-rule="evenodd"/>
                    </svg>
                    {{ $event->address }}
                </p>
                <p class="text-xs md:text-sm  text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="md:h-5 md:w-5 w-3 h-3 inline"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                              clip-rule="evenodd"/>
                    </svg>
                    {{ \Carbon\Carbon::parse($event->date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') . ' ' . \Carbon\Carbon::parse($event->start_at)->format('H:i') . ' - ' . \Carbon\Carbon::parse($event->end_at)->format('H:i') }}
                </p>
            </div>
        </div>
        @if(!is_null($event->pivot->note))
            <div class="my-4">
                {{ $event->pivot->note }}
            </div>
        @endif
        <div id="gallery-{{ $event->id }}" class="my-2"></div>
        @php
            $images = json_decode($event->pivot->image);
            foreach ($images as $index => $image) {
                $images[$index] = Voyager::image($image);
            }
        @endphp
    </div>

    <script>
        $(function () {
            $('#gallery-{{ $event->id }}').imagesGrid({
                images: {!!json_encode($images) !!},
                align: true,
                getViewAllText: function (imgsCount) {
                    return 'Xem thêm'
                }
            });
        });
    </script>
</div>
