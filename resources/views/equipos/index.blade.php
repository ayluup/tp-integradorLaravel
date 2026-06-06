<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Laboratorio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h1 class="text-center mb-4">Sistema de Gestión del Laboratorio</h1>

    {{-- MENSAJE ÉXITO --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORMULARIO --}}
    <div class="card p-3 mb-4">
        <h4>Agregar equipo</h4>

        <form method="POST" action="{{ route('equipos.store') }}">
            @csrf

            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre del equipo">

            <input type="text" name="numero_serie" class="form-control mb-2" placeholder="Número de serie">

            <textarea name="descripcion" class="form-control mb-2" placeholder="Descripción"></textarea>

            <button class="btn btn-primary">Guardar</button>
        </form>
    </div>

    {{-- LISTADO --}}
    <div class="card p-3">
        <h4>Listado de equipos</h4>

        @forelse($equipos as $equipo)
            <div class="border rounded p-2 mb-2">
                <strong>{{ $equipo->nombre }}</strong><br>
                Serie: {{ $equipo->numero_serie }}<br>
                {{ $equipo->descripcion }}
            </div>
        @empty
            <div class="alert alert-warning">
                No hay equipos cargados.
            </div>
        @endforelse
    </div>

</div>

</body>
</html>