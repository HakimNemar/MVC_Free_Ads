@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Annonce') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save.edit', $annonce->id) }}">
                        @csrf

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">    
                                {{session('success')}}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Tilte') }}</label>

                            <div class="col-md-6">
                                <input id="title" value="{{ $annonce->titre }}" type="text" class="form-control @error('name') is-invalid @enderror" name="title" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" value="{{ $annonce->description }}" type="text" class="form-control @error('email') is-invalid @enderror" name="description" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo (URL)') }}</label>

                            <div class="col-md-6">
                                <input id="photo" value="{{ $annonce->photographie }}" type="text" class="form-control @error('password') is-invalid @enderror" name="photo" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="prix" value="{{ $annonce->prix }}" type="text" class="form-control" name="prix" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                            <a href="">
                                <button class="btn btn-danger">{{ __('Delete') }}</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
