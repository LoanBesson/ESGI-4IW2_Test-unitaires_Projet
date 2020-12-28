@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créaion d'un item dans votre todolist</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('todolist.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input id="name" type="string" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contentText" class="col-md-4 col-form-label text-md-right">Contenu</label>
                                <div class="col-md-6">
                                    <textarea id="contentText" class="form-control @error('contentText') is-invalid @enderror" name="contentText" required autocomplete="contentText">
                                        {{ old('contentText') }}
                                    </textarea>
                                    @error('contentText')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('Ajouter')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
