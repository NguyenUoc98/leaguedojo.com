<div class="overflow-x-scroll">
    <p class="font-bold text-xl mt-5">Thành tích thi đấu</p>
    <table class="w-full rounded-lg overflow-hidden my-2">
        <thead class="bg-primary">
        <th class="text-white p-2 border">HC</th>
        <th class="text-white p-2 border">Nội dung thi đấu</th>
        <th class="text-white p-2 border">Giải đấu</th>
        <th class="text-white p-2 border">Ngày</th>
        </thead>
        <tbody>
        @forelse($achievements as $year)
            @foreach($year as $achievement)
                <tr>
                    <td class="text-center py-1 border px-2">
                        <img src="{{ \Arr::get(\App\Models\Achievement::$methodIcon, $achievement->medal, '') }}">
                    </td>
                    <td class="py-1 border px-2">
                        {{ $achievement->content }}
                    </td>
                    <td class="py-1 border px-2">
                        {{ $achievement->tournaments }}
                    </td>
                    <td class="py-1 border px-2">
                        {{ \Carbon\Carbon::parse($achievement->date)->format('d/m/Y') }}
                    </td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="4" class="text-center py-1 border font-bold px-2">Không có dữ liệu</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $achievements->links() }}
</div>
