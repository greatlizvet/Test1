@extends('layouts.app')

@section('content')

<h1>Добавление новой пасты</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Название пасты</label>
                <input type="text" name="name" id="name" class="form-control col-6">
            </div>
            <div class="form-group">
                <label for="body">Содержание пасты</label>
                <textarea class="form-control col-6" name="body" id="body" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="time">Срок жизни пасты</label>
                <select name="time" id="time" class="form-control col-6">
                    @foreach($intervals as $interval)
                        <option value="{{ $interval['value'] }}">{{ $interval['text'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Доступность пасты</label>
                <select name="status" id="status" class="form-control col-6">
                    @foreach($statuses as $status)
                        <option value="{{ $status['value'] }}">{{ $status['text'] }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-dark">Добавить</button>
        </form>

@endsection