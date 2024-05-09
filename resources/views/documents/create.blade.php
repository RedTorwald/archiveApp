@extends('layouts.app')

@section('title', 'Регистрация нового документа')

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
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
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

</style>



<h1>Регистрация нового документа</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif



<form action="{{ route('documents.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Название документа</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>
    

    <div class="form-group">
        <label for="date_received">Дата получения</label>
        <input type="date" id="date_received" name="date_received" class="form-control" value="{{ now()->toDateString() }}" required>
    </div>

    <div class="form-group">
        <label for="type">Тип документа:</label>
        <select name="type" class="form-control" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status">Статус документа:</label>
        <select name="status" class="form-control" required>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="responsible_person">Ответственный за документ:</label>
        <input type="text" name="responsible_person" class="form-control" required>
    </div>
    

    <div class="form-group">
        <label for="archive_id">Место в архиве:</label>
        <select name="archive_id" class="form-control" required>
            @foreach($archives as $archive)
                @php
                    $capacity = $archive->document_capacity;
                @endphp
                @if($capacity < 6)
                <option value="{{ $archive->ArchiveID }}">
                    Ряд: {{ $archive->Row }}, 
                    Стеллаж: {{ $archive->Shelf }}, 
                    Полка: {{ $archive->ShelfPosition }},
                    Доступных мест: {{ $archive->DocumentCapacity }} 
                </option>
                @else
                    
                @endif
            @endforeach
        </select>
    </div>


    
    <button type="submit" class="btn btn-primary">Зарегистрировать</button>
</form>
@endsection