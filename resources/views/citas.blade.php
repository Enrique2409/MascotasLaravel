@extends('layouts.template')
@section('content')

<div class="container">
    <h1>Crear Cita</h1>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>

        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date" required>

        <label for="time">Hora:</label>
        <input type="time" name="time" id="time" required>

        <button type="submit">Guardar Cita</button>
    </form>
</div>
<div class="container mt-5">
    <h2>Lista de Citas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection