@extends('admin.plantilla.layout')

@section('titulo','CREAR CATEGORIA')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/cliente" novalidate>
    @csrf
    <p></p>
    <p></p>
    <h1>CREAR</h1>
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="validationCustom01" name="name" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a name.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Direccion</label>
      <input type="text" class="form-control" id="validationCustom02" name="address" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose an address.
      </div>
    </div>
    <div class="col-md-12">
   <label for="validationCustom04" class="form-label">Email</label>
   <input type="email" class="form-control" id="validationCustom04" name="email" required>
   <div class="valid-feedback">
     Looks good!
   </div>
   <div class="invalid-feedback">
     Please choose an email.
   </div>
 </div>

    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="validationCustom03" name="phone" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a phone.
        </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Registrar</button>
    </div>
</form>

  
  <script>
    (() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
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
