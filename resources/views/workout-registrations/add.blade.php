@extends('layouts.master')
@section('page_title','Đăng ký tập luyện')

@section('content')
<link type="text/css" href="/css/argon.css" rel="stylesheet">
<style>
    @media (min-width: 1000px) {
        .basic-info {
            border-right: 1px solid #e9ecef !important;
        }
    }
</style>
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Đăng ký tập luyện</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="pt-md-3">
    <div class="container">
        <div class="row">
            <div class="col-12 px-0">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb mb-0">
                        <a href="{{ route('home') }}" class="mr-2">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>
                        <span> / </span>
                        <a href="#" class="mr-2 ml-2">Đăng ký tập luyện</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container px-0">
        <!-- <div class="section-heading bg-white box-shadow">
            <h5>Đăng ký tập luyện</h5>
        </div> -->
        <form action="{{ route('workout-registrations.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row bg-white box-shadow py-4 p-15 mx-0 mb-4">
                <div class="col-lg-6 basic-info">
                    <h6 class="heading mb-4">Thông tin cơ bản</h6>
                    <div class="row">

                        <!-- Basic Info -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">Họ và tên</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="name" id="input-name" class="form-control pl-2" placeholder="Tên" value="{{ old('name')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-sex">Giới tính</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-transgender" aria-hidden="true"></i></span>
                                    </div>
                                    <select id="input-sex" name="sex" class="form-control pl-2">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        <option value="2">Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="input-cmnd">Số căn cước công dân</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-red border-success"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" name="cmnd" id="input-cmnd" class="form-control pl-2" placeholder="Số cmnd" value="{{ old('cmnd')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-phone">Điện thoại</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-phone " aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="phone" id="input-phone" class="form-control pl-2" placeholder="Điện thoại" value="{{ old('phone')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="input-birthday">Ngày sinh</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-red border-success"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" name="birthday" id="input-birthday" class="form-control datepicker pl-2" placeholder="Ngày sinh" value="{{ old('birthday') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-type">Đối tượng</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-male" aria-hidden="true"></i></span>
                                    </div>
                                    <select id="input-type" name="type" class="form-control pl-2">
                                        <option value="0">Thiếu niên - Nhi đồng</option>
                                        <option value="1">Học sinh</option>
                                        <option value="2">Sinh viên</option>
                                        <option value="3">Người đi làm</option>
                                        <option value="4">Đối tượng khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-height">Chiều cao (cm)</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-child" aria-hidden="true"></i></span>
                                    </div>
                                    <input id="input-height" name="height" class="form-control pl-2" value="{{ old('height')}}" type="number" pattern="[0-9]{10}" min="100" max="200" step="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-weight">Cân nặng (kg)</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-dashboard" aria-hidden="true"></i></span>
                                    </div>
                                    <input id="input-weight" name="weight" class="form-control pl-2" value="{{ old('weight')}}" type="number" pattern="[0-9]{10}" min="20" max="120" step="0.1" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <h6 class="heading mb-4">Thông tin bổ sung</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-dojo">Cơ sở tập luyện</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-building" aria-hidden="true"></i></span>
                                    </div>
                                    <select id="input-dojo" name="dojo_id" class="form-control pl-2">
                                        @foreach(App\Models\Dojo::all() as $dojo)
                                        <option value="{{ $dojo->id }}" @if($dojo->id == $dojo_id) selected @endif>{{ $dojo->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Địa chỉ</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    </div>
                                    <input id="input-address" name="address" class="form-control pl-2" placeholder="Địa chỉ" value="{{ old('address')}}" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Quê quán</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    </div>
                                    <select id="homeland" name="homeland" class="form-control pl-2">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-work-unit">Nơi làm việc</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="work_unit" id="input-work-unit" class="form-control pl-2" placeholder="Nơi làm việc" value="{{ old('Nơi làm việc')}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-fb">Link Facebook</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-red border-success"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                    </div>
                                    <input id="input-fb" name="link_fb" class="form-control pl-2" placeholder="Link Facebook" value="{{ old('link_facebook')}}" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-15">
                    <p>* Để đăng ký tập luyện, bạn hãy điền các thông tin bên trên và nhấn nút đăng ký.<br>
                    * Đội ngũ Admin của chúng tớ sẽ liên hệ với bạn sớm nhất để xác nhận lại thông tin nhé!<br>
                    * Các thông tin này sẽ được sử dụng làm hồ sơ, các chứng chỉ và giấy tờ liên quan nên hãy điền thật chính xác.</p>
                </div>

                <div class="text-right col-12">
                    <button type="submit" class="btn btn-success btn-long" style="border-radius: 6px;">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->

@if (session('message'))
<script type="text/javascript">
    $(document).ready(function() {
        Swal({
            title: "{{ session('status ') }}",
            background: 'url(/img/core-img/notify-bg.png)',
            text: "{{ session('message') }}",
            type: "{{ session('type') }}",
            confirmButtonColor: "{{ session('color') }}"
        });
    })
</script>
@endif

@endsection