<!-- Achievements -->
<div class="card rounded">
    <div class="card-header bg-gradient-indigo d-flex justify-content-between">
        <div class="row align-items-center">
            <i class="fa fa-trophy mx-2" style="font-size:30px;color:white"></i>
            <h3 class="mb-0 mx-2 text-white">Thành tích cá nhân</h3>
        </div>
        <a data-toggle="collapse" href="#card-achievemant" role="button" aria-expanded="false" aria-controls="card-achievemant">
            <i class="fa fa-angle-down mx-2" style="font-size:30px;color:white"></i>
        </a>
    </div>

    <div class="collapse show" id="card-achievemant">
        <div class="card-body rounded">
            <h3>TỔNG KẾT HUY CHƯƠNG</h3>
            <div class="table-responsive">
                <table class="table table-bordered align-items-center">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-white">Năm</th>
                            <th class="text-white">Vàng</th>
                            <th class="text-white">Bạc</th>
                            <th class="text-white">Đồng</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($totalMedals as $year => $totalMedal)
                        <tr>
                            <td scope="row" class="text-center">
                                <span class="mb-0 text-sm">{{ $year }}</span>
                            </td>
                            <td class="text-center">
                                {{ $totalMedal['GOLD'] ?? 0 }}
                            </td>
                            <td class="text-center">
                                {{ $totalMedal['SILVER'] ?? 0 }}
                            </td>
                            <td class="text-center">
                                {{ $totalMedal['BRONZE'] ?? 0 }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h3 class="mt-4">THÀNH TÍCH</h3>
            <div class="table-responsive">
                <table class="table table-bordered align-items-center">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-white">HC</th>
                            <th class="text-white">Nội dung thi đấu</th>
                            <th class="text-white">Giải đấu</th>
                            <th class="text-white">Ngày</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($achievements as $year)
                        @foreach($year as $achievement)
                        <tr>
                            <td class="text-center">
                                <img src="{{ \Arr::get(\App\Models\Achievement::$methodIcon, $achievement->medal, '') }}">
                            </td>
                            <td>
                                {{ $achievement->content }}
                            </td>
                            <td>
                                {{ $achievement->tournaments }}
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($achievement->date)->format('d/m/Y') }}
                            </td>
                        </tr>
                        @endforeach
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h3 class="mt-4">ĐIỂM THI</h3>
            <div class="table-responsive">
                <table class="table table-bordered align-items-center">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-white">Ngày thi</th>
                            <th class="text-white">Kihon</th>
                            <th class="text-white">Kata</th>
                            <th class="text-white">Kumite</th>
                            <th class="text-white">Thể lực</th>
                            <th class="text-white">Tổng điểm</th>
                            <th class="text-white">Thủ khoa</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($testScores as $testScore)
                        <tr>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($testScore->test_day)->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                {{ $testScore->kihon }}
                            </td>
                            <td class="text-center">
                                {{ $testScore->kata }}
                            </td>
                            <td class="text-center">
                                {{ $testScore->kumite }}
                            </td>
                            <td class="text-center">
                                {{ $testScore->physical }}
                            </td>
                            <td class="text-center">
                                {{ $testScore->total }}
                            </td>
                            <td class="text-center">
                                @if($testScore->valedictorian == 1)
                                    <span class="label label-primary"> Có </span>
                                @else
                                    <span class="label label-danger"> Không </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>