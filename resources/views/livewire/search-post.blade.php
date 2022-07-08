<div>
    <div class="relative z-0 flex-1 px-2 flex items-center justify-center hidden lg:block w-80">
        <div class="w-full sm:max-w-xs">
            <label for="search" class="sr-only">Tìm kiếm</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                    <!-- Heroicon name: solid/search -->
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <form method="get" action="{{ route('search') }}">
                    <input name="query" wire:model.debounce.500ms="query" wire:click="$set('openSearchResult', true)"
                           class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 sm:text-sm"
                           placeholder="Tìm kiếm" type="search">
                </form>
            </div>
            @if ($openSearchResult)
                <div class="absolute bg-white mt-1 rounded-md border border-gray-300 shadow-md px-4">
                    <div wire:loading class="text-gray-500 text-sm py-2">Đang tìm kiếm...</div>
                    <div wire:loading.remove>
                        @if($posts->isEmpty())
                            <div class="text-gray-500 text-sm py-2">
                                Không có kết quả phù hợp.
                            </div>
                        @else
                            <ul>
                                @foreach($posts as $post)
                                    <li class="py-2 border-b rounded hover:bg-gray-100">
                                        <a class="text-black font-bold whitespace-nowrap"
                                           title="{{ $post->title }}"
                                           href="{{ route('posts.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
