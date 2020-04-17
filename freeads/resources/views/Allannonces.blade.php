@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('home', $auth->id) }}"><div class="card-header">Home</div></a>
                <a href="{{ route('create.Annonce') }}"><div class="card-header">Create Annonce</div></a>
                <a href="{{ route('my.Annonces', $auth->id) }}"><div class="card-header">My Annonces</div></a>
                <div class="card-header">All Annonces</div>
                <div class="card-body">
                <ul>
                    @foreach($annonces as $annonce)
                        <li><a href="{{ route('annonce', $annonce->id) }}">{{ $annonce->titre }} ---> <b>{{ $annonce->prix }}$</b></a></li>
                    @endforeach
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
