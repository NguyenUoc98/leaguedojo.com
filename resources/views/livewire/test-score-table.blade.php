<div class="overflow-x-scroll">
    <p class="font-bold text-xl mt-5">Điểm thi</p>
    <table class="w-full rounded-lg overflow-hidden my-2">
        <thead class="bg-primary">
        <th class="text-white p-2 border">Ngày thi</th>
        <th class="text-white p-2 border">Kihon</th>
        <th class="text-white p-2 border">Kata</th>
        <th class="text-white p-2 border">Kumite</th>
        <th class="text-white p-2 border">Thể lực</th>
        <th class="text-white p-2 border">Tổng điểm</th>
        <th class="text-white p-2 border">Thủ khoa</th>
        </thead>
        <tbody>
        @forelse($testScores as $testScore)
            <tr>
                <td class="text-center py-1 border px-2">
                    {{ \Carbon\Carbon::parse($testScore->test_day)->format('d/m/Y') }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $testScore->kihon }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $testScore->kata }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $testScore->kumite }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $testScore->physical }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $testScore->total }}
                </td>
                <td class="text-center py-2 border px-2">
                    @if($testScore->valedictorian == 1)
                        <span class="py-1 px-3 rounded-lg bg-success text-white"> Có </span>
                    @else
                        <span class="p-2 rounded-lg bg-error"> Không </span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center font-bold py-1 border px-2">Không có dữ liệu</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $testScores->links() }}
</div>
