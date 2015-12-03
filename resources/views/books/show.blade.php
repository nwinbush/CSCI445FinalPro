@extends('app')

@section('content')
<h1>{{ $book->title }}</h1>
<p>{{ $book->author }} ({{ $book->year }}) {{ $book->comments }}</p>

@stop