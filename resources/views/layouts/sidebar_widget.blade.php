<div class="sticky top-20">
    @if(isset($categories))
        <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">Thể loại</p>
        <div class="border px-4 py-2 rounded-lg mb-10">
            @foreach($categories as $category)
                <li class="list-none">
                    <a class="flex hover:bg-gray-100 hover:border-white justify-between p-3 rounded-lg @if(!$loop->last) border-b @endif"
                        href="{{ route('categories.show', $category->slug) }}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ $category->name }}
                        </span>
                        <span>{{ $category->posts_count }}</span>
                    </a>
                </li>
            @endforeach
        </div>
    @endif
    <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">Theo dõi chúng tôi</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 md:gap-8 lg:gap-4 gap-4">
        <div class="bg-white rounded-lg p-5 border flex items-center">
            <div class="g-ytsubscribe" data-channelid="UCl81LfmyxDUZ1ygd4RNhsAw" data-layout="full"
                 data-count="default"></div>
        </div>
        <div class="bg-white rounded-lg lg:p-6 p-4 border text-center">
            <!-- Load Facebook SDK for JavaScript -->
            <div class="fb-page rounded-lg border overflow-hidden block md:hidden lg:block"
                 data-href="https://www.facebook.com/votrandojo/"
                 data-tabs="timeline, messages" data-width="" data-height="" data-small-header="false"
                 data-adapt-container-width="true" data-lazy="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/votrandojo/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/votrandojo/">VÕ TRẦN DOJO</a>
                </blockquote>
            </div>
            <div class="fb-page rounded-lg border overflow-hidden hidden md:block lg:hidden"
                 data-href="https://www.facebook.com/votrandojo/" data-tabs=""
                 data-width="" data-height="" data-small-header="true" data-adapt-container-width="true"
                 data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/votrandojo/" class="fb-xfbml-parse-ignore"><a
                        href="https://www.facebook.com/votrandojo/">VÕ TRẦN DOJO</a></blockquote>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="https://apis.google.com/js/platform.js"></script>
    <script async defer crossorigin="anonymous" nonce="Cc5ePpnC"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=470070003944545&autoLogAppEvents=1">
    </script>
@endpush
