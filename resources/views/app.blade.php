<!DOCTYPE html>
<html lang="ru">
<head>
    @vite(['resources/css/app.css'])
    @vite(['resources/css/components/modal.css'])
    @vite(['resources/js/app.js'])
    @vite(['resources/js/components/modal.js'])
    @yield('styles')
    <meta charset="UTF-8">
    <title>@yield('title', 'Мой сайт')</title>
</head>
<body>
    @include('includes.header')

    <div class="container">
        @yield('content')
        @yield('scripts')
    </div>
</body>
</html>
