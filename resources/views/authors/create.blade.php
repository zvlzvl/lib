@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Naujas autorius</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Vardas</label>
                            <input class="form-control" type="text" name="author_name" value="{{old('author_name')}}" placeholder="Autoriaus vardas">
                        </div>
                        <div class="form-group">
                            <label>Pavardė</label>
                            <input class="form-control" type="text" name="author_surname" value="{{old('author_surname')}}" placeholder="Autoriaus pavardė">
                        </div>
                        <div class="form-group list-img">
                            <label>Portretas</label>
                            <input class="form-control" type="file" name="author_portret" placeholder="Autoriaus vardas">
                        </div>
                        @csrf
                        <button type="submit" class="btn">Pridėti</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
