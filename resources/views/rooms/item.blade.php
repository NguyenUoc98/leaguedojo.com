<div class="col-lg-6 mb-3">
    <div class="single-blog-post p-2 d-flex style-3 box-shadow" id="room{{ $room['id'] }}" style="border:1px dashed black;border-radius: 10px;height: 100%;">
        <div class="post-thumbnail text-center">
            <img src="/img/core-img/room-icon.png">
        </div>
        <div class="post-content my-0">
            <span class="post-title" style="color: black;">{{ $room['name'] }}</span>
            <div class="post-meta">
                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $room['address'] }} </span><br>
                <span><i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian hoạt động: </span>
            </div>

            @php
            $uptimes = json_decode($room['uptimes']);
            @endphp
            @foreach ($uptimes as $uptime)
            <span class="label label-primary">{{ $uptime[0] }}</span> - <span class="label label-danger">{{ $uptime[1] }}</span> |
            @endforeach
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#room{{ $room['id'] }}").on('click', function() {
            $('#room-name').text("{{ $room['name'] }}");
            $('#room-address').text("Địa chỉ: {{ $room['address'] }}");
            var spaceTime = JSON.parse('{!! $room["spaceTime"] !!}');
            var upTime = JSON.parse('{!! $room["uptimes"] !!}');
            var html = "";
            spaceTime.forEach(function(value, index) {
                html += ' <span class="label label-primary">' + value[0] + '</span> - <span class="label label-danger">' + value[1] + '</span> | '
            });
            $('#room-spaceTime').html(html);
            html = "";
            upTime.forEach(function(value, index) {
                html += ' <span class="label label-primary">' + value[0] + '</span> - <span class="label label-danger">' + value[1] + '</span> | '
            });
            $('#room-upTime').html(html);

            $('#start-modal').val($('#start').val());
            $('#end-modal').val($('#end').val());

            $('input[name="room_id"]').val("{{ $room['id'] }}");
            $('input[name="date"]').val($('#date').val());
            $('input[name="space_time"]').val('{!! $room["spaceTime"] !!}');

            $('#room_modal').modal('show');
        });
    });
</script>