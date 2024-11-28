@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h2>Lista de Mascotas</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Edad</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->type }}</td>
                <td>{{ $pet->description }}</td>
                <td>{{ $pet->age }}</td>
                <td><img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}" width="100"></td>
                <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        Agregar
                    </button>

                    <button class="btn btn-warning btn-edit" data-toggle="modal" data-target="#editModal"
                        data-id="{{ $pet->id }}" data-name="{{ $pet->name }}" data-type="{{ $pet->type }}"
                        data-description="{{ $pet->description }}" data-age="{{ $pet->age }}">
                        Editar
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $pet->id }}">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar Mascota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" method="POST" action="{{ route('pets.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addName">Nombre</label>
                        <input type="text" class="form-control" id="addName" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="addType">Tipo</label>
                        <input type="text" class="form-control" id="addType" name="type" required>
                    </div>

                    <div class="form-group">
                        <label for="addDescription">Descripción</label>
                        <input type="text" class="form-control" id="addDescription" name="description" required>
                    </div>

                    <div class="form-group">
                        <label for="addAge">Edad</label>
                        <input type="number" class="form-control" id="addAge" name="age" required>
                    </div>

                    <div class="form-group">
                        <label for="addImage">Imagen</label>
                        <input type="file" class="form-control-file" id="addImage" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar Mascota</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Mascota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editName">Nombre</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="editType">Tipo</label>
                        <input type="text" class="form-control" id="editType" name="type" required>
                    </div>

                    <div class="form-group">
                        <label for="editDescription">Descripción</label>
                        <input type="text" class="form-control" id="editDescription" name="description" required>
                    </div>

                    <div class="form-group">
                        <label for="editAge">Edad</label>
                        <input type="number" class="form-control" id="editAge" name="age" required>
                    </div>

                    <div class="form-group">
                        <label for="editImage">Imagen</label>
                        <input type="file" class="form-control-file" id="editImage" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta mascota?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="deleteForm" method="POST" action="" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var type = button.data('type');
            var description = button.data('description');
            var age = button.data('age');

            var modal = $(this);

            modal.find('#editId').val(id);
            modal.find('#editName').val(name);
            modal.find('#editType').val(type);
            modal.find('#editDescription').val(description);
            modal.find('#editAge').val(age);
            modal.find('#editForm').attr('action', `/pets/${id}`);
        });

        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var form = $('#deleteForm');
            form.attr('action', `/pets/${id}`);
        });
    });
</script>
@endsection