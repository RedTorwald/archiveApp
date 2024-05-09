@extends('layouts.app')

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



    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                <th>Дата утилизации</th>
                <th>Ответственное лицо</th>
                <th>Архив</th>
                <th>Выдача</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documentArchives as $documentArchive)
            <tr>
                <td>{{ $documentArchive->document->Title }}</td>
                <td>{{ $documentArchive->document->DateReceived }}</td>
                <td>{{ App\Models\DocumentType::find($documentArchive->document->Type)->name }}</td>
                <td>{{ App\Models\DocumentStatus::find($documentArchive->document->Status)->name }}</td>
                <td>{{ $documentArchive->document->DisposableDate }}</td>
                <td>{{ $documentArchive->document->ResponsiblePerson }}</td>
                <td>{{ $documentArchive->archive ? $documentArchive->archive->Row . ' (Ряд) - ' . $documentArchive->archive->Shelf . ' (Стеллаж) - ' . $documentArchive->archive->ShelfPosition . ' (Полка)' : 'Нет места в архиве' }}</td>
                <td>
                    <form action="{{ route('documents.edit', $documentArchive->document->DocumentID) }}" method="GET">
                        @csrf
                        <button type="submit">Смена статуса</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection