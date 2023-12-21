<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="header_reg">
        <a href="/">
            <img src="images/logo.png" alt="">
        </a>
    </div>
    <div class="auth">
        <form action="{{route('auth')}}" method="post">
            @csrf
            <p class="auth_title">Авторизация</p>
            <label>Номер телефона</label>
            <input type="text" placeholder="Введите номер телефона" name="phone">
            @error('phone')
            {{$message}}
            @enderror
            <label>Пароль</label>
            <input type="password" placeholder="Введите пароль" name="password">
            @error('password')
            {{$message}}
            @enderror
            <button type="submit" class="button">Войти</button>
            <p class="auth_link">Вы не зарегистрированы?<a href="{{route('reg')}}">Зарегистрироваться</a></p>
        </form>
    </div>
</body>
</html>