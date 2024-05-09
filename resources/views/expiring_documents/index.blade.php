@extends('layouts.app')

@section('title', 'Список документов с истекающим сроком')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список документов с истекающим сроком</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
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

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table thead {
                display: none;
            }
            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: 10px;
            }
            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 14px;
                text-align: right;
            }
            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
        }
    </style>
</head>
<body>
    <h1>Истекающие документы</h1>

    @if($expiringDocuments->isEmpty())
        <p>Истекающие документы не найдены.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date Received</th>
                    <th>Disposable Date</th>
                    <th>Responsible Person</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Archive Location</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($expiringDocuments as $document)
                    <tr>
                        <td data-label="Title">{{ $document->Title }}</td>
                        <td data-label="Date Received">{{ $document->DateReceived }}</td>
                        <td data-label="Disposable Date">{{ $document->DisposableDate }}</td>
                        <td data-label="Responsible Person">{{ $document->ResponsiblePerson }}</td>
                        <td data-label="Status">{{ $document->status }}</td>
                        <td data-label="Type">{{ $document->type }}</td>
                        <td data-label="Archive Location">{{ $document->archive_info }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
@endsection
