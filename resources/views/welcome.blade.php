@extends('layouts.app')

@section('title', 'Главная страница')



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
@section('content') 
<style>
    
    .card {
        width: 800px; 
        margin: auto; 
        border: 1px solid #ccc; 
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    
    .card-header {
        background-color: #2F4F4F; 
        color: #fff; 
        padding: 10px; 
        font-weight: bold; 
        border-top-left-radius: 8px; 
        border-top-right-radius: 8px; 
    }

    
    .card-body {
        padding: 20px; 
    }

    
    ol {
        padding-left: 20px; 
    }

    
</style>

<div class="card">
        <div class="card-header">
            Правила работы в архиве
        </div>
        <div class="card-body">
            <ul>
                <li>Для получения доступа к архиву необходимо иметь соответствующие разрешения.</li>
                <li>Запрещается пользоваться архивом без разрешения администратора.</li>
                <li>Необходимо соблюдать порядок при работе с документами.</li>
            </ul>
        </div>
    </div>
</html>

@endsection
