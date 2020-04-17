@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><a href="{{ route('annonces')}}">See all Annonces</a></div>
                <div class="card-header">My Annonces</div>
                <div class="card-body">
                <ul>
                    @foreach($annonces as $annonce)
                        <li>
                            <a href="{{ route('annonce', $annonce->id) }}">
                                {{ $annonce->titre }} ---> <b>{{ $annonce->prix }}$</b>
                            </a>
                        </li>
                    @endforeach
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection