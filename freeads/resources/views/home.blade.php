@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('annonces') }}"><div class="card-header">Annonces</div></a>
                <a href="{{ route('edit.profile', $auth->id) }}"><div class="card-header">Edit Profile</div></a>
                <div class="card-header">Dashboard Users</div>
                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->

                    @foreach($users as $user)
                        {{ $user->id }}
                        <a href="{{ route('profile.show', $user->id) }}">{{ $user->name }}</a>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
