@extends('layouts.app')

@section('content')

<h1>Сервис по добавлению своих паст</h1>

<a href="/create" class="btn btn-dark">Добавить новую</a>

@if(session('status'))
    <div class="alert alert-success col-6">
        <p>Добавление успешно произведено!</p>
        Ссылка: {{ session('status') }}
    </div>
@endif

@endsection