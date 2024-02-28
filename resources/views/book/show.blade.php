@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>{{$book->title}}</h2></div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Pavadinimas: {{$book->title}}</li>
                            <li class="list-group-item">Autorius: {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</li>
                            <li class="list-group-item">Puslapių skaičius: {{$book->pages}}</li>
                            <li class="list-group-item">ISBN kodas: {{$book->isbn}}</li>
                            <li class="list-group-item">Aprašymas: {!!$book->short_description!!}</li>
                        </ul>
                        <br>
                        <a class="btn" href="{{route('book.index',[$book])}}">Grįžti</a>
                        <a class="btn" href="{{route('book.edit',[$book])}}">Redaguoti</a>
                        <a class="btn" href="{{route('book.pdf',[$book])}}">Saugoti kaip PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
