<!-- JS Alert -->
<script src="/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="/js/plugins/plugins.js"></script>
<script type="text/javascript" src="/js/active.js"></script>
<script type="text/javascript" src="/js/infinite-scroll.pkgd.min.js"></script>
<script type="text/javascript" src="/js/images-grid.js" defer></script>


<!-- Date Picker -->
<script type="text/javascript" src="/js/argon/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/js/argon/bootstrap-datepicker.vi.min.js"></script>
<script type="text/javascript" src="/js/argon/dropzone.min.js"></script>
<script type="text/javascript" src="/js/argon/argon.js"></script>

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
        background: 'url(/img/core-img/notify-bg.png)',
        html: message ? message : 'Hừm, có lỗi gì đó rồi!',
        imageUrl: '/img/core-img/error.png',
        imageWidth: 50,
        imageHeight: 50,
        confirmButtonColor: '#ed3939'
    });
}

function showSuccess(message) {
    Swal({
        title: 'Thành công',
        background: 'url(/img/core-img/notify-bg.png)',
        text: message ? message : 'Dễ dàng như ăn bánh rán vậy đó !',
        type: 'success',
        showConfirmButton: false,
        timer: 1500
    });
}
</script>
<script>
function replyToggle(id) {
    $(".contact-form-area" + id).slideToggle();
}
$(document).ready(function() {
    $readMoreJS.init({
        target: '.excerpt p',
        numOfWords: 50,
        toggle: true,
        moreLink: 'Xem thêm',
        lessLink: 'Hiển thị ít hơn'
    });
});
</script>

@livewireScripts
