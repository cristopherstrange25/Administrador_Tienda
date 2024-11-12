@extends('admin.plantilla.layoutInit')

@section('titulo', 'INICIAR SESION')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/login2" novalidate>
  @csrf
  <h1>Iniciar Sesión</h1>
  <!-- Campo de Correo Electrónico -->
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Correo Electrónico</label>
    <input type="email" class="form-control" id="validationCustom02" name="email" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor ingresa un correo válido.
    </div>
  </div>

  <!-- Campo de Contraseña -->
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="validationCustom03" name="password" required>
    <div class="valid-feedback">
      ¡Se ve bien!
    </div>
    <div class="invalid-feedback">
      Por favor ingresa una contraseña.
    </div>
  </div>

  <!-- Botón de Iniciar Sesión -->
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
  </div>

  <!-- Enlace para registro -->
  <div class="col-12">
    <p>¿No tienes una cuenta?</p>
    <a class="btn btn-secondary" href="/register">Crear cuenta</a>
  </div>
</form>

<!-- Script de Validación -->
<script>
  (() => {
    'use strict';

    // Fetch all forms to apply custom Bootstrap validation styles
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over forms and prevent submission if not valid
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
@endsection