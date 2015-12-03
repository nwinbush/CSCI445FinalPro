@extends('app')

@section('content')

    <h1>Create a new book</h1>

    <hr/>

    {!! Form::open(['url' => 'books']) !!}
        @include('books.form', ['submitButtonText' => 'Add Book'])
    {!! Form::close() !!}

    @include('errors.list')

@stop