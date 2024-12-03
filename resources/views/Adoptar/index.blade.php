@extends('layouts.template')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <h1>Lista de Adopciones</h1>
    <div class="container-md">
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Agregar Adopción</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Mensaje</th>
                    <th>Mascota</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adoptar as $adoption)
                <tr>
                    <td>{{ $adoption->nombre }}</td>
                    <td>{{ $adoption->email }}</td>
                    <td>{{ $adoption->telefono }}</td>
                    <td>{{ $adoption->direccion }}</td>
                    <td>{{ $adoption->mensaje }}</td>
                    <td>{{ $adoption->pet->name }}</td>
                    <td>
                        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Agregar Adopción</button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" 
                            data-id="{{ $adoption->id }}" 
                            data-nombre="{{ $adoption->nombre }}" 
                            data-email="{{ $adoption->email }}" 
                            data-telefono="{{ $adoption->telefono }}" 
                            data-direccion="{{ $adoption->direccion }}" 
                            data-mensaje="{{ $adoption->mensaje }}" 
                            data-pet="{{ $adoption->pet->id }}">
                            Editar
                        </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $adoption->id }}">Eliminar</button>
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
                    <h5 class="modal-title" id="addModalLabel">Agregar Adopción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm" method="POST" action="{{ route('adopta.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="addName">Nombre Completo</label>
                            <input type="text" class="form-control" id="addName" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="addEmail">Correo electrónico</label>
                            <input type="email" class="form-control" id="addEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="addTelefono">Teléfono</label>
                            <input type="text" class="form-control" id="addTelefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="addDireccion">Dirección</label>
                            <input type="text" class="form-control" id="addDireccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="addMensaje">Mensaje</label>
                            <input type="text" class="form-control" id="addMensaje" name="mensaje">
                        </div>
                        <div class="form-group">
                            <label for="mascota">Mascota:</label>
                            <select id="mascota" name="id_mascota" class="form-control" required>
                                @foreach($pets as $pet)
                                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar adopción</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Adopción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST" action="{{ route('adopta.update', 0) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">
                        <div class="form-group">
                            <label for="editName">Nombre Completo</label>
                            <input type="text" class="form-control" id="editName" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Correo electrónico</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="editTelefono">Teléfono</label>
                            <input type="text" class="form-control" id="editTelefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="editDireccion">Dirección</label>
                            <input type="text" class="form-control" id="editDireccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="editMensaje">Mensaje</label>
                            <input type="text" class="form-control" id="editMensaje" name="mensaje">
                        </div>
                        <div class="form-group">
                            <label for="editMascota">Mascota:</label>
                            <select id="editMascota" name="id_mascota" class="form-control" required>
                                @foreach($pets as $pet)
                                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Adopción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar esta adopción?</p>
                        <input type="hidden" id="deleteId" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nombre = button.data('nombre');
        var email = button.data('email');
        var telefono = button.data('telefono');
        var direccion = button.data('direccion');
        var mensaje = button.data('mensaje');
        var pet = button.data('pet');

        var modal = $(this);
        modal.find('#editId').val(id);
        modal.find('#editName').val(nombre);
        modal.find('#editEmail').val(email);
        modal.find('#editTelefono').val(telefono);
        modal.find('#editDireccion').val(direccion);
        modal.find('#editMensaje').val(mensaje);
        modal.find('#editMascota').val(pet);
    });

    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('#deleteId').val(id);
        modal.find('#deleteForm').attr('action', '/adopta/' + id);
    });

    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('#deleteId').val(id);
    });
</script>

@endsection
