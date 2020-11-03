<div class="event-item">
    <div class="d-flex p-3">
        <div class="rounded-circle event-avatar box-shadow">
            <img src="{{ Voyager::image($event->image) }}">
        </div>
        <div>
            <div class="item">
                {{ $event->name }}
            </div>
            <span>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                {{ $event->address }}
            </span><br>
            <span style="font-size:11px;">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                {{ \Carbon\Carbon::parse($event->date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') . ' ' . \Carbon\Carbon::parse($event->start_at)->format('H:i') . ' - ' . \Carbon\Carbon::parse($event->end_at)->format('H:i') }}
            </span>
        </div>
    </div>

    @if(!is_null($event->pivot->note))
    <div class="event-note">
        {{ $event->pivot->note }}
    </div>
    @endif

    <div id="gallery-{{ $event->id }}" class="my-2"></div>
    @php
    $images = json_decode($event->pivot->image);
    foreach ($images as $index=>$image) {
    $images[$index] = Voyager::image($image);
    }
    @endphp
    <script>
        $(function() {
            $('#gallery-{{ $event->id }}').imagesGrid({
                images: {!!json_encode($images) !!},
                align: true,
                getViewAllText: function(imgsCount) {
                    return 'Xem thêm'
                }
            });
        });
    </script>
</div>