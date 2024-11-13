@extends('admin.plantilla.layout')

@section('titulo', 'Lista de Productos')

@section('contenido')
<!-- Agregar los estilos de Lightbox -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

<!-- Agregar los scripts de Lightbox -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

<p></p>
<p></p>
<div class="col-12"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Id de proveedor</th>
      <th scope="col">Id de categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Stock</th>
      <th scope="col">Imagen</th>
      <th scope="col">Imagen2</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productos as $producto)
    <tr>
      <th scope="row">{{ $producto->id }}</th>
      <td>{{ $producto->name }}</td>
      <td>{{ $producto->supplier_id }}</td>
      <td>{{ $producto->categorie_id }}</td>
      <td>{{ $producto->price }}</td>
      <td>{{ $producto->quantity }}</td>
      <td>{{ $producto->status }}</td>
      <td>
      <a href="{{ asset('storage/images/' . basename($producto->image1)) }}" data-lightbox="image-{{ $producto->id }}" data-title="Imagen 1">
    <img src="{{ asset('storage/images/' . basename($producto->image1)) }}" alt="Imagen 1" width="100">
</a>

      </td>
      <td>
        <a href="{{ asset('storage/images/' . basename($producto->image2)) }}" data-lightbox="image-{{ $producto->id }}" data-title="Imagen 2">
          <img src="{{ asset('storage/images/' . basename($producto->image2)) }}" alt="Imagen 2" width="100">
        </a>
      </td>
      <td><a href="/productos/editar/{{ $producto->id }}">editar</a></td>
      <td><a href="/productos/mostrar/{{ $producto->id }}">borrar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-12">
  <a class="btn btn-primary" href="/productos/crear">Agregar producto</a>
</div>
@endsection