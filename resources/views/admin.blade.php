<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Ингридиенты</th>
            <th>Фотография</th>
            <th>Цена</th>
            <th>Категория</th>
        </tr>
        <tbody>
            @foreach ($applications as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->ingridients}}</td>
                <td>{{$item->photo}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->category}}</td>
                <td>
                    <a href="{{ url('admin_update/'. $item->id) }}">Изменить</a>
                </td>
                <td>
                    <a href="{{url('admin_delete/'. $item->id)}}">Удалить</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="admin_title_add">Добавить товар</p>
    <div class="addPizza">
        <form method="post" action="{{url('admin_add')}}">
            @csrf
            <label>Название</label>
            <input type="text" name="title">
            @error('title')
            {{$message}}
            @enderror
            <label>Ингридиенты</label>
            <input type="text" name="ingridients">
            @error('ingridients')
            {{$message}}
            @enderror
            <label>Фотография</label>
            <input type="file" name="image">
            @error('image')
            {{$message}}
            @enderror
            <label>Цена</label>
            <input type="text" name="price">
            @error('price')
            {{$message}}
            @enderror
            <label>Категория</label>
            <input type="text" name="category">
            @error('category')
            {{$message}}
            @enderror
            <button type="submit" class="btn_admin_add">Добавить пиццу</button>
        </form>
    </div>
</body>
</html>