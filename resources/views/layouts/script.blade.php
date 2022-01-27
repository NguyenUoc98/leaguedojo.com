<!-- Script Facebook -->
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=470070003944545&autoLogAppEvents=1">
</script>

<!-- Script Youtube -->
<script src="https://apis.google.com/js/platform.js"></script>

<!-- Sweet Alert -->
<script>
    function showError(message) {
        Swal({
            title: 'Ồ, có lỗi rồi nè',
            html: message ? message : 'Hừm, có lỗi gì đó rồi!',
            imageUrl: '{{ asset('img/core-img/error.png') }}',
            imageWidth: 50,
            imageHeight: 50,
            confirmButtonColor: '#ed3939'
        });
    }

    function showSuccess(message) {
        Swal({
            title: 'Thành công',
            text: message ? message : 'Dễ dàng như ăn bánh rán vậy đó !',
            type: 'success',
            showConfirmButton: false,
            timer: 1500
        });
    }

    function closeToast() {
        $(".toast").addClass('hidden');
    }
</script>
@if (session('message'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal({
                title: "{{ session('status') }}",
                text: "{{ session('message') }}",
                type: "{{ session('type') }}",
                confirmButtonColor: "{{ session('color') }}"
            });
        })
    </script>
@endif
@livewireScripts
@stack('script')
