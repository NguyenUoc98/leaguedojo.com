<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('page_title', setting('site.title'))</title>
        <link rel="icon" href="/img/core-img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/home/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/login/iofrm-style.css">
        <link rel="stylesheet" type="text/css" href="/css/login/iofrm-theme8.css">
        <link rel="stylesheet" href="/css/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="/css/mycss.css">
        <script src="/js/sweetalert2.min.js"></script>
        <script src="/js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <!-- Loader -->
        <div class="loader">
            <img src="/img/core-img/loading.gif">
        </div>

        @yield('content')

        @php
        if($errors->any()) {
            $message = '';
            foreach($errors->all() as $error) {
                $message .= $error . '<br>';
            }
        }
        @endphp

        @if(isset($message))
        <script type="text/javascript">
            $(document).ready(function() {
                showError('{!! $message !!}');
            })
        </script>
        @endif
        
        <script src="/js/login/popper.min.js"></script>
        <script src="/js/bootstrap/bootstrap.min.js"></script>
        <script src="/js/login/main.js"></script>
        <script type="text/javascript">
            function showError(message) {
                Swal({
                    title: 'Ồ, có lỗi rồi nè',
                    background: 'url(/img/core-img/notify-bg.png)',
                    html: message,
                    imageUrl: '/img/core-img/error.png',
                    imageWidth: 50,
                    imageHeight: 50,
                    confirmButtonColor: '#ed3939'
                });
            }
        </script>
    </body>
</html>
