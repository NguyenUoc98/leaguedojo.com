@extends('layouts.master')
@section('page_title', 'Cơ sở tập luyện')

@section('content')
    {{ Breadcrumbs::render('co-so-tap-luyen') }}
    <h1 class="font-bold text-2xl my-4">Các cơ sở tập luyện</h1>
    <div class="grid md:grid-cols-3 grid-cols-1 gap-8">
        @foreach($dojos as $dojo)
            <a class="relative rounded-lg overflow-hidden"
               href="{{ route('dojos.show', $dojo->slug) }}"
               title="{{ $dojo->name }}">
                @php
                    $images = json_decode($dojo->image);
                @endphp
                <img class="w-full h-96 object-cover rounded-lg"
                     src="{{ Voyager::image($images[0]) }}" alt="{{ $dojo->name }}">
                <div class="absolute backdrop-blur-md backdrop-filter bg-opacity-50 bg-white bottom-0 p-4 rounded-bl-lg rounded-tr-lg shadow-top space-y-3 w-4/5
                                transition transform duration-300 ease-in-out lg:hover:bg-white lg:hover:shadow-full">
                    <div class="flex items-center">
                        @if($dojo->logo)
                            <img class="w-10 h-10 mr-2 inline rounded-full" alt="{{ $dojo->name }}"
                                 src="{{ Voyager::image($dojo->thumbnail('cropped', 'logo')) }}">
                        @endif
                        <span
                            class="font-semibold md:leading-6 leading-5 md:text-lg text-black">{{ $dojo->name }}</span>
                    </div>
                    <p class="text-black text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $dojo->address }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
