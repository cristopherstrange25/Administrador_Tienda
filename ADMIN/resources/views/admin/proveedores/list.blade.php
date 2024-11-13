@extends('admin.plantilla.layout')

@section('titulo')
    
@endsection
@section('contenido')

<p></p>
<p></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Contacto</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo</th>>
      <th scope="col">Situacion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($proveedores as $proveedor) 
        
      <tr>
        <th scope="row"> {{ $proveedor->id }} </th>
        <td>{{ $proveedor->name }}</td>
        <td>{{ $proveedor->contact_name}}</td>
        <td>{{ $proveedor->address }}</td>
        <td>{{ $proveedor->phone }}</td>
        <td>{{ $proveedor->email }}</td>
        <td>{{ $proveedor->status }}</td>
        <td>
    <!-- Envolvemos la imagen en un enlace para abrirla al hacer clic -->
    <a href="{{ asset('storage/images/' . basename($proveedor->picture)) }}" target="_blank">
    <img src="{{ asset('storage/images/' . basename($proveedor->picture)) }}" alt="{{ $proveedor->picture }}" width="100">
</a>

</td>
        <td><a href="/proveedores/editar/{{ $proveedor->id }}" > editar </a></td>
      <td><a href="/proveedores/mostrar/{{ $proveedor->id }}" > borrar </a></td>
      </tr>
  @endforeach
  </tbody>
</table>
<div class="col-12">
    <a class="btn btn-primary" href="/proveedores/crear">Añadir proveedor</a>
</div>   
@endsection
