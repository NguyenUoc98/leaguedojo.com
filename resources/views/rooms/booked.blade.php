<div class="col-lg-4 col-md-6 mb-3">
    <div class="single-blog-post p-2 d-flex style-3 box-shadow" style="border:1px dashed black;border-radius: 10px;height: 100%;">
        <div class="post-thumbnail text-center">
            <img src="/img/core-img/room-icon.png">
            @php
            $color = \Arr::get(\App\Models\BookRoom::$methodColors, $room->pivot->confirmed, 'grey');
            @endphp
            <div class="bg-{{ $color }} mt-2 text-white" style="padding: 1px 5px;border-radius: 50px;">
                {{ \Arr::get(\App\Models\BookRoom::$methodTexts, $room->pivot->confirmed, 'grey') }}
            </div>
        </div>
        <div class="post-content my-0">
            <span class="post-title" style="color: black;">{{ $room->name }}</span>
            <div class="post-meta">
                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $room->address }} </span>
            </div>

            <div class="post-meta">
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    {{ \Carbon\Carbon::parse($room->pivot->date, 'Asia/Ho_Chi_Minh')->format('d/m/Y') }}
                </span>
            </div>

            <div class="post-meta">
                <span>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ \Carbon\Carbon::parse($room->pivot->start_at)->format('H:i') . ' - ' . \Carbon\Carbon::parse($room->pivot->end_at)->format('H:i') }}
                </span>
            </div>

            @if(!is_null($room->pivot->reason_reject))
            <div class="post-meta">
                <span>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    Lý do: {{ $room->pivot->reason_reject }}
                </span>
            </div>
            @endif

            @if( $room->pivot->confirmed != 'REJECTED')
            <a id="cancel{{ $room->pivot->id }}" class="btn bg-red mt-2 text-white" style="padding: 1px 10px; border-radius: 50px;position: absolute;bottom: 8px;right: 10px;font-size: 13px;">
                Hủy
            </a>
            <script>
                $(document).ready(function() {
                    $("#cancel{{ $room->pivot->id }}").on('click', function(e) {
                        $('#delete_form')[0].action = "{{ route('rooms.cancel-book' , '__id') }}".replace('__id', '{{ $room->pivot->id }}');
                        $('#delete_modal').modal('show');
                    });
                });
            </script>
            @endif

        </div>
    </div>
</div>