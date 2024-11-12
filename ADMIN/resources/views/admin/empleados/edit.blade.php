@extends('admin.plantilla.layout')

@section('titulo', 'EDITAR EMPLEADO')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/empleados/{{$employee->id}}" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <h1>EDITAR</h1>
    
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$employee->name}}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a name.</div>
    </div>
    
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Puesto</label>
        <input type="text" class="form-control" id="validationCustom02" name="title" value="{{$employee->title}}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a title.</div>
    </div>
    
    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="validationCustom03" name="address" value="{{$employee->address}}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose an address.</div>
    </div>
    
    <div class="col-md-12">
        <label for="validationCustom04" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="validationCustom04" name="phone" value="{{$employee->phone}}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a phone.</div>
    </div>
    
    <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Correo</label>
        <input type="text" class="form-control" id="validationCustom05" name="email" value="{{$employee->email}}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose an email.</div>
    </div>
    
    <div class="col-md-12">
        <label for="validationCustom06" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="validationCustom06" name="birthdate" value="{{$employee->birthdate}}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a birthdate.</div>
    </div>

    <!-- Campo para la contraseña actual -->
    <div class="col-md-12">
        <label for="validationCustom07" class="form-label">Contraseña Actual</label>
        <input type="password" class="form-control" id="validationCustom07" name="current_password" placeholder="Ingrese su contraseña actual" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please enter your current password.</div>
    </div>

    <!-- Campo para actualizar la contraseña -->
    <div class="col-md-12">
        <label for="validationCustom08" class="form-label">Nueva Contraseña</label>
        <input type="password" class="form-control" id="validationCustom08" name="password" placeholder="Ingrese nueva contraseña">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please enter a new password.</div>
    </div>
    
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </div>
</form>

<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
<script>
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Previene el comportamiento por defecto del formulario
    this.submit(); // Envía el formulario
});
</script>

@endsection
