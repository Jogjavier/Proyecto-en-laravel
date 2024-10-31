@extends('layouts.app')

@section('title', 'Lista de Entrenadores')

@section('content')
    <div class="container mt-5">
        <h2>Lista de Entrenadores</h2>

        
        <div class="row">
            @foreach($trainers as $trainer)
                <div class="col-md-4">
                    <div class="card text-center" style="width: 18rem; margin-top: 20px;">
                        
                        
                        <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" 
                        class="card-img-top rounded-circle mx-auto d-block" 
                            class="card-img-top rounded-circle mx-auto d-block" 
                             src="{{ $trainer->avatar ? asset('storage/images/' . $trainer->avatar) : asset('images/default-avatar.png') }}" 
                             alt="{{ $trainer->name }}">
                             
                        <div class="card-body">
                            <h5 class="card-title">{{ $trainer->name }}</h5>
                            <p class="card-text">Entrenador especializado en el área de entrenamiento personal.</p>
                            <a href="/delete/{{ $trainer->id }}" class="btn btn-primary">Delete...</a>
                            <a href="/trainers/{{$trainer->id}}" class="btn btn-secondary">Mostrar...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

