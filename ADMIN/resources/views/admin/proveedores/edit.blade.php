@extends('admin.plantilla.layout')

@section('titulo','CREAR CATEGORIA')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/proveedores/{{$proveedor->id}}" enctype="multipart/form-data" novalidate>
@csrf
  <p></p>
  <p></p>
  @method('PUT')
  <h1>EDITAR</h1>
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="validationCustom01" name = "name" value="{{ $proveedor->name }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a name.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Contacto</label>
      <input type="text" class="form-control" id="validationCustom02" name = "contact_name" value="{{ $proveedor->contact_name}}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a contact.
      </div>
    </div>


    <div class="col-md-12">
        <label for="validationCustom04" class="form-label">Direccion</label>
        <input type="text" class="form-control" id="validationCustom04" name="address" value="{{ $proveedor->address}}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a address.
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="validationCustom05" name="phone" value="{{ $proveedor->phone }}"required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a phone.
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustom65" class="form-label">Correo</label>
        <input type="text" class="form-control" id="validationCustom06" name="email" value="{{ $proveedor->email }}"required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a email.
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustom67" class="form-label">Situacion</label>
        <input type="text" class="form-control" id="validationCustom07" name="status" value="{{ $proveedor->status }}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a status.
        </div>
      </div>
    {{--<div class="col-md-4">
      <label for="validationCustomUsername" class="form-label">Username</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>--}}


    <div class="col-md-12">
      <label for="validationCustom03" class="form-label">Imagen</label>
      <img src ="{{ $proveedor->picture }}" alt = "{{ $proveedor -> picture }}" width="150" >
      <input type="file" accept="image/*" class="form-control" id="validationCustom03" name ="picture" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid picture.
      </div>
    </div>


    <div class="col-12">
      <button class="btn btn-primary" type="submit">actualizar</button>
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
