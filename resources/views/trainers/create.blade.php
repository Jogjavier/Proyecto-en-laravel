<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Trainer</title>
</head>
<body>
    <h1>Agregar un Entrenador</h1>

    <!-- Formulario para agregar un entrenador -->
    <form action="{{ route('trainers.store') }}" method="POST">
        @csrf
        <label for="name">Nombre del Entrenador:</label>
        <input type="text" name="name" id="name" placeholder="Nombre del entrenador" required>
        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('trainers.index') }}">Ver la lista de entrenadores</a>
</body>
</html>
