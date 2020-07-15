@extends('layouts.app')

@section('content')

<h1>Паста: {{ $pasta->name }}</h1>
<p>Дата создания: {{ $pasta->create_date }}</p>
<p>{{ $pasta->body }}</p>

@endsection