@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                @auth
                <div class="card-header">{{ __('Sveiki '.Auth::user()->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Jūs esate prisijunges!') }}
                </div>
            </div>
            @else
            <div class="card-header">{{ __('Sveiki atvyke į biblioteką!') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Prašome prisijungti!') }}
            </div>


            @endauth


        </div>
    </div>
</div>
@endsection
