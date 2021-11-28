<div class="bg-white rounded-lg border relative item-video">
    <div class="overflow-hidden relative rounded-t-lg">
        <img class="h-44 object-cover w-full"
             src="{{ $video->thumbnail }}" alt="{{ $video->title }}">
        <span class="absolute bg-primary px-2 py-1 left-2 rounded-md text-white top-2 shadow-md text-xs">HD</span>
        <span class="absolute bg-gray-700 px-2 py-1 right-2 rounded-md text-white bottom-2 shadow-md text-xs">
            {{ TimeYoutube::duration($video->duration) }}
        </span>
        <a class="h-full w-full absolute top-0 left-0 flex justify-center items-center opacity-0 hover:opacity-100"
           href="{{ route('videos.show', $playlist->videos[0]->slug ?? '') }}">
            <p class="bg-white hover:text-primary-darker rounded-full shadow-full text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 transform w-12" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
            </p>
        </a>
    </div>

    <div class="p-4 space-y-3">
        <a class="font-bold text-black"
           href="{{ route('videos.show', $video->slug) }}">{{ $video->title }}</a>
        <p class="flex text-gray-500 space-x-4">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                {{ $video->view_count }}
            </span>
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                </svg>
                {{ $video->like_count}}
            </span>
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                {{ $video->comment_count }}
            </span>
        </p>
    </div>
</div>


