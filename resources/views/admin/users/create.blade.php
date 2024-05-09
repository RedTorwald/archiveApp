@extends('layouts.admin')

@section('title', 'Создать нового пользователя')

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

    .input-card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        padding: 20px;
        margin: 20px auto; 
        max-width: 700px; 
    }

    .input-card label {
        display: block;
        margin-bottom: 10px;
    }

    .input-card input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .input-card button[type="submit"] {
        padding: 10px 20px;
        background-color: #A9A9A9;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-card button[type="submit"]:hover {
        background-color: #808080;
    }
</style>

<div class="input-card">
    <h1>Создать нового пользователя</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div>
            <label for="login">Логин:</label>
            <input type="text" id="login" name="Login" required>
        </div>

        <div>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="Password" required>
        </div>

        <div>
            <label for="role">Роль:</label>
            <input type="text" id="role" name="Role" required>
        </div>

        <button type="submit">Создать</button>
    </form>
</div>
@endsection
