@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/store">
    @csrf
    <input type="text" name="name", id="name">
    <input type="text" name="cost", id="cost">
    <input type="date" name="release_date" id="release_date">
    <select name="genre_id" id="genre_id">
        @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <input type="submit">
</form>

@endsection