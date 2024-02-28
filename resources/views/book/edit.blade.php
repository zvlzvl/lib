
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Redaguoti knygą</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('book.update', $book)}}">
                        <div class="form-group">
                            <label>Pavadinimas</label>
                            <input class="form-control" type="text" name="book_title" value="{{old('book_title', $book->title)}}" placeholder="Knygos pavadinimas">
                        </div>
                        <div class="form-group">
                            <label>Puslapių skaičius</label>
                            <input class="form-control" type="text" name="book_pages" value="{{old('book_pages', $book->pages)}}" placeholder="Knygos puslapių skaičius">
                        </div>
                        <div class="form-group">
                            <label>ISBN kodas</label>
                            <input class="form-control" type="text" name="book_isbn" value="{{old('book_isbn', $book->isbn)}}" placeholder="Knygos ISBN kodas">
                        </div>
                        <div class="form-group">
                            <label>Apie knygą</label>
                            <textarea id="summernote" type="text" name="book_short_description">{{old('book_short_description', $book->short_description)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Autorius</label>
                            <select class="form-select" name="author_id">
                                <option value="0">Pasirinkti autorių</option>
                                 @foreach ($authors as $author)
                                <option value="{{$author->id}}" @if ($author->id == old('author_id', $book->author_id)) selected @endif>
                                    {{$author->name}} {{$author->surname}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        @csrf
                        <button type="submit" class="btn">Pridėti</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection