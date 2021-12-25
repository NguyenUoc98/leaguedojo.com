<div class="orther-item">
    <a href="{{ route('videos.show', $other->slug) }}"
       class="bg-white hover:bg-gray-200 border-b border-gray-200 flex p-2 rounded-lg">
        <div>
            <img class="aspect-video object-cover min-w-[9rem] max-w-[9rem] rounded-md"
                 src="{{ $other->thumbnail }}" alt="{{ $other->title }}">
        </div>
        <div class="ml-2">
            <p class="font-bold">{{ \Illuminate\Support\Str::limit($other->title, 70) }}</p>
            <p class="text-gray-500 text-xs">
                <span>
                    {{ $other->view_count }} lượt xem •
                    @if ($other->created_at->isToday())
                        {{ $other->created_at->diffForHumans() }}
                    @elseif ($other->created_at->isYesterday())
                        Hôm qua lúc {{ $other->created_at->format('H:i') }}
                    @else
                        {{ $other->created_at->format('d \\t\\h\\g m, Y') }}
                    @endif
                </span>
            </p>
        </div>
    </a>
</div>
