@extends('layouts.master')
@section('page_title','Đăng ký tập luyện')

@section('carosel')
    <img src="{{ asset('img/core-img/banner-tuyensinh.png') }}" alt="tuyensinh.png" class="w-full h-auto mt-14">
@endsection
@section('content')
    <div class="-mt-14">
        {{ Breadcrumbs::render('dang-ky-tap-luyen') }}
        <div class="grid md:grid-cols-12 grid-cols-1 gap-8">
            <form class="md:col-span-12 lg:col-span-9" action="{{ route('workout-registrations.store') }}" method="post"
                  enctype="multipart/form-data" id="form-workout-registration">
                @csrf
                <p class="font-bold text-2xl my-4">Thông tin cơ bản</p>
                <ul class="text-gray-500 ml-4 text-sm">
                    <li class="list-disc">Các thông tin có dấu (*) là các thông tin bắt buộc.</li>
                    <li class="list-disc">Để đăng ký tập luyện, bạn hãy điền các thông tin bên dưới và nhấn nút đăng ký.</li>
                    <li class="list-disc">Đội ngũ Admin sẽ liên hệ với bạn sớm nhất để xác nhận lại thông tin.</li>
                    <li class="list-disc">Các thông tin này sẽ được sử dụng làm hồ sơ, các chứng chỉ và giấy tờ liên quan nên hãy điền thật chính xác.</li>
                </ul>
                <div class="w-full mt-4 md:p-8 p-4 rounded-lg border shadow-md bg-white grid md:grid-cols-2 grid-cols-1 gap-x-8 gap-y-4">
                    <div>
                        <p class="font-bold">Họ và tên (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" name="name" id="input-name" required
                            value="{{ old('name')}}" placeholder="Nguyễn Văn A">
                    </div>
                    <div>
                        <p class="font-bold">Giới tính (*)</p>
                        <div class="relative">
                            <select id="input-sex" name="sex"
                                    class="mt-1 block appearance-none bg-white w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-primary">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                                <option value="2">Khác</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">Số CMND/CCCD</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" name="cmnd" id="input-cmnd"
                            value="{{ old('cmnd')}}" placeholder="030096***789">
                    </div>
                    <div>
                        <p class="font-bold">Điện thoại (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" name="phone" id="input-phone" required pattern="[0-9]{10}"
                            value="{{ old('phone')}}" placeholder="0964***789">
                    </div>
                    <div>
                        <p class="font-bold">Ngày sinh (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="date" name="birthday" id="input-birthday" required
                            value="{{ old('birthday')}}" placeholder="0964***789">
                    </div>
                    <div>
                        <p class="font-bold">Đối tượng (*)</p>
                        <div class="relative">
                            <select id="input-type" name="type"
                                    class="mt-1 block appearance-none bg-white w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-primary">
                                <option value="0">Thiếu niên - Nhi đồng</option>
                                <option value="1">Học sinh</option>
                                <option value="2">Sinh viên</option>
                                <option value="3">Người đi làm</option>
                                <option value="4">Đối tượng khác</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">Chiều cao(cm) (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            id="input-height" name="height" placeholder="165"
                            value="{{ old('height')}}" type="number" pattern="[0-9]{10}"
                            min="100" max="200" step="1" required>
                    </div>
                    <div>
                        <p class="font-bold">Cân nặng(kg) (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            id="input-weight" name="weight" placeholder="45.5"
                            value="{{ old('weight')}}" type="number" pattern="[0-9]{10}" min="20"
                            max="120" step="0.1" required>
                    </div>
                </div>

                <p class="font-bold text-2xl my-4">Thông tin bổ sung</p>
                <div class="w-full mt-4 md:p-8 p-4 rounded-lg border shadow-md bg-white grid md:grid-cols-2 grid-cols-1 gap-x-8 gap-y-4">
                    <div>
                        <p class="font-bold">Cơ sở tập luyện (*)</p>
                        <div class="relative">
                            <select id="input-dojo" name="dojo_id"
                                    class="mt-1 block appearance-none bg-white w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-primary">
                                @foreach(App\Models\Dojo::all() as $dojo)
                                    <option value="{{ $dojo->id }}" @if($dojo->id == $dojo_id) selected
                                        @endif>{{ $dojo->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">Email (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" id="input-email" name="email" required
                            value="{{ old('email')}}" placeholder="ext1@gmail.com">
                    </div>
                    <div>
                        <p class="font-bold">Quê quán (*)</p>
                        <div class="relative">
                            <select id="homeland" name="homeland"
                                    class="mt-1 block appearance-none bg-white w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-primary">
                                <option value="An Giang">An Giang</option>
                                <option value="Bà Rịa – Vũng Tàu">Bà Rịa – Vũng Tàu</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hà Nội" selected>Hà Nội</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Long An">Long An</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Phú Yên">Phú Yên</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="Tp.Hồ Chí Minh">Tp.Hồ Chí Minh</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Yên Bái">Yên Bái</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">Nơi làm việc</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" name="work_unit" id="input-work-unit"
                            value="{{ old('work_unit')}}" placeholder="Học viện Nông nghiệp Việt Nam">
                    </div>
                    <div class="md:col-span-2">
                        <p class="font-bold">Địa chỉ (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" id="input-address" name="address" required
                            value="{{ old('address')}}" placeholder="Số nhà, đường, quận, thành phố">
                    </div>
                    <div class="md:col-span-2">
                        <p class="font-bold">Link facebook (*)</p>
                        <input
                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                            type="text" id="input-fb" name="link_fb" required
                            value="{{ old('link_fb')}}" placeholder="https://www.facebook.com/profile.php?id=************">
                    </div>
                </div>
                <div class="col-span-2 md:text-right text-center">
                    <button type="submit" class="px-14 py-2 text-white bg-primary hover:bg-primary-darker rounded-lg mt-4">
                        Đăng ký
                    </button>
                </div>
            </form>
            <div class="md:col-span-3 md:hidden lg:block">
                <img src="{{ asset('img/core-img/backdrop1.png') }}" alt="tuyensinh.png"
                     class="w-full h-auto md:sticky md:top-20">
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        $("#form-workout-registration").submit(function () {
            $('.loader').removeClass('hidden');
        });
    </script>
@endpush
