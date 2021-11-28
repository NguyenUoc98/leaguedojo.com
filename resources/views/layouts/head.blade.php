<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', setting('site.title'))</title>
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="{{ $url_canonical }}" />
    <meta name="author" content="Nguyễn Văn Ước">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <meta property="og:image" content="{{ $image_og }}" />
    <meta property="og:site_name" content="thechatvietnam.com" />
    <meta property="og:description" content="{{ $meta_desc }}" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:url" content="{{ $url_canonical }}" />
    <meta property="og:type" content="website" />

    <!-- CSS -->
    <style>{{ \Illuminate\Support\Facades\File::get(public_path('css/themes/default.css')) }}</style>
    <link rel="stylesheet" href="/css/app.css">
{{--    <style>{{ \Illuminate\Support\Facades\File::get(public_path('css/app.css')) }}</style>--}}
    @stack('css')

    <!-- ##### All Javascript Script ##### -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.4.1.min.js"></script>
    @stack('head-script')
{{--    <script type="text/javascript" src="/js/croppie.js"></script>--}}
{{--    <script type="text/javascript" src="/js/readMoreJS.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/infinite-scroll.pkgd.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/jquery.PrintArea.js" defer></script>--}}
{{--    <script type="text/javascript" src="/js/dom-to-image.min.js" defer></script>--}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180755787-1"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'UA-180755787-1');--}}
{{--    </script>--}}

    <!-- Google Adsense -->
{{--    <script data-ad-client="ca-pub-1747924550904432" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>--}}

    @livewireStyles
</head>
