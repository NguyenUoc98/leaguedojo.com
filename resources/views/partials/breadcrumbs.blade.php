@if (count($breadcrumbs))
    <div class="border-l-4 border-primary lg:text-base pl-2 text-gray-500 text-sm mb-4">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <span class="inline-flex items-center">
                    <a href="{{ $breadcrumb->url }}" class="whitespace-nowrap">{{ $breadcrumb->title }}</a>
                    <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z">
                        </path>
                    </svg>
                </span>
            @else
                <span class="inline-flex items-center text-primary">{{ $breadcrumb->title }}</span>
            @endif
        @endforeach
    </div>
@endif
