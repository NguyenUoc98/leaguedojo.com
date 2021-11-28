@extends('layouts.master')
@section('page_title', $document->title)
@section('content')
    {{ Breadcrumbs::render('chi-tiet-tai-lieu', $document) }}
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8">
            <h1 class="font-bold text-2xl my-4 md:mb-0 text-center lg:text-left">{{ $document->title }}</h1>

            <div class="items-end justify-between md:flex">
                <p class="text-gray-500">
                    <span>
                        @if ($document->updated_at->isToday())
                            {{ $document->updated_at->diffForHumans() }}
                        @elseif ($document->updated_at->isYesterday())
                            Hôm qua lúc {{ $document->updated_at->format('H:i') }}
                        @else
                            {{ $document->updated_at->format('d \\t\\h\\g m, Y') }}
                        @endif
                    </span>
                    |
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        {{ views($document)->count() }} lượt xem
                    </span>
                    |
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        {{ $document->comments->count() }} bình luận
                    </span>
                </p>

                <a href="{{ route('documents.show', $document->slug).'?download' }}"
                   class="bg-primary px-10 py-2 rounded-md text-white hover:bg-primary-darker hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                    Tải xuống
                </a>
            </div>

            <hr class="my-2">
            <div class="flex justify-between mt-1">
                <span class="font-bold">Nguồn: {{ $document->source }}</span>
                <div class="fb-like" data-href="{{ config('app.url') . '/documents/'.$document->slug }}" data-width=""
                     data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
            </div>
            <iframe class="border md:h-45 h-lg mt-4 rounded-lg shadow w-full"
                    src="{{ route('documents.preview', $document->slug) }}"></iframe>
            <div class="text-center md:text-right mt-4 md:hidden">
                <a href="{{ route('documents.show', $document->slug).'?download' }}"
                   class="bg-primary px-10 py-2 rounded-md text-white hover:bg-primary-darker">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                    Tải xuống
                </a>
            </div>
            <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2 mt-10 mb-4">Thông tin tài liệu</p>
            <p>{!! str_replace("\n", '<br>', $document->description) !!}</p>
            @comments(['model' => $document])
        </div>
        <div class="col-span-12 lg:col-span-4">
            @include('layouts.sidebar_widget')
        </div>
    </div>
@endsection
