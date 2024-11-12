@extends('admin.plantilla.layoutInit')

@section('titulo','REGISTRAR USUARIO')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/validar-registro" novalidate enctype="multipart/form-data">
  @csrf
  <h1>CREAR</h1>
  
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose a name.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationCustom02" name="email" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose a valid email.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="validationCustom03" name="password" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose a password.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom04" class="form-label">Foto de perfil</label>
    <input type="file" accept="image/*" class="form-control" id="validationCustom04" name="picture" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please provide a valid profile picture.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom05" class="form-label">Puesto</label>
    <input type="text" class="form-control" id="validationCustom05" name="title" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose a title.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom06" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="validationCustom06" name="address" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose an address.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom07" class="form-label">Teléfono</label>
    <input type="text" class="form-control" id="validationCustom07" name="phone" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose a phone number.</div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom08" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="validationCustom08" name="birthdate" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please choose a birthdate.</div>
  </div>
  
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Registrar</button>
  </div>
  
</form>

<script>
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

@endsection
