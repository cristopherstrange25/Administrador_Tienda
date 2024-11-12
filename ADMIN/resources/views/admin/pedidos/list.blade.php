@extends('admin.plantilla.layout')

@section('titulo')
    
@endsection
@section('contenido')
<p></p>
<p></p>
<div class="col-12">
  <button class="btn btn-primary" type="submit"></button>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Id de empleado</th>
      <th scope="col">Fecha requerida</th>
      <th scope="col">Fecha de entrega</th>
      <th scope="col">Transporte</th>
      <th scope="col">Direccion de entrega</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ($pedidos as $pedido) 

      <th scope="row"> {{ $pedido->id }} </th>
      <td>{{ $pedido-> employees_id }}</td>
      <td>{{ $pedido-> order_date }}</td>
      <td>{{ $pedido-> Deadline }}</td>
      <td>{{ $pedido-> transportation }}</td>
      <td>{{ $pedido-> delivery_address }}</td>
      <td><a href="/pedidos/editar/{{ $pedido->id }}" > editar </a></td>
      <td><a href="/pedidos/mostrar/{{ $pedido->id }}" > borrar </a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<div class="col-12">
    <a class="btn btn-primary" href="/pedidos/crear">Agregar pedido</a>
</div>  
@endsection

