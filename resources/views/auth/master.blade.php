<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', setting('site.title'))</title>
    <style>{{ \Illuminate\Support\Facades\File::get(public_path('css/themes/default.css')) }}</style>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
</head>
<body>
<!-- Loader -->
<div
    class="loader absolute bg-black bg-opacity-40 flex h-screen items-center justify-center left-0 top-0 w-full hidden z-10">
    <img class="w-44"
         src="{{ asset('img/core-img/loading.gif') }}">
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
        $(document).ready(function () {
            showError('{!! $message !!}');
        })
    </script>
@endif
<script type="text/javascript">
    function showError(message) {
        Swal({
            title: 'Ồ, có lỗi rồi nè',
            html: message,
            imageUrl: '{{ asset('img/core-img/error.png') }}',
            imageWidth: 50,
            imageHeight: 50,
            confirmButtonColor: '#ed3939'
        });
    }
</script>
</body>
</html>
