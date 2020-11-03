<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

@include('layouts.head')

<body>
    @include('layouts.header')
    @yield('content')
    <div class="toast box-shadow" data-delay="5000" style="position: fixed; bottom: 0; right: 1%;z-index:9999">
        <div class="toast-header text-body bg-warning py-2 text-white">
            <img id="toast-img" src="/img/core-img/logo.png" width="30px" height="30px" class="rounded mr-2" alt="...">
            <strong class="mr-auto">Thông báo</strong>
            <small id="toast-time">Vừa xong</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="2436630799895751"
        theme_color="#ed3939"
        logged_in_greeting="Xin chào! Chúng tôi luôn ở đây sẵn sàng phục vụ bạn."
        logged_out_greeting="Xin chào! Chúng tôi luôn ở đây sẵn sàng phục vụ bạn.">
      </div>
    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>