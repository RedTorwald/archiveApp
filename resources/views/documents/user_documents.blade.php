
@extends('layouts.app')

@section('title', 'Список всех документов')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Мои документы</div>

                <div class="card-body">
                    @if ($documents->count() > 0)
                        <ul>
                            @foreach ($documents as $document)
                                <li>{{ $document->Title }}</li>
                                
                            @endforeach
                        </ul>
                    @else
                        <p>У вас пока нет документов.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection