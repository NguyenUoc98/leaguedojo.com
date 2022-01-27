<p class="my-4 border-l-4 border-primary pl-2">
    <span class="font-bold text-2xl">Điểm rèn luyện</span><br>
    <small class="italic">Tính từ ngày {{ $pointTraining['startSemester'] }}</small>
</p>

<div class="rounded-lg border p-4">
    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
        <div class="text-center flex flex-wrap items-center justify-center text-center">
            @if($rank < 11) @if($rank == 1)
                <img class="pb-2 w-4/5" src="{{ asset('img/ranks/10.png') }}">
            @elseif($rank == 2){{--    <script type="text/javascript" src="/js/infinite-scroll.pkgd.min.js"></script>--}}

                <img class="pb-2 w-4/5" src="{{ asset('img/ranks/20.png') }}">
            @elseif($rank == 3)
                <img class="pb-2 w-4/5" src="{{ asset('img/ranks/30.png') }}">
            @else
                <img class="pb-2 w-4/5" src="{{ asset('img/ranks/top-10.jpg') }}">
            @endif
            <p class="text-center text-primary font-bold text-lg">
                Chúc mừng bạn đã đạt top #{{ $rank }}
            </p>
            @elseif($rank > ($total / 2 - 1))
                <img class="pb-2 w-4/5" src="{{ asset('img/ranks/top-bot.jpg') }}">
                <p class="text-center text-primary font-bold">
                    Bạn đang thuộc nửa dưới bảng xếp hạng.<br>Cố gắng lên nhé!
                </p>
            @else
                <img class="pb-2 w-4/5" src="{{ asset('img/ranks/top-on.jpg') }}">
                <p class="text-center text-primary font-bold">
                    Bạn đang thuộc nửa trên bảng xếp hạng.<br>Tiếp tục cố gắng hơn nữa nhé!
                </p>
            @endif
        </div>
        <div class="md:col-span-1">
            <p class="font-bold text-xl">Bảng quy đổi điểm</p>
            <table class="w-full rounded-lg overflow-hidden my-2">
                <thead class="bg-primary">
                <th class="text-white py-2 border">Tiêu chí</th>
                <th class="text-white py-2 border">Tổng</th>
                <th class="text-white py-2 border">Điểm</th>
                </thead>
                <tbody>
                @foreach($pointTraining as $field => $value)
                    @if(isset(\App\Models\Student::$methodField[$field]))
                        <tr>
                            <td class="py-1 border font-bold px-2">
                                <span class="mb-0 text-sm">{{ \App\Models\Student::$methodField[$field] }}</span>
                            </td>
                            <td class="text-center border py-1 px-2">
                                {{ $value }}
                            </td>
                            <td class="text-center border py-1 px-2">
                                {{ $value * setting('app.' . $field) }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr class="bg-gray-300">
                    <td class="py-1 border font-bold px-2">
                        <span class="mb-0 text-sm">Tổng điểm</span>
                    </td>
                    <td class="py-1 border font-bold px-2 text-center" colspan="2">
                        <span class="mb-0 text-sm">{{ $pointTraining['total'] }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
