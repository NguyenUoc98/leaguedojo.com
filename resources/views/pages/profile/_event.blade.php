<style>
    .imgs-grid {
        max-width: unset !important;
    }
</style>

<!-- Achievements -->
<div class="card mt-4 rounded">
    <div class="card-header bg-orange">
        <div class="row align-items-center">
            <i class="fa fa-trophy mx-2" style="font-size:30px;color:white"></i>
            <h3 class="mb-0 mx-2 text-white">Sự kiện đã tham gia</h3>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around row px-3 event-scroll">
    @forelse($event_confirmed as $event)
    @include('pages.profile._event_item', ['event' => $event])
    @empty
    <p class="bg-white mt-4 p-4 text-center w-100">Không có sự kiện nào</p>
    @endforelse
</div>

@if($event_confirmed->total() > 0)
<!-- status elements -->
<div class="page-load-status text-center">
    <div class="infinite-scroll-request">
        <img height="60px" width="60px" src="/img/core-img/loading.gif">
    </div>
    <p class="infinite-scroll-last mt-3">Đã tải hết nội dung</p>
    <p class="infinite-scroll-error">Không còn gì để load</p>
</div>

<script type="text/javascript">
    // init Infinite Scroll
    $('.event-scroll').infiniteScroll({
        path: function() {
            if (this.loadCount < {{ $event_confirmed->total() / setting('app.event_profile')}}) {
                return '?page=' + (this.loadCount + 1);
            }
        },
        append: '.event-item',
        status: '.page-load-status',
        hideNav: '.pagination',
        scrollThreshold: 200,
    });
</script>
@endif