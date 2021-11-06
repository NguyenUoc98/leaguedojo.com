<div class="col-md-6 col-lg-4 mb-3">
    <div class="single-blog-post p-2 d-flex style-3 box-shadow" style="border:1px dashed black;border-radius: 10px;height: 100%;">
        <div class="post-thumbnail text-center">
            <div style="min-height:50px">
                <img src="{{ Voyager::image($event->image) }}" class="img-thumbnail" style="min-height: 50px;;object-fit: cover;">
            </div>
            @php    
            $color = \Arr::get(\App\Models\Attend::$methodColors, $event->pivot->confirmed, 'grey');
            @endphp
            <div class="bg-{{ $color }} mt-2 text-white" style="padding: 1px 10px;border-radius: 50px;">
                {{ \Arr::get(\App\Models\Attend::$methodTexts, $event->pivot->confirmed, 'grey') }}
            </div>
        </div>
        <div class="post-content my-0">
            <span class="post-title" style="color: black;">{{ $event->name }}</span>
            <div class="post-meta">
                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $event->address }} </span>
            </div>
            <div class="post-meta">
                <span>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ \Carbon\Carbon::parse($event->date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') . ' ' . \Carbon\Carbon::parse($event->start_at)->format('H:i') . ' - ' . \Carbon\Carbon::parse($event->end_at)->format('H:i') }}
                </span>
            </div>

            <div class="post-meta">
                <span>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    {{ $event->point }}đ
                </span>
            </div>
        </div>
    </div>
</div>