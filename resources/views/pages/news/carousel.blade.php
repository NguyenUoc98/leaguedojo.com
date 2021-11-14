<div class="sliderAx h-96 bg-gray-300 overflow-hidden mt-14">
    @foreach($slides as $key=>$slide)
        <div id="slider-{{ $key }}" class="container mx-auto max-w-7xl" @if ($key > 0) style="display:none" @endif>
            <div class="bg-cover bg-center h-96 text-white object-fill"
                 style="background-image: url({{ Voyager::image($slide->image) }})">
                <div class="bg-gray-900 bg-opacity-50 h-96 px-10 py-24">
                    <p class="font-bold text-sm uppercase">Services</p>
                    <p class="text-3xl font-bold">Hello world</p>
                    <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
                    <a href="#"
                       class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                        Contact us</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@push('script')
    <script>
        var index = 0;
        var total = {{ count($slides) }};

        function loopSlider() {
            var xx = setInterval(function () {
                for (let i = 0; i < total; i++) {
                    if (i != index) {
                        $("#slider-" + i).fadeOut(400);
                    }
                }
                $("#slider-" + index).delay(400).fadeIn(400);
                index = (index + 1) % total;
            }, 8000);
        }

        $(window).ready(function () {
            loopSlider();
        });
    </script>
@endpush
