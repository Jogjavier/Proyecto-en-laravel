@extends('layouts.app')

@section('title', 'Lista de Entrenadores')

@section('content')
    <div class="container mt-5">
        <h2>Lista de Entrenadores</h2>

        <!-- Lista de entrenadores -->
        <div class="row">
            @foreach($trainers as $trainer)
                <div class="col-md-4">
                    <div class="card text-center" style="width: 18rem; margin-top: 20px;">
                        
                        <!-- Mostrar imagen subida (avatar) si existe, si no mostrar una imagen por defecto -->
                        <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" 
                             class="card-img-top rounded-circle mx-auto d-block" 
                             src="{{ $trainer->avatar ? asset('storage/' . $trainer->avatar) : asset('images/default-avatar.png') }}" 
                             alt="{{ $trainer->name }}">
                             
                        <div class="card-body">
                            <h5 class="card-title">{{ $trainer->name }}</h5>
                            <p class="card-text">Entrenador especializado en el área de entrenamiento personal.</p>
                            <a href="/trainers/{{ $trainer->slug }}" class="btn btn-primary">Ver Perfil</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

