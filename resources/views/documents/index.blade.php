
@extends('layouts.app')

@section('title', 'Список всех документов')

@section('content')

<h1>Документы пользователя</h1>

<ul>
@foreach ($documents as $document)
    <p>{{ $document->Title }}</p>    
@endforeach

<div class="form-group">
        <label>Дата ответа</label>            
    </div>
</ul>
@endsection

