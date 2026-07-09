<!DOCTYPE html>
<html lang="ru">
<head>
    @vite(['resources/css/app.css'])
    @vite(['resources/css/travels.css'])
    @vite(['resources/css/travel.css'])
    @vite(['resources/css/components/modal.css'])
    @vite(['resources/css/components/travel-element.css'])
    @vite(['resources/js/app.js'])
    @vite(['resources/js/travels.js'])
    @vite(['resources/js/travel.js'])
    @vite(['resources/js/components/modal.js'])
    @vite(['resources/js/components/travel-element.js'])
    <meta charset="UTF-8">
    <title>@yield('title', 'Мой сайт')</title>
</head>
<body>
    @include('includes.header')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
