@extends('layouts.master')
@section('page_title', 'Sự kiện')

@section('content')
    {{ Breadcrumbs::render('su-kien') }}

    <div class="text-right">
        <span class="border border-primary rounded-lg text-primary py-2 px-4">
            {{ 'Điểm tích lũy: ' . $point . 'đ' }}
        </span>
    </div>

    <ul class="flex text-gray-600 leading-10 mt-5">
        <li>
            <a class="px-4 py-2 cursor-pointer border-b-4 border rounded-tl-lg @if(empty($active_tab) || (isset($active_tab) && $active_tab == 'not-sign' )) text-primary border-b-primary @endif"
               id="btn-not-sign">
                Chưa đăng ký
            </a>
        </li>
        <li>
            <a class="px-4 py-2 cursor-pointer border-b-4 border rounded-tr-lg @if($active_tab == 'signed') text-primary border-b-primary @endif"
               id="btn-signed">
                Đã đăng ký
            </a>
        </li>
    </ul>
    <div class="border rounded-b-lg rounded-tr-lg overflow-hidden">
        <div id="not-sign"
             class="p-3 bg-white grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 @if($active_tab != 'not-sign') hidden @endif">
                @forelse($eventNotSign as $event)
                @include('events.not-sign', ['event' => $event, 'type' => 'not-sign'])
            @empty
                <div class="text-center w-full p-10 col-span-3">
                    <p> Không có sự kiện nào </p>
                </div>
            @endforelse
        </div>

        <div id="signed"
             class="p-3 bg-white grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 @if($active_tab != 'signed') hidden @endif">
            @forelse($eventSigneds as $event)
                @include('events.signed', ['event' => $event])
            @empty
                <div class="text-center w-full p-10 col-span-3">
                    <p> Không có sự kiện nào </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        $('#btn-not-sign').click(function () {
            $('#btn-signed').removeClass('text-primary border-b-primary');
            $('#not-sign').removeClass('hidden');
            $('#signed').addClass('hidden');
            $(this).addClass('text-primary border-b-primary');
        });
        $('#btn-signed').click(function () {
            $('#btn-not-sign').removeClass('text-primary border-b-primary');
            $('#signed').removeClass('hidden');
            $('#not-sign').addClass('hidden');
            $(this).addClass('text-primary border-b-primary');
        });
    </script>
@endpush
