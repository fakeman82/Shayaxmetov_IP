<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="header">
        <a href="/">
            <img src="images/logo.png" alt="Вернутся на главную">
        </a>
    </div>
    <div class="links">
        <a href="{{url('profile')}}">Личный кабинет</a>
        <a href="{{url('catalog')}}">Каталог</a>

        @guest
        <a href="{{route('reg')}}">Регистрация</a>
        @endguest
        @auth
           <a href="{{route('logout')}}">Выйти</a>
        @endauth
    </div>

    <div class="banner">
        <img src="images/pizza-banner3.jpg" alt="">
    </div>

    <p class="popular">Популярные пиццы</p>

    <div class="cards">
        @foreach ($all_recipes as $recipe)
        <div class="card1">
            <img src="images/{{$recipe->image}}">
            <p class="description">{{$recipe->title}}</p>
            <a href="{{url('/pizza_page/' .$recipe->id)}}">Посмотреть</a>
        </div>
        @endforeach
        

    <script src="script/script.js"></script>
</body>
</html>