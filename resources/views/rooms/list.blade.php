@if(!empty($roomWithSpaceTime))
<div class="row">
    @foreach($roomWithSpaceTime as $room)
    @include('rooms.item', ['room' => $room])
    @endforeach
</div>
@else
<div class="d-flex align-items-center justify-content-center h-100" style="min-height:100px;">
    <span>Không có phòng phù hợp</span>
</div>
@endif