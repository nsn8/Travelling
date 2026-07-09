<html>
    <head>
        @vite(['resources/css/welcome.css'])
        <title>
            Добро пожаловать!
        </title>
    </head>
    <body>
        <h1>Добро пожаловать!</h1>
        <h2>Здесь впервые? Давайте знакомиться :)</h2>
        <a href="{{ route('register') }}" class="btn btn-primary" role="button">Зарегистрироваться</a>
        <h2>Уже путешествовали с нами? С возвращением!</h2>
        <a href="{{ route('login') }}" class="btn btn-primary" role="button">Войти</a>
    </body>
</html>
