<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="header">
        <a href="/">
            <img src="/images/logo.png" alt="Вернутся на главную">
        </a>
    </div>
    <div class="links">
        <a href="{{url('profile')}}">Личный кабинет</a> 
        <a href="{{url('catalog')}}">Каталог</a>
    </div>
    
    <p class="payment_title">Оформление оплаты</p>

    <div class="payment_choose">
    <h1>Выберите способ оплаты: </h1>
    <label>Кредитная карта
        <input type="radio" name="payment" value="credit_card"><br>
    </label>
    <label>Наличными
        <input type="radio" name="payment" value="paypal"> <br><br>
    </label>
    </div>

    <div id="credit_card_form" style="display: none;">
        <h2>Введите данные карты:</h2>
        <form action="{{url('make_order')}}" method="POST">
            @csrf
            <label for="card_number">Номер карты:</label>
            <input type="text" id="card_number" name="card_number" required><br><br>
            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
            
            <label for="expiry_date">Срок действия:</label>
            <input type="text" id="expiry_date" name="expiry_date" required><br><br>
            
            <label for="cvv">CVV код:</label>
            <input type="text" id="cvv" name="cvv" required><br><br>
            <button type="submit">Оплатить</button>
    </div>
        </form>
    <div id="paypal_form" style="display: none;">
        <h2>Введите свои данные</h2>
        <form action="{{url('make_order')}}" method="post">
            @csrf
            <label for="paypal_email">Номер телефона</label>
            <input type="text" id="paypal_email" name="paypal_email" required><br><br>
            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
            
            
            <label for="paypal_password">Имя</label>
            <input type="text" id="paypal_password" name="paypal_password" required><br><br>
            <button type="submit">Получить чек</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('input[type=radio][name=payment]').change(function() {
                if (this.value === 'credit_card') {
                    $('#credit_card_form').show();
                    $('#paypal_form').hide();
                }
                else if (this.value === 'paypal') {
                    $('#credit_card_form').hide();
                    $('#paypal_form').show();
                }
            });
        });
    </script>

    <p class="payment_title">Ваш заказ</p>

    <div class="payment_order">
        <div class="payment_order_img">
            <img src="/images/{{$all_recipes->image}}" alt="Пицца">
            <p class="first_column_name">{{$all_recipes->title}} {{$all_recipes->price}} ₽ </p>
        </div>
            
    </div>

    

</body>
</html>