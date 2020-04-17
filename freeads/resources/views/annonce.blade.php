@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('annonces')}}">See all Annonces</a></div>
                <div class="card-body">

                        <img src="{{ $annonce->photographie }}" alt="{{ $annonce->titre }}" width="688px" height="497px">
                        <p><b>Title:</b> {{ $annonce->titre }} </p>
                        <p><b>Description:</b> {{ $annonce->description }}</p>
                        <p><b>Price:</b> {{ $annonce->prix }}$</p>
                        <p><b>By Id:</b> {{ $annonce->editor_id }}</p>

                    @if ($annonce->editor_id == $auth->id)
                        <a href="{{ route('edit.Annonce', $annonce->id) }}"><button class="btn btn-info">Edit</button></a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
