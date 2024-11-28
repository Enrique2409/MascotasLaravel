@extends('layouts.template')

@section('content')

<div class="container mt-5">
    <h2>Agregar Mascota</h2>
    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
</div>


@endsection
