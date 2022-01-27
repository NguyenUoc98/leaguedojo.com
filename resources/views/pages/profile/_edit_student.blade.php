<div class="fixed z-10 inset-0 overflow-y-auto animate-fade-in-down hidden" aria-labelledby="modal-title"
     role="dialog" aria-modal="true" id="edit_student_modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300"
             aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-[50%] sm:w-full w-full">
            <div class="bg-white relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     onclick="closeModal('#edit_student_modal')">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <div class="border-b flex p-4 items-center">
                        <span class="text-lg leading-6 text-primary font-bold ml-2">
                            Chỉnh sửa chi tiết
                        </span>
                </div>
                <div class="mt-3 text-center sm:mt-0 mx-4 sm:text-left pb-4">
                    <div class="modal-body mt-4">
                        <form action="{{ route('students.update', $student->id) }}" method="post">
                            <div class="w-full md:flex flex-wrap">
                                <div class="md:w-1/4 w-1/2 mx-auto">
                                    <div class="relative">
                                        <img id="img-card"
                                             class="border-4 border-gray-100 shadow-md avatar"
                                             src="{{ Voyager::image($student->image) }}" alt="your image"/>
                                        <button id="btn-open-update-student"
                                                class="absolute bg-gray-100 bottom-2 hover:bg-gray-200 p-2 right-[5%] rounded-full shadow text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="md:w-3/4 grid md:grid-cols-2 grid-cols-1 w-full md:pl-4 text-left gap-4">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="action" value="edit">
                                    <div>
                                        <p class="font-bold">Họ và tên</p>
                                        <input
                                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                            type="text" name="name"
                                            value="{{ old('name', $student->name)}}" required>
                                    </div>

                                    <div>
                                        <p class="font-bold">Giới tính</p>
                                        <div class="relative">
                                            <select name="sex"
                                                    class="mt-1 block appearance-none bg-white w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-primary">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                                <option value="2">Khác</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="font-bold">Số căn cước công dân</p>
                                        <input
                                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                            type="text" name="cmnd"
                                            value="{{ old('cmnd', $student->cmnd)}}" required>
                                    </div>

                                    <div>
                                        <p class="font-bold">Điện thoại</p>
                                        <input
                                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                            type="text" name="phone"
                                            value="{{ old('phone', $student->phone)}}" required>
                                    </div>

                                    <div>
                                        <p class="font-bold">Ngày sinh</p>
                                        <input
                                            class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                            type="text" name="birthday"
                                            value="{{ old('birthday', $student->birthday)}}" required>
                                    </div>

                                    <div>
                                        <p class="font-bold">Đối tượng</p>
                                        <div class="relative">
                                            <select name="type"
                                                    class="mt-1 block appearance-none bg-white w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-primary">
                                                <option value="0">Thiếu niên - Nhi đồng</option>
                                                <option value="1">Học sinh</option>
                                                <option value="2">Sinh viên</option>
                                                <option value="3">Người đi làm</option>
                                                <option value="4">Đối tượng khác</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 mt-4 text-left">
                                <div>
                                    <p class="font-bold">Chiều cao(cm)</p>
                                    <input
                                        class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                        name="height" placeholder="165"
                                        value="{{ old('height', $student->height)}}" type="number" pattern="[0-9]{10}"
                                        min="100" max="200" step="1" required>
                                </div>

                                <div>
                                    <p class="font-bold">Cân nặng(kg)</p>
                                    <input
                                        class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                        name="weight" placeholder="45.5"
                                        value="{{ old('weight', $student->weight)}}" type="number" pattern="[0-9]{10}" min="20"
                                        max="120" step="0.1" required>
                                </div>

                                <div>
                                    <p class="font-bold">Nơi làm việc</p>
                                    <input
                                        class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                        type="text" name="work_unit"
                                        value="{{ old('work_unit', $student->work_unit)}}" placeholder="Học viện Nông nghiệp Việt Nam">
                                </div>

                                <div>
                                    <p class="font-bold">Link facebook</p>
                                    <input
                                        class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                        type="text" id="input-fb" name="link_fb" required
                                        value="{{ old('link_facebook', $student->link_fb)}}" placeholder="https://www.facebook.com/profile.php?id=************">
                                </div>

                                <div class="md:col-span-2">
                                    <p class="font-bold">Địa chỉ</p>
                                    <input
                                        class="block border border-gray-300 mt-1 p-3 rounded-lg w-full focus:outline-none focus:border-primary"
                                        type="text" name="address"
                                        value="{{ old('address', $student->address)}}" required>
                                </div>
                            </div>
                            <div class="w-full md:text-right text-center">
                                <button type="submit" id="btn-student"
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
     role="dialog" aria-modal="true" id="upload_student_modal">
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
                     onclick="closeModal('#upload_student_modal')">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <div class="border-b flex p-4 items-center">
                        <span class="text-lg leading-6 text-primary font-bold ml-2">
                            Chọn ảnh thẻ
                        </span>
                </div>
                <div class="mt-3 text-center sm:mt-0 mx-4 sm:text-left pb-4">
                    <div class="modal-body mt-4">
                        <div id="upload-card"></div>
                        <div class="text-center">
                            <input class="border p-1 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm
                                                  file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker w-4/5 mb-4"
                                   type="file" id="image-card" accept="image/*">
                            <button
                                class="px-14 py-2 text-white bg-success hover:bg-green-500 rounded-lg mt-4 upload-card">
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
        $('#btn-update-student').click(function () {
            $('#edit_student_modal').removeClass('hidden');
        });

        $('#btn-open-update-student').click(function () {
            $('#upload_student_modal').removeClass('hidden');
        });

        // Update card
        var resizeCard = $('#upload-card').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 180,
                height: 240
            },

            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#image-card').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resizeCard.croppie('bind', {
                    url: e.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.upload-card').on('click', function (ev) {
            if ($('#image-card').val() != "") {
                $('.loader').removeClass('hidden');
                resizeCard.croppie('result', {
                    type: 'canvas',
                    size: 'original',
                    format: 'png'
                }).then(function (img) {
                    axios.put("{{ route('students.update', $student->id) }}", {
                        action: 'image',
                        image: img
                    }).then(response => {
                        $('.loader').addClass('hidden');
                        closeModal('#upload_student_modal');
                        showSuccess();
                        $("#img-card").attr("src", img);
                    }).catch(error => {
                        $('.loader').addClass('hidden');
                        closeModal('#upload_student_modal');
                        var errors = error.response.data.errors;
                        var message = '';
                        jQuery.each(errors, function (key, value) {
                            value.forEach(function (error) {
                                message += error + '<br>';
                            });
                        });
                        showError(message);
                    })
                });
            }
        });

        $('#btn-student').click(function () {
            $('.loader').removeClass('hidden');
        });
    </script>
@endpush
