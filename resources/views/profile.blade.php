<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="header">
        <a href="/">
            <img src="images/logo.png" alt="Вернутся на главную">
        </a>
    </div>
    <div class="links">
        <a href="{{url('catalog')}}">Каталог</a>
        @guest
        <a href="{{route('reg')}}">Регистрация</a>
        @endguest
        @auth
           <a href="{{route('logout')}}">Выйти</a>
        @endauth
    </div>

    <div class="profile_info">
        @guest
        <p class="phone_number">Номер телефона: </p>
        <p class="profile_name">Имя:</p>
        <p class="profile_surname">Фамилия:</p>
        @endguest
        @auth
        <p class="phone_number">Номер телефона: {{$all_users->phone}}</p>
        <p class="profile_name">Имя: {{$all_users->name}} </p>
        <p class="profile_surname">Фамилия: {{$all_users->surname}} </p>
        @endauth
    </div>

    
</body>
</html>