@extends('layouts.app')

@section('title', 'Документы со специальными статусами')

@section('content')
    <h1>Документы со специальными статусами</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Название</th>
                <th>Дата получения</th>
                
                <th>Тип документа</th>
                <th>Статус документа</th>
                <th>Дата утилизации</th>
                <th>Ответственное лицо</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specificStatusDocuments as $document)
                <tr>
                    <td>{{ $document->Title }}</td>
                    <td>{{ $document->DateReceived }}</td>
                    
                    <td>{{ App\Models\DocumentType::find($document->Type)->name }}</td>
                    <td>{{ App\Models\DocumentStatus::find($document->Status)->name }}</td>
                    <td>{{ $document->DisposableDate }}</td>
                    <td>{{ $document->ResponsiblePerson }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
