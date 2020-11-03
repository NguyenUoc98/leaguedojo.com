<div class="card card-profile rounded mb-4 shadow">

    <!-- Image -->
    <a class="btn btn-secondary box-shadow border-light" href="#edit-user" style="font-size: 11px;line-height: 1;font-weight: 700;position: absolute;right: 4px; top: 4px;">
        Cập nhật tài khoản</a>
    <img src="/img/profile/bg-avatar.jpg" alt="Image placeholder" class="card-img-top">
    <div class="card-profile-image">
        <img src="{{ Voyager::image(auth()->user()->avatar) }}" class="rounded-circle" id="card-profile-image">
        <div style="position: absolute;left: 35%;top: -60px;">
            <h2 class="m-0 text-white">{{ $user->name }}</h2>
            <span class="description text-white">{{ $user->email }}</span>
        </div>
    </div>

    @if(auth()->user()->isStudent())
    <!-- Infomation -->
    <div class="card-body text-center pt-3">
        <div class="d-flex justify-content-around card-profile-stats">
            <div>
                <span class="heading">Đối tượng</span>
                @switch ($student->type)
                @case (0)
                <span class="description">Thiếu niên</span>
                @break@
                @case (1)
                <span class="description">Học sinh</span>
                @break
                @case (2)
                <span class="description">Sinh viên</span>
                @break
                @case (3)
                <span class="description">Người đi làm</span>
                @break
                @case (4)
                <span class="description">Chưa xác định</span>
                @break
                @endswitch
            </div>

            <div>
                <span class="heading">Tuổi</span>
                <span class="description" id="view-age">
                    {{ getdate()['year'] - getdate(strtotime($student->birthday))['year'] }}
                </span>
            </div>

            <div>
                <span class="heading">Trình độ</span>
                @if((0 < $student->kuy) && ($student->kuy < 11)) <span class="description">Kyu {{ $student->kuy }}</span>
                        @elseif($student->kuy == 11)
                        <span class="description">Nhất đẳng</span>
                        @elseif($student->kuy == 12)
                        <span class="description">Nhị đẳng</span>
                        @elseif($student->kuy == 13)
                        <span class="description">Tam đẳng</span>
                        @elseif($student->kuy == 14)
                        <span class="description">Tứ đẳng</span>
                        @else($student->kuy == 15)
                        <span class="description">Ngũ đẳng</span>
                        @endif
            </div>
        </div>
        <img class="shadow" id="card-image" src="{{ Voyager::image($student->image) }}" style="max-width: 35%; border: 1px solid; padding: 3px;" alt="Ảnh thẻ">

        <h2 class="pt-3 m-0" id="view-ten">
            {{ $student->name }}
        </h2>

        <h4 class="description mb-3">{{ $student->work_unit }}</h4>

        <div class="d-flex justify-content-center py-1">
            <h5 class="mr-3">
                <i class="fa fa-child mr-1" style="font-size:20px;"></i>
                <span>{{ $student->height }} (cm)</span>
            </h5>

            <h5 class="mr-3">
                <i class="fa fa-dashboard mr-1" style="font-size:20px;"></i>
                <span>{{ $student->weight }} (kg)</span>
            </h5>

            <h5 class="mr-3">
                @if($student->sex == 0)
                <i class="fa fa-mars mr-1" style="font-size:20px;"></i>
                <span>Nam</span>
                @elseif($student->sex == 1)
                <i class="fa fa-venus mr-1" style="font-size:20px;"></i>
                <span>Nữ</span>
                @else
                <i class="fa fa-transgender mr-1" style="font-size:20px;"></i>
                <span>Khác</span>
                @endif
            </h5>
        </div>

        <div class="d-flex justify-content-center py-1">
            <h5 class="mr-3">
                <i class="fa fa-phone mr-1" style="font-size:20px;"></i>
                <span>{{ $student->phone }}</span>
            </h5>

            <h5 class="mr-3">
                <i class="fa fa-credit-card mr-1" style="font-size:20px;"></i>
                <span id="view-cmnd">{{ $student->cmnd }}</span>
            </h5>
        </div>

        <h5><i class="fa fa-map-marker mr-1" style="font-size:20px;"></i>
            <span id="view-address">{{ $student->address }}</span></h5>

        <div class="d-flex justify-content-center py-1">
            <h5 class="mr-3">
                <span>Ngày nhập học: {{ date_create($student->admission_day)->format('d-m-Y') }}</span>
            </h5>

            <h5 class="mr-3">
                <span id="view-cmnd">Tình trạng:
                    @if($student->status == 'STUDYING')
                    <span style="color: #2dce89">●</span> Đang tập
                    @elseif($student->status == 'PAUSE')
                    <span style="color: #fb6340">●</span> Tạm nghỉ
                    @elseif($student->status == 'STOPPED')
                    <span style="color: #ed3939">●</span> Nghỉ tập
                    @else
                    <span style="color: #fb6340">●</span> Chờ xác nhận
                    @endif
                </span>
            </h5>
        </div>

        <a class="btn btn-light btn-block mt-4 border" href="#edit-student" style="font-size: 12px;line-height: 1;font-weight: 700">Cập nhật thông tin</a>
    </div>
    @endif
</div>

<script>
    $('.card-profile .btn-secondary').click(function() {
        $('#edit-user').show();
    });

    $('.card-profile .btn-light').click(function() {
        $('#edit-student').show();
    });
</script>