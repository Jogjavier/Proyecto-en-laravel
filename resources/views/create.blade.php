@extends('layouts.app')
@section('title', 'Trainers create')
@section('content')
<div class="container mt-5">
    <h2>Crear un nuevo entrenador</h2>

    <form action="{{ route('trainers.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Entrenador:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del entrenador" required>
        </div>

        <div class="form-group">
            <label for="avatar">Subir Avatar:</label>
            <input type="file" name="avatar" id="avatar" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
