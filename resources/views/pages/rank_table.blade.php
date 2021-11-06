<div class="table-responsive pb-3">
    <table class="table table-bordered align-items-center table-flush mb-3">
        <thead class="thead-light">
            <tr>
                <th scope="col">Hạng</th>
                <th scope="col">Võ sinh</th>
                <th scope="col">MSVS</th>
                <th scope="col">HC Vàng</th>
                <th scope="col">HC Bạc</th>
                <th scope="col">HC Đồng</th>
                <th scope="col">Điểm thi TB</th>
                <th scope="col">Thủ khoa</th>
                <th scope="col">Điểm sự kiện</th>
                <th scope="col">Số buổi nghỉ</th>
                <th scope="col">Tổng điểm</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($topStudents as $key=>$student)
            <tr>
                <td>
                    @if ($key == 0)
                    <img src="/img/ranks/10.png" class="rank-img">
                    @elseif ($key == 1)
                    <img src="/img/ranks/20.png" class="rank-img">
                    @elseif ($key == 2)
                    <img src="/img/ranks/30.png" class="rank-img">
                    @else
                    <h3>{{ $key + 1 }}</h3>
                    @endif
                </td>

                <td>
                    <div class="media align-items-center">
                        <a class="avatar">
                            @if (($student['avatar'] == 'users/default.png') && ($student['sex'] == 1))
                            <img class="rounded-circle" src="/storage/users/user_woman.jpg" alt="user_woman.jpg">
                            @else
                            <img class="rounded-circle" src="{{ Voyager::image($student['avatar']) }}" alt="{{ $student['name'].'.png'}}">
                            @endif
                        </a>
                        <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $student['name'] }}</span>
                        </div>
                    </div>
                </td>

                <td class="budget">{{ $student['student_id'] }}</td>

                <td class="budget">{{ $student['result']['goldMedal'] }}</td>
                <td class="budget">{{ $student['result']['silverMedal'] }}</td>
                <td class="budget">{{ $student['result']['bronzeMedal'] }}</td>

                <td class="budget">{{ $student['result']['mediumScore'] }}</td>

                <td class="budget">{{ $student['result']['valedictorian'] }}</td>

                <td class="budget">{{ $student['result']['pointCollected'] }}</td>

                <td class="budget">{{ $student['result']['diligence'] }}</td>

                <td class="budget">{{ $student['result']['total'] }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
