<div class="single-blog-post style-4 bg-white" style="border:1px dashed black;border-radius: 10px; @if(isset($type) && ($type == 'not-sign')) height: 100%; @endif">
    <div class="post-thumbnail thumbnail-img p-2 mb-0 image" @if(isset($type) && ($type == 'not-sign')) style="height: 200px;" @endif>
        <img class="img-thumbnail" src="{{ Voyager::image($event->image) }}">
    </div>

    <div class="post-content text-center p-2">
        <h3>{{ $event->name }}</h3>
        <div class="row px-4">
            <div class="post-meta text-left" style="font-size: 13px;">
                <span>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $event->address }}
                </span>
                <br>
                <span>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ \Carbon\Carbon::parse($event->date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') . ' ' . \Carbon\Carbon::parse($event->start_at)->format('H:i') . ' - ' . \Carbon\Carbon::parse($event->end_at)->format('H:i') }}
                </span>
                <br>
                <span>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    {{ $event->point }}đ
                </span>
                <br>
                @if(isset($type) && ($type == 'not-sign'))
                <a href="{{ route('attends.create', ['id' => $event->id]) }}" class="btn btn-danger mt-2 text-white"
                    style="padding: 2px 20px;border-radius: 50px;position: absolute;bottom: 8px;right: -11px;font-size:13px">
                    Đăng ký
                </a>
                @endif
            </div>
        </div>
    </div>
</div>