<!-- Achievements -->
<div class="card rounded mb-4">
    <div class="card-header bg-gradient-primary">
        <div class="row align-items-center">
            <i class="fa fa-graduation-cap mx-2" style="font-size:30px;color:white"></i>
            <div>
                <h3 class="mb-0 mx-2 text-white">Điểm rèn luyện</h3>
                <span class="text-white mx-2">Tính từ ngày {{ $pointTraining['startSemester'] }}</span>
            </div>
        </div>
    </div>
    <div class="card-body rounded">
        <div class="d-flex justify-content-around row px-3">
            <div class="col-md-4 px-0 pb-4">
                <div class="text-center">
                    @if($rank < 11) @if($rank == 1) <img class="pb-2" src="/img/ranks/10.png">
                        @elseif($rank == 2)
                        <img class="pb-2" src="/img/ranks/20.png">
                        @elseif($rank == 3)
                        <img class="pb-2" src="/img/ranks/30.png">
                        @else
                        <img class="pb-2" src="/img/ranks/top-10.jpg">
                        @endif
                        <h2 class="text-center text-danger">Chúc mừng bạn đã đạt top #{{ $rank }}</h2>
                        @elseif($rank > $total / 2 -1)
                        <img class="pb-2" src="/img/ranks/top-bot.jpg">
                        <h4 class="text-center text-danger">Bạn đang thuộc nửa dưới bảng xếp hạng.<br>Cố gắng lên nhé!</h4>
                        @else
                        <img class="pb-2" src="/img/ranks/top-on.jpg">
                        <h4 class="text-center text-danger">Bạn đang thuộc nửa trên bảng xếp hạng.<br>Tiếp tục cố gắng hơn nữa nhé!</h4>
                        @endif
                </div>
                <div class="border p-3">
                    <li>
                        <span class="description">Hạng: </span>
                        <span class="heading text-xl">#{{ $rank }}</span>
                        <span class="heading">/ {{ $total }}</span>
                    </li>
                    <li>
                        <span class="description">Tổng điểm: </span>
                        <span class="heading">
                            {{ $pointTraining['total'] }}
                        </span>
                    </li>
                </div>
            </div>

            <div class="col-md-8 px-0 pl-md-3">
                <div class="table-responsive">
                    <table class="table table-bordered align-items-center">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-white">Tiêu chí</th>
                                <th class="text-white">Tổng</th>
                                <th class="text-white">Điểm</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($pointTraining as $field => $value)
                            @if(isset(\App\Models\Student::$methodField[$field]))
                            <tr>
                                <td scope="row" class="name">
                                    <span class="mb-0 text-sm">{{ \App\Models\Student::$methodField[$field] }}</span>
                                </td>
                                <td class="text-center">
                                    {{ $value }}
                                </td>
                                <td class="text-center">
                                    {{ $value * setting('app.' . $field) }}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>