@extends('layouts.app')

@section('title', 'Редактирование статуса документа')

@section('content')


<style>

    h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }
   
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        font-size: 18px; 
    }

    input[type="text"],
    input[type="date"],
    .input-full-width,
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #fff;
        margin-bottom: 10px; 
        font-size: 18px; 
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px; 
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }


    select {
        width: 100%; 
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px; 
        background-color: #fff; 
    }
</style>

<h1>Изменение статуса документа</h1>

<form action="{{ route('documents.update', $document->DocumentID) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Название документа:</label>
        <input type="text" id="title" name="title" class="form-control input-full-width" value="{{ $document->Title }}" readonly>
    </div>
   
    <div class="form-group">
        <label for="date_received">Дата получения:</label>
        <input type="date" id="date_received" name="date_received" class="form-control input-full-width" value="{{ $document->DateReceived }}" readonly required>
    </div>

    
    <div class="form-group">
        <label for="type">Тип документа:</label>
        <div class="input-full-width value ">{{ $type }}</div>
    </div>
 

    <div class="form-group">
        <label for="status">Статус документа:</label>            
            <select name="status" style="font-size: 18px;">
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ $document->Status == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>          
    </div>
    
    
    <div class="form-group">
        <label for="disposable_date">Дата утилизации:</label>
        <input type="date" id="disposable_date" name="disposable_date" class="form-control input-full-width" value="{{ $document->DisposableDate }}" readonly>
    </div>


    <div class="form-group">
        <label for="responsable_person">Ответственный:</label>
        <input type="text" id="responsable_person" name="responsable_person" class="form-control input-full-width" value="">
    </div>
    
    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
</form>

@endsection