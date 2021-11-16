@extends('layouts.master')
@section('page_title', $dojo->name)

@push('css')
    <style>
        #gmap_canvas img {
            max-width: none !important;
            background: none !important
        }
        img {
            display: unset;
            border-radius: 0.5rem!important;
        }
    </style>
@endpush

@section('content')
    @php
        $images = json_decode($dojo->image);
    @endphp

    {{ Breadcrumbs::render('co-so', $dojo) }}
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8">
            <h1 class="font-bold text-2xl my-4">{{ $dojo->name }}</h1>
            <!-- Image Slide -->
            <div class="bg-white rounded-lg p-4 lg:p-10 border">
                @if (!empty($images))
                    <div id="jssor_1" class="relative mx-auto w-full lg:h-lg h-60 overflow-hidden">
                        <div data-u="slides" class="w-full lg:h-lg h-60 overflow-hidden" style="position:relative">
                            @foreach($images as $image)
                                <div>
                                    <img data-u="image" src="{{ Voyager::image($image) }}" alt="{{ $dojo->slug }}"/>
                                </div>
                            @endforeach
                        </div>

                        <!-- Bullet Navigator -->
                        <div data-u="navigator" class="jssorb072 absolute bottom-7"
                             data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                            <div data-u="prototype" class="i">
                                <div data-u="numbertemplate"
                                     class="n text-xs bg-black bg-opacity-60 backdrop-filter backdrop-blur-sm mx-1 rounded-full p-1 px-2"></div>
                            </div>
                        </div>

                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora073 transform-none" data-autocenter="2" data-scale="0.75"
                             data-scale-left="0.75">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 class="absolute backdrop-blur-sm backdrop-filter bg-opacity-30 bg-black h-6 p-1 left-10 rounded-full top-1/2 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora073 transform-none" data-autocenter="2" data-scale="0.75"
                             data-scale-right="0.75">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 class="absolute backdrop-blur-sm backdrop-filter bg-opacity-30 bg-black h-6 p-1 right-10 rounded-full top-1/2 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                @endif

                <p class="font-bold text-xl my-4">Thông tin cơ sở tập luyện</p>
                <table class="items-center w-full border-collapse">
                    <tbody>
                    <tr>
                        <th class="align-middle bg-gray-100 border px-6 py-3 whitespace-nowrap text-left">
                            Địa chỉ
                        </th>
                        <td class="align-middle border p-4 px-6">
                            {{ $dojo->address }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle bg-gray-100 border px-6 py-3 whitespace-nowrap text-left">
                            Buổi tập bắt đầu lúc
                        </th>
                        <td class="align-middle border p-4 px-6">
                            {{ substr($dojo->start_at, 0, -3) }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle bg-gray-100 border px-6 py-3 whitespace-nowrap text-left">
                            Buổi tập kết thúc lúc
                        </th>
                        <td class="align-middle border p-4 px-6">
                            {{ substr($dojo->finish_at, 0, -3) }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle bg-gray-100 border px-6 py-3 whitespace-nowrap text-left">
                            Lịch tập
                        </th>
                        <td class="align-middle border p-4 px-6">
                            {{ implode(', ', array_map(function($value) { return 'Thứ ' . $value; }, json_decode($dojo->schedule, true))) }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle bg-gray-100 border px-6 py-3 whitespace-nowrap text-left">
                            Học phí
                        </th>
                        <td class="align-middle border p-4 px-6">
                            <li>{{ number_format($policy->price, 0, '', '.').'VNĐ/tháng'}}</li>
                            <li>{{ $policy->note }}</li>
                            <li>{{ $policy->policy == 1 ? 'Bảo lưu các tháng đã nộp khi thay đổi mức học phí.' : 'Không bảo lưu các tháng đã nộp khi thay đổi mức học phí.' }}</li>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <p class="font-bold text-xl my-4 mt-10">Giới thiệu về cơ sở tập luyện</p>
                <div>{!! $dojo->description !!}</div>

                <!-- Google Map -->
                <iframe width="100%" class="w-full border-0"
                        src="https://maps.google.com/maps?&hl=vn&q={{ $dojo->address }}&ie=UTF8&z=15&output=embed"
                        height="300" frameborder="0" allowfullscreen>
                </iframe>
                    <a class="btn btn-danger btn-long" style="font-size: 13px"
                       href="{{ route('workout-registrations.create', ['dojo_id' => $dojo->id]) }}">Đăng ký</a>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            @include('layouts.sidebar_widget')
        </div>
    </div>


{{--    <div class="container md-p-0">--}}
{{--        <div class="row justify-content-center mx-0">--}}

{{--            <!-- Other Dojos -->--}}
{{--            <div class="related-post-area bg-white mt-30 mb-30 px-30 pt-30 pb-0 box-shadow">--}}

{{--                <!-- Section Title -->--}}
{{--                <div class="section-heading">--}}
{{--                    <h5>Các khóa học khác</h5>--}}
{{--                </div>--}}
{{--                <div class="trending-now-posts">--}}
{{--                    <div class="trending-post-slides owl-carousel">--}}
{{--                        @foreach($otherDojos as $otherDojo)--}}
{{--                            <div class="single-blog-post style-4 p-15 mb-30 m-1 box-shadow">--}}
{{--                                @php--}}
{{--                                    $images = json_decode($otherDojo->image);--}}
{{--                                @endphp--}}
{{--                                <div class="post-thumbnail thumbnail">--}}
{{--                                    <img src="{{Voyager::image($images[0])}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="post-content">--}}
{{--                                    <h5>{{ $otherDojo->name }}</h5>--}}
{{--                                    <div class="post-meta d-flex">--}}
{{--                                        <span>{{ number_format($otherDojo->tuitionPolicys()->where('date_apply', '<=', \Carbon\Carbon::now()->format('Y-m') . '-01')->first()->price, 0, '', '.') . ' VNĐ/tháng' }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-15 text-center">--}}
{{--                                    <a class="btn btn-long btn-info" style="font-size: 13px"--}}
{{--                                       href="{{ route('dojos.show', $otherDojo->slug) }}">--}}
{{--                                        Chi tiết--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- JS Slider -->
    @push('script')
        <script type="text/javascript" src="{{ asset('js/jssor.slider-27.5.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jssor-slide.js') }}"></script>
    @endpush

@endsection
