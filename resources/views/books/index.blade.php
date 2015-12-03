@extends('app')

@section('content')
<p>Here are my favorite books:</p>

<table class="table table-striped table-bordered">
    @foreach($books as $book)
        <tr>
            <td><a href="{{ action('bookscontroller@show', [$book->id]) }}">{{ $book->title }}</a></td>
            <td>{{ $book->author }}</td>
            <td><a href="{{ action('bookscontroller@show', [$book->id]) }}" class="btn btn-primary">Show Book</a></td>
            <td><a href="{{ action('bookscontroller@edit', [$book->id]) }}" class="btn btn-primary">Edit Book</a></td>
        </tr>
    @endforeach
</table>

@stop

@section('footer')
<footer>
   <p>Displaying {{count($books)}} books. Wow! That's a lot of books!</p>
</footer>
@stop
