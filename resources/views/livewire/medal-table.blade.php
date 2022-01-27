<div class="overflow-x-scroll">
    <p class="font-bold text-xl">Tổng kết huy chương</p>
    <table class="w-full rounded-lg overflow-hidden my-2">
        <thead class="bg-primary">
        <th class="text-white p-2 border">Năm</th>
        <th class="text-white p-2 border">Vàng</th>
        <th class="text-white p-2 border">Bạc</th>
        <th class="text-white p-2 border">Đồng</th>
        </thead>
        <tbody>
        @forelse($totalMedals as $year => $totalMedal)
            <tr>
                <td class="text-center py-1 border font-bold px-2">
                    <span class="mb-0 text-sm">{{ $year }}</span>
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $totalMedal['GOLD'] ?? 0 }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $totalMedal['SILVER'] ?? 0 }}
                </td>
                <td class="text-center py-1 border px-2">
                    {{ $totalMedal['BRONZE'] ?? 0 }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-1 border font-bold px-2">Không có dữ liệu</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $totalMedals->links() }}
</div>
