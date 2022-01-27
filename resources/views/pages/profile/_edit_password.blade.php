<div class="fixed z-10 inset-0 overflow-y-auto animate-fade-in-down hidden" aria-labelledby="modal-title"
     role="dialog" aria-modal="true" id="edit_password_modal">
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
                     onclick="closeModal('#edit_password_modal')">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <div class="border-b flex p-4 items-center">
                        <span class="text-lg leading-6 text-primary font-bold ml-2">
                            Cập nhật mật khẩu
                        </span>
                </div>
                <div class="mt-3 text-center sm:mt-0 mx-4 sm:text-left pb-4">
                    <div class="modal-body mt-4">
                        <form class="w-full text-left md:px-5"
                              action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="type" value="reset">
                            <div class="mb-4">
                                <p class="font-bold">Mật khẩu cũ</p>
                                <input class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                    name="old_password" type="password" placeholder="Mật khẩu cũ" required>
                            </div>

                            <div class="mb-4">
                                <p class="font-bold">Mật khẩu mới</p>
                                <input class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                    name="password" type="password" placeholder="Mật khẩu mới" required>
                            </div>

                            <div class="mb-4">
                                <p class="font-bold">Nhập lại mật khẩu mới</p>
                                <input class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                    name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu mới" value="" required>
                            </div>

                            <div class="w-full md:text-right text-center">
                                <button type="submit" id="btn-password"
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

@push('script')
    <script type="application/javascript">
        $('#btn-update-password').click(function () {
            $('#edit_password_modal').removeClass('hidden');
        });
        $('#btn-password').click(function () {
            $('.loader').removeClass('hidden');
        });
    </script>
@endpush
