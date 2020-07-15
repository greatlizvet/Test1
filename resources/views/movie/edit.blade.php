@extends('layouts.app')

@section('content')

<h1>Movie</h1>
<hr>

<form method="POST" action="/update">
    @csrf
    <input type="hidden" value="{{$movie->id}}" name="id">
    <input type="text" value="{{ $movie->name }}" name="name" id="name">
    <input type="text" value="{{ $movie->cost }}" name="cost" id="cost">
    <input type="date" value="{{ $movie->release_date }}" name="release_date" id="release_date">
    <select name="genre_id" id="genre_id">
        @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <input type="submit">
</form>

@endsection