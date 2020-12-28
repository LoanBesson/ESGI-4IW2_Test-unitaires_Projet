@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Votre ToDoList') }} <a href="{{ route('todolist.create') }}" class="btn btn-success btn-sm">Créer un élément</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($todolist as $item)
                            <h3>{{ $item->name}}</h3>
                            <p>{{ $item->content }}<br><a href="{{ route('todolist.delete', $item) }}" class="btn btn-danger btn-sm">Supprimer</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
