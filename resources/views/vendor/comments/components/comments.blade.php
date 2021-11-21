@php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
@endphp

<ul class="comment_area">
    <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2 mt-10 mb-4">Bình luận</p>
    @auth
        @include('comments::_cmt')
    @endauth
    <div class="list-comment">
        @if($comments->count() < 1)
            <div class="not-comment mt-2">
                <div class="alert alert-warning">Chưa có bình luận nào.</div>
            </div>
        @else
            @php
                $grouped_comments = $comments->sortBy('created_at', 0,true)->groupBy('child_id');
            @endphp
            @foreach($grouped_comments as $comment_id => $comments)
                {{-- Process parent nodes --}}
                @if($comment_id == '')
                    @foreach($comments as $comment)
                        @include('comments::_comment', [
                            'comment' => $comment,
                            'grouped_comments' => $grouped_comments
                            ])
                    @endforeach
                @endif
            @endforeach
        @endif
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto animate-fade-in-down hidden" aria-labelledby="modal-title"
         role="dialog" aria-modal="true" id="like_modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300"
                 aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full w-full">
                <div class="bg-white relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="closeModal()">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <div class="border-b flex p-4 items-center">
                        <span
                            class="bg-blue-100 flex flex-shrink-0 h-12 items-center justify-center rounded-full sm:h-10 sm:mx-0 sm:w-10 text-blue-600 w-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path
                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                            </svg>
                        </span>
                        <span class="text-lg leading-6 font-medium text-gray-900 font-bold ml-2" id="modal-title">
                            Những người đã thích
                        </span>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left pb-4">
                        <div class="ml-8 modal-body mt-4 grid grid-cols-1 gap-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</ul>

@push('script')
    <script>
        function closeModal() {
            $('#like_modal').addClass('hidden');
        }
    </script>
@endpush
