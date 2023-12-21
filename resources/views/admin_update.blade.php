<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container_admin_update">
        <form action="{{url('admin_update/'.$update->id)}}" class="admin_update_form" method="post">
            @csrf
            <label>Изменить название</label>
            <input type="text" name="title" value="{{$update->title}}">
            @error('title')
            {{$message}}
            @enderror
            <label>Изменить ингридиенты</label>
            <input type="text" name="ingridients" value="{{$update->ingridients}}">
            @error('ingridients')
            {{$message}}
            @enderror
            <label>Изменить фотографию</label>
            <input type="file" name="image" value="{{$update->image}}">
            @error('image')
            {{$message}}
            @enderror
            <label>Изменить цену</label>
            <input type="text" name="price" value="{{$update->price}}">
            @error('price')
            {{$message}}
            @enderror
            <label>Изменить категорию</label>
            <input type="text" name="category" value="{{$update->category}}">
            @error('category')
            {{$message}}
            @enderror
            <button type="submit" class="btn_admin_update">Изменить</button>
        </form>
    </div>
</body>
</html>