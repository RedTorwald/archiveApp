@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')


<h1>Пользователи</h1>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->Login }} ({{ $user->Role }})</li>
        <li>{{ $user->UserID }} </li>
        <li>{{ $user->Password }} </li>
    @endforeach
</ul>

@csrf
@endsection