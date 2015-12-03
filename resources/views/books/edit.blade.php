@extends('app')

@section('content')

    <h1>Edit {!! $book->title !!}</h1>

    <hr/>

    {!! Form::model($book, ['method' => 'PATCH', 'action' => ['bookscontroller@update', $book->id]]) !!}
        @include('books.form', ['submitButtonText' => 'Update Book'])
    {!! Form::close() !!}

    @include('errors.list')

@stop