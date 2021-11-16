@if (count($breadcrumbs))
    <ul class="border-l-4 border-primary flex lg:text-base pl-2 text-gray-500 text-sm mb-4">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="inline-flex items-center">
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z">
                        </path>
                    </svg>
                </li>
            @else
                <li class="inline-flex items-center text-primary">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
@endif
