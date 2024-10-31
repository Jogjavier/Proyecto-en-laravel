@extends('layouts.app')
@section('title', 'Editar Entrenador')
@section('content')

<form class="form-group" method="POST" action="{{ route('trainers.update', $trainer->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ $trainer->name }}" class="form-control" required>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" value="{{ $trainer->apellido }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" class="form-control-file">
        
        @if($trainer->avatar)
            <p>Imagen actual:</p>
            <img src="{{ asset('storage/images/' . $trainer->avatar) }}" alt="Avatar del entrenador" width="150">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

@endsection
