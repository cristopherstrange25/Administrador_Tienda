@extends('admin.plantilla.layout')

@section('titulo','CREAR CATEGORIA')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/pedidos/{{$pedido->id}}" novalidate>
@csrf
  <p></p>
  <p></p>
  @method('PUT')
  <h1>EDITAR</h1>
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Id de empleado</label>
      <input type="text" class="form-control" id="validationCustom01" name="employees_id" value="{{ $pedido-> employees_id }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a employee id.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">fecha requerida</label>
      <input type="text" class="form-control" id="validationCustom02" name="order_date" value="{{ $pedido-> order_date }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a required date.
      </div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Fecha de entrega</label>
        <input type="text" class="form-control" id="validationCustom03" name="Deadline" value="{{ $pedido-> Deadline }}"required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a shipped date.
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustom04" class="form-label">Transporte</label>
        <input type="text" class="form-control" id="validationCustom04" name="transportation" value="{{ $pedido-> transportation }}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a Frieght.
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Direccion de entrega</label>
        <input type="text" class="form-control" id="validationCustom05" name="delivery_address" value="{{ $pedido-> delivery_address }}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a ship address.
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
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Actualizar</button>
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
