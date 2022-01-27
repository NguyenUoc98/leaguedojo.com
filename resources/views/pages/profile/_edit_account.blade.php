<div class="fixed z-10 inset-0 overflow-y-auto animate-fade-in-down hidden" aria-labelledby="modal-title"
     role="dialog" aria-modal="true" id="edit_account_modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300"
             aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-[34%] sm:w-full w-full">
            <div class="bg-white relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     onclick="closeModal('#edit_account_modal')">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <div class="border-b flex p-4 items-center">
                        <span class="text-lg leading-6 text-primary font-bold ml-2">
                            Cập nhật tài khoản
                        </span>
                </div>
                <div class="mt-3 text-center sm:mt-0 mx-4 sm:text-left pb-4">
                    <div class="modal-body mt-4 md:flex flex-wrap">
                        <div class="md:w-1/4 w-1/2 mx-auto">
                            <div class="relative">
                                <img id="img-avatar"
                                     class="rounded-full border-4 border-gray-100 shadow-md avatar"
                                     src="{{ Voyager::image(auth()->user()->avatar) }}" alt="your image"/>
                                <button id="btn-open-update-avatar"
                                        class="absolute bg-gray-100 bottom-0 hover:bg-gray-200 p-2 right-[5%] rounded-full shadow text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <form class="md:w-3/4 w-full md:pl-4 text-left"
                              action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="type" value="edit">
                            <div class="mb-4">
                                <p class="font-bold">Email</p>
                                <p class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary font-bold bg-gray-300">
                                    {{$user->email}}
                                </p>
                            </div>

                            <div>
                                <p class="font-bold">Username</p>
                                <input
                                    class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                    type="text" name="name" id="input-username"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="w-full md:text-right text-center">
                                <button type="submit" id="btn-account"
                                        class="px-14 py-2 text-white bg-primary hover:bg-primary-darker rounded-lg mt-4">
                                    Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed z-10 inset-0 overflow-y-auto animate-fade-in-down hidden" aria-labelledby="modal-title"
     role="dialog" aria-modal="true" id="upload_avatar_modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300"
             aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full w-full">
            <div class="bg-white relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     onclick="closeModal('#upload_avatar_modal')">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <div class="border-b flex p-4 items-center">
                        <span class="text-lg leading-6 text-primary font-bold ml-2">
                            Cập nhật ảnh đại diện
                        </span>
                </div>
                <div class="mt-3 text-center sm:mt-0 mx-4 sm:text-left pb-4">
                    <div class="modal-body mt-4">
                        <div id="upload-avatar"></div>
                        <div class="text-center">
                            <input class="border p-1 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm
                                                  file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker w-4/5 mb-4"
                                   type="file" id="image-avatar" accept="image/*">
                            <button
                                class="px-14 py-2 text-white bg-success hover:bg-green-500 rounded-lg mt-4 upload-avatar">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script type="application/javascript">
        $('#btn-update-account').click(function () {
            $('#edit_account_modal').removeClass('hidden');
        });
        $('#btn-open-update-avatar').click(function () {
            $('#upload_avatar_modal').removeClass('hidden');
        });

        var w = '300';
        var bound = '400';
        if ($(document).width() < 400) {
            w = '80%';
            bound = '100%';
        }

        // Update avatar
        var resize = $('#upload-avatar').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: w,
                height: 300,
                type: 'square'
            },

            boundary: {
                width: bound,
                height: ''
            }
        });

        $('#image-avatar').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind', {
                    url: e.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.upload-avatar').on('click', function (ev) {
            if ($('#image-avatar').val() != "") {
                $('.loader').removeClass('hidden');
                resize.croppie('result', {
                    type: 'canvas',
                    size: 'original',
                    format: 'png'
                }).then(function (img) {
                    axios.put("{{ route('users.update', $user->id) }}", {
                        type: 'avatar',
                        avatar: img
                    }).then(response => {
                        $('.loader').addClass('hidden');
                        closeModal('#upload_avatar_modal');
                        showSuccess();
                    })
                    $(".avatar").attr("src", img);
                });
            }
        });

        $('#btn-account').click(function () {
            $('.loader').removeClass('hidden');
        });
    </script>
@endpush
