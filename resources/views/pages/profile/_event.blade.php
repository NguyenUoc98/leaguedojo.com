@if($event_confirmed->count() > 0)
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/images-grid.css') }}">
        <style>
            .imgs-grid {
                max-width: unset !important;
            }

            .imgs-grid-modal .modal-inner .modal-image img {
                display: initial !important;
            }
        </style>
    @endpush

    <p class="my-4 border-l-4 border-primary pl-2 font-bold text-2xl">Sự kiện đã tham gia</p>
    <div class="event-scroll">
        @foreach($event_confirmed as $event)
            @include('pages.profile._event_item', ['event' => $event])
        @endforeach

        {{ $event_confirmed->links() }}
    </div>

    <div class="page-load-status text-center">
        <div class="infinite-scroll-request">
            <img height="60px" width="60px" src="{{ asset('img/core-img/loading.gif') }}" class="mx-auto">
        </div>
    </div>

    @push('head-script')
        <script type="text/javascript" src="{{ asset('js/site/infinite-scroll.pkgd.min.js') }}"></script>
    @endpush

    @push('script')
        <script type="application/javascript" src="{{ asset('js/site/images-grid.js') }}" defer></script>
        <script type="text/javascript">
            // init Infinite Scroll
            $('.event-scroll').infiniteScroll({
                path: function() {
                    if (this.loadCount < {{ $event_confirmed->total() / 1 }}) {
                        return '?page=' + (this.loadCount + 1);
                    }
                },
                append: '.event-item',
                status: '.page-load-status',
                hideNav: '.pagination',
                scrollThreshold: 200,
                history: false,
            });
        </script>
    @endpush
@endif
