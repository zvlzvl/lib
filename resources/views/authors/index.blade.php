@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Autorių sąrašas</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Vardas</th>
                                    <th scope="col">Pavardė</th>
                                    <th scope="col">Redaguoti</th>
                                    <th scope="col">Pašalinti</th>
                                    <th scope="col">Nuotrauka</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{$author->name}}</td>
                                    <td>{{$author->surname}}</td>
                                    <form method="POST" action="{{route('author.destroy', $author)}}">
                                        @csrf
                                        <td>
                                            <a class="btn" href="{{route('author.edit',[$author])}}">Redaguoti</a>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn">Trinti</button>
                                        </td>
                                    </form>
                                    <td>
                                        <div class="list-img">
                                            @if($author->portret)
                                            <img src="{{$author->portret}}" alt="{{$author->name}} {{$author->surname}}">
                                            @else
                                            <img src="{{asset('portrets/images.jpg')}}" alt="{{$author->name}} {{$author->surname}}">
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
