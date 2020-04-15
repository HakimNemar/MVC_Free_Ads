@extends('layouts.app')

@section('content')
    <div>
        <h3><b>Name:</b> {{$user[0]->name}}</h3>
        <h3><b>Email:</b> {{$user[0]->email}}</h3>
    </div>
@endsection