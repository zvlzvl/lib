
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Knygų sąrašas</h2>
                    <form class="fieldset" action="{{route('book.index')}}" method="GET"> 
                        <fieldset class="sort">
                            <legend>Rūšiuoti pagal:</legend>
                                <div class="inputs">
                                    <input name="sort" type="radio" value="title" @if ($sort == 'title') checked @endif id="_1">
                                    <label for="_1">Pavadinimą</label>
                                </div>
                                <div class="inputs">
                                    <input name="sort" type="radio" value="pages" @if ($sort == 'pages') checked @endif id="_2">
                                    <label for="_2">Puslapių skaičių</label>
                                </div>
                                <div class="inputs"> 
                                    <input name="order" type="radio" value="asc" @if ($order == ''|| $order =='asc') checked @endif id="_3">
                                    <label for="_3">A-z</label>
                                    
                                    <input name="order" type="radio" value="desc" @if ($order == 'desc') checked @endif  id="_4">
                                    <label for="_4">Z-a</label>
                                </div>
                        </fieldset>
                        <fieldset class="sort">
                            <legend>Filtruoti:</legend>
                            <div class="inputs">
                                <select class="form-select" name="author_id">
                                    <option value="0">
                                        Pasirinkti autorių
                                    </option>
                                    
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}" @if($author_id == $author->id) selected @endif>
                                        {{$author->name}} {{$author->surname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>   
                        </fieldset>
                        @csrf
                        <button class="fieldset btn">Rūšiuoti</button>
                        <a class="fieldset btn" href="{{route('book.index')}}">Atnaujinti</a>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Pavadinimas</th>
                                    <th scope="col">Puslapių skaičius</th>
                                    <th scope="col">ISBN kodas</th>
                                    <th scope="col">Aprašymas</th>
                                    <th scope="col">Redaguoti</th>
                                    <th scope="col">Pašalinti</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($books as $book)
                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->pages}}</td>
                                    <td>{{$book->isbn}}</td>
                                    <form method="POST" action="{{route('book.destroy', $book)}}">
                                        @csrf
                                        <td>
                                            <a class="btn" href="{{route('book.show',[$book])}}">Apie knygą</a>
                                        </td>
                                        <td>
                                            <a class="btn" href="{{route('book.edit',[$book])}}">Redaguoti</a>
                                        </td>
                                        <td>      
                                            <button type="submit" class="btn">Trinti</button>
                                        </td>
                                    </form>
                                </tr>   
                            @empty
                            <tr>
                                <td>Šio autoriaus knygų nėra</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection