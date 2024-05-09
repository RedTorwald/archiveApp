@extends('layouts.app')

@section('title', 'Выданные документы')

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
            padding: 10px 20px; 
            background-color: #A9A9A9; 
            color: black; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        }

        button[type="submit"]:hover {
            background-color: #808080; 
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
    <h1>Выданные документы</h1>

    <div>
        <a href="{{ route('documents.all') }}">Все документы</a> |     
        <a href="{{ route('specific_status_documents.status2') }}">Выданные документы</a> |
        <a href="{{ route('specific_status_documents.status3') }}">Утилизированные документы</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>Название</th>
                <th>Дата получения</th>
                
                <th>Тип документа</th>
                <th>Статус документа</th>
                <th>Дата выдачи</th>
                <th>Ответственное лицо</th>
                <th>В архив</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specificStatusDocumentsStatus2 as $document)
                <tr>
                    <td>{{ $document->Title }}</td>
                    <td>{{ $document->DateReceived }}</td>
                    
                    <td>{{ App\Models\DocumentType::find($document->Type)->name }}</td>
                    <td>{{ App\Models\DocumentStatus::find($document->Status)->name }}</td>
                    <td>{{ $document->DisposableDate }}</td>
                    <td>{{ $document->ResponsiblePerson }}</td>
                   
                    <td>
                        <form action="{{ route('documents.create') }}" method="GET">
                            @csrf
                            <input type="hidden" name="document_id" value="{{ $document->id }}">
                            <button type="submit">Вернуть в архив</button>
                        </form>
                    </td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
