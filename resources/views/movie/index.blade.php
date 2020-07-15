@extends('layouts.app')

@section('content')

<h1>Movies list</h1>
<hr>
<a href="/create">Create new</a>
<table border="1">
    <tr>
        <th>Movie name</th>
        <th>Cost</th>
        <th>Date</th>
        <th>Genre</th>
        <th></th>
    </tr>
    @foreach ($movies as $movie)
        <tr>
            <td><a href="/show/{{$movie->id}}">{{ $movie->name }}</a></td>
            <td>{{ $movie->cost }}</td>
            <td>{{ $movie->release_date }}</td>
            <td>{{ $movie->genre->name }}</td>
            <td><a href="/edit/{{$movie->id}}">Edit</a></td>
        </tr>
    @endforeach
</table>

@endsection