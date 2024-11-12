@extends('admin.plantilla.layout')

@section('titulo')
    
@endsection
@section('contenido')
<p></p>
<p></p>
<div class="col-12">
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clientes as $cliente) 
    <tr>
      <th scope="row"> {{ $cliente->id }} </th>
      <td>{{ $cliente->name }}</td>
      <td>{{ $cliente->address }}</td>
      <td>{{ $cliente->phone }}</td>
      <td>{{ $cliente->email }}</td>
      <td><a href="/cliente/editar/{{ $cliente->id }}" > editar </a></td>
      <td><a href="/cliente/mostrar/{{ $cliente->id }}" > borrar </a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-12">
    <a class="btn btn-primary" href="/cliente/crear">Agregar cliente</a>
</div>
@endsection

