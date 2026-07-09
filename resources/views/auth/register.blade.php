<html>
    <head>
        @vite(['resources/css/auth.css'])
        @vite(['resources/css/welcome.css'])
        <title>Добро пожаловать!</title>
    </head>
    <body>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="auth-control">
                <label>Как к вам обращаться?</label>
                <input type="text" name="name" required>
            </div>
            <div class="auth-control">
                <label>Ваш email</label>
                <input type="email" name="email" required>
            </div>
            <div class="auth-control">
                <label>Придумайте пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="auth-control">
                <label>Подтвердите пароль</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <div class="auth-control">
                <button class="btn" type="submit">Зарегистрироваться</button>
            </div>
        </form>
    </body>
</html>
