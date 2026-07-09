<html>
    <head>
        @vite(['resources/css/auth.css'])
        @vite(['resources/css/welcome.css'])
        <title>Добро пожаловать!</title>
    </head>
    <body>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="auth-control">
                <label>Ваш email</label>
                <input type="email" name="email" required>
            </div>
            <div class="auth-control">
                <label>Ваш пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="auth-control">
                <button class="btn" type="submit">Войти</button>
            </div>
        </form>
    </body>
</html>

