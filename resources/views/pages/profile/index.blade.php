@extends('layouts.master')
@section('page_title', 'Trang cá nhân')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
@endpush


@section('carosel')
    <img class="w-full md:h-lg h-60 object-cover object-center"
         src="{{ asset('img/profile/banner.jpg') }}">
@endsection
@section('content')
    <div class="md:flex -mt-14 justify-between items-end mb-4">
        <div class="md:flex md:flex-wrap items-center w-full">
            <img
                class="md:w-1/5 w-1/2 mx-auto -mt-[10.5rem] md:m-0 h-auto rounded-full border-4 md:border-8 border-white shadow-md avatar"
                src="{{ Voyager::image(Auth::user()->avatar) }}">
            <div class="text-center md:text-left md:ml-4 mt-1">
                <p class="font-bold md:text-4xl text-2xl">{{ $user->name }}</p>
                <p class="font-bold md:text-2xl">{{ $user->email }}</p>
                <hr class="my-2">
                @if($user->isStudent())
                    <div class="grid grid-cols-3">
                        <div class="text-center">
                            <p class="font-bold">Đối tượng</p>
                            @switch ($student->type)
                                @case (0)
                                <p class="text-gray-700">Thiếu niên</p>
                                @break@
                                @case (1)
                                <p class="text-gray-700">Học sinh</p>
                                @break
                                @case (2)
                                <p class="text-gray-700">Sinh viên</p>
                                @break
                                @case (3)
                                <p class="text-gray-700">Người đi làm</p>
                                @break
                                @case (4)
                                <p class="text-gray-700">Chưa xác định</p>
                                @break
                            @endswitch
                        </div>
                        <div class="text-center border-l border-r">
                            <p class="font-bold">Tuổi</p>
                            <p class="text-gray-700">
                                {{ getdate()['year'] - getdate(strtotime($student->birthday))['year'] }}
                            </p>
                        </div>
                        <div class="text-center">
                            <p class="font-bold">Trình độ</p>
                            @if((0 < $student->kuy) && ($student->kuy < 11))
                                <p class="text-gray-700">Kyu {{ $student->kuy }}</p>
                            @elseif($student->kuy == 11)
                                <p class="text-gray-700">Nhất đẳng</p>
                            @elseif($student->kuy == 12)
                                <p class="text-gray-700">Nhị đẳng</p>
                            @elseif($student->kuy == 13)
                                <p class="text-gray-700">Tam đẳng</p>
                            @elseif($student->kuy == 14)
                                <p class="text-gray-700">Tứ đẳng</p>
                            @else($student->kuy == 15)
                                <p class="text-gray-700">Ngũ đẳng</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="my-5 text-center md:text-right space-y-2">
            <button id="btn-update-password"
                    class="outline-none bg-primary hover:bg-primary-darker text-white py-2 px-4 font-bold whitespace-nowrap rounded-lg w-full md:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                          clip-rule="evenodd"/>
                </svg>
                Đổi mật khẩu
            </button>
            <button id="btn-update-account"
                    class="outline-none bg-gray-100 hover:bg-gray-200 py-2 px-4 font-bold whitespace-nowrap rounded-lg w-full md:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                </svg>
                Chỉnh sửa tài khoản
            </button>
        </div>

        @include('pages.profile._edit_account')
        @include('pages.profile._edit_password')
    </div>

    @php
        if($errors->any()) {
            $message = '';
            foreach($errors->all() as $error) {
                $message .= $error . '<br>';
            }
        }
    @endphp

    <hr class="hidden my-6 md:block">
    @if($user->isStudent())
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 lg:col-span-4">
                <div class="rounded-lg border p-4">
                    <p class="font-bold text-2xl mb-6 text-center lg:text-left">Giới thiệu</p>
                    <div class="space-y-5">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                      clip-rule="evenodd"/>
                                <path
                                    d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                            </svg>
                            <span> Võ sinh tại <b>{{ $student->work_unit }}</b></span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>Chiều cao <b>{{ $student->height }} (cm)</b></span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>Cân nặng <b>{{ $student->weight }} (kg)</b></span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>Giới tính
                        <b>
                            @if($student->sex == 0)
                                Nam
                            @elseif($student->sex == 1)
                                Nữ
                            @else
                                Khác
                            @endif
                        </b>
                    </span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span>Điện thoại <b>{{ $student->phone }}</b></span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                <path fill-rule="evenodd"
                                      d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>CMND/CCCD <b>{{ $student->cmnd }}</b></span>
                        </p>
                        <p class="flex flex-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span class="w-11/12">Sống tại <b>{{ $student->address }}</b></span>
                        </p>
                        <p class="flex flex-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline text-gray-500 mr-2"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span
                                class="w-11/12">Nhập học vào <b>{{ $student->admission_day->format('d-m-Y') }}</b></span>
                        </p>
                        <p>
                            @if($student->status == 'STUDYING')
                                <span class="text-success mr-2">●</span> <b>Đang tập</b>
                            @elseif($student->status == 'PAUSE')
                                <span class="text-warning mr-2">●</span> <b>Tạm nghỉ</b>
                            @elseif($student->status == 'STOPPED')
                                <span class="text-error mr-2">●</span> <b>Nghỉ tập</b>
                            @else
                                <span class="text-danger mr-2">●</span> <b>Chờ xác nhận</b>
                            @endif
                        </p>
                        <button
                            class="outline-none bg-gray-100 hover:bg-gray-200 py-2 px-4 font-bold whitespace-nowrap rounded-lg w-full">
                            Chỉnh sửa chi tiết
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8">
                @include('pages.profile._score')
                @include('pages.profile._achievements')
                @include('pages.profile._event')
            </div>
        </div>
    @endif

    @push('head-script')
        <script type="application/javascript" src="{{ asset('js/site/croppie.js') }}"></script>
    @endpush
    @push('script')
        <script>
            function closeModal(obj) {
                $(obj).addClass('hidden');
            }
        </script>
        @if(isset($message))
            <script type="text/javascript">
                $(document).ready(function () {
                    showError('{!! $message !!}');
                })
            </script>
        @endif
    @endpush
@endsection
