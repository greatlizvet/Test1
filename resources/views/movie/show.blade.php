@extends('layouts.app')

@section('content')

<h1>{{ $movie->name }}</h1>
<p>Date: {{ $movie->release_date }}</p>
<p>Cost: {{ $movie->cost }}</p>
<p>Genre: {{ $movie->genre->name }}</p>

<a href="/">Back to List</a>

@endsection