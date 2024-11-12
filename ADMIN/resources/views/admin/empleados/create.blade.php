@extends('admin.plantilla.layout')

@section('titulo','REGISTRAR EMPLEADO')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="{{ url('/empleados') }}" novalidate>
  @csrf
  <p></p>
  <h1>CREAR</h1>
  
  <!-- Nombre -->
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, ingresa un nombre válido.
    </div>
  </div>

  <!-- Puesto -->
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Puesto</label>
    <input type="text" class="form-control" id="validationCustom02" name="title" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, ingresa un puesto válido.
    </div>
  </div>

  <!-- Dirección -->
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="validationCustom03" name="address" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, ingresa una dirección válida.
    </div>
  </div>

  <!-- Teléfono -->
  <div class="col-md-12">
    <label for="validationCustom04" class="form-label">Teléfono</label>
    <input type="text" class="form-control" id="validationCustom04" name="phone" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, ingresa un número de teléfono válido.
    </div>
  </div>

  <!-- Correo -->
  <div class="col-md-12">
    <label for="validationCustom05" class="form-label">Correo Electrónico</label>
    <input type="email" class="form-control" id="validationCustom05" name="email" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, ingresa un correo electrónico válido.
    </div>
  </div>

  <!-- Fecha de Nacimiento -->
  <div class="col-md-12">
    <label for="validationCustom06" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="validationCustom06" name="birthdate" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, selecciona una fecha de nacimiento válida.
    </div>
  </div>

  <!-- Contraseña -->
  <div class="col-md-12">
    <label for="validationCustom07" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="validationCustom07" name="password" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor, ingresa una contraseña válida.
    </div>
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
