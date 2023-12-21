<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
    <div class="header">
        <a href="/">
            <img src="/images/logo.png" alt="Вернутся на главную">
        </a>
    </div>

    <div class="links">
        <a href="{{url('catalog')}}">Каталог</a>
        <a href="{{url('profile')}}">Личный кабинет</a> 
        @guest
        <a href="{{route('reg')}}">Регистрация</a>
        @endguest
        @auth
           <a href="{{route('logout')}}">Выйти</a>
        @endauth
    </div>
    
    <div class="pizza_page_body">
        <div class="pizza_page_main">
            <img src="/images/{{$all_recipes->image}}" alt="Пицца">
            <p class="pizza_ingridients_title">Ингридиенты:</p>
            <p class="pizza_ingridients">{{$all_recipes->ingridients}}</p>
            @auth
            <a href="{{url('/payment/'. $all_recipes->id)}}" class="order_buy">Перейти к оплате {{$all_recipes->price}} ₽</a>
            @endauth
            @guest
            <a href="{{url('reg')}}" class="guest_reg">Зарегистрироваться</a>
            @endguest
        </div>
    </div>
</body>
</html>