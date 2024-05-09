@extends('layouts.admin')

@section('title', 'Список всех документов')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f2f2f2;
    }

    button[type="submit"] {
        padding: 10px 20px; /* добавляем отступы */
        background-color: #A9A9A9; /* задаем цвет фона */
        color: black; /* задаем цвет текста */
        border: none; /* убираем границу */
        border-radius: 5px; /* добавляем скругление углов */
        cursor: pointer; /* меняем курсор при наведении */
    }

    button[type="submit"]:hover {
        background-color: #808080; /* изменяем цвет фона при наведении */
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
</head>
<body>
    <h1>Список пользователей</h1>

    <table>
        <thead>
            <tr>               
                <th>Логин</th>
                <th>Пароль</th>
                <th>Роль</th>              
                <th>Редактирование</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
               
                <td>{{ $user->Login }}</td>
                <td>{{ $user->Password }}</td>
                <td>{{ $user->Role }}</td>
                <td>                    
                    <form action="{{ route('admin.users.edit', ['user' => $user->UserID]) }}" method="GET">
                        @csrf
                        <button type="submit">Редактировать</button>
                    </form>
                </td>                     
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="height: 20px;">                    
                    <form action="{{ route('admin.users.create') }}" method="GET" style="height: 100%;">
                        @csrf
                        <button type="submit" style="height: 100%; width: 100%; font-size: 18px; margin: 0;">Создать нового пользователя</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>
@endsection