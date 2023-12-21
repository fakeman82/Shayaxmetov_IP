<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
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
        @guest
        <a href="{{route('reg')}}">Регистрация</a>
        @endguest
        @auth
           <a href="{{route('logout')}}">Выйти</a>
        @endauth
    </div>
    

    {{-- <label for="pizzaType">Выберите тип пиццы:</label>
<select id="pizzaType" onchange="filterPizza()">
    <option value="all">Все пиццы</option>
    <option value="Regular">Обычные</option>
    <option value="Combo">Комбо</option>
</select> --}}


    <div class="catalog_body_first">
        @foreach ($all_recipes as $pizza)
        <div class="first_column" pizzaType="united-pizzas">
            <div class="pizza_image">
                <img src="images/{{$pizza->image}}" alt="Пицца">
            </div>
            <div class="pizza_title">
                <p class="first_column_name">{{$pizza->title}} </p>
                <p class="pizza_price">{{$pizza->price}}₽</p>
            </div>
            <div class="pizza_link">
                <a href="{{url('/pizza_page/' .$pizza->id)}}">Посмотреть</a>
            </div>
            
        </div>
        @endforeach
        <div class="paginate">
            <div class="paginate_link">
                {{ $all_recipes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</body>
</html>