@extends('admin.plantilla.layout')

@section('titulo')
    
@endsection
@section('contenido')
<!-- Agregar los estilos de Lightbox -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

<!-- Agregar los scripts de Lightbox -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

<p></p>
<p></p>
<div class="col-12">
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <td scope="col">Nombre</td>
      <td scope="col">Id de proveedor</td>
      <td scope="col">Id de categoria</td>
      <td scope="col">Precio</td>
      <td scope="col">Cantidad</td>
      <td scope="col">Stock</td>
      <th scope="col">Imagen</th>
      <th scope="col">Imagen2</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ($productos as $producto) 

    <th scope="row"> {{ $producto->id }} </th>
      <td>{{ $producto-> name }}</td>
      <td>{{ $producto-> supplier_id }}</td>
      <td>{{ $producto-> categorie_id }}</td>
      <td>{{ $producto-> price }}</td>
      <td>{{ $producto-> quantity }}</td>
      <td>{{ $producto-> status }}</td>
      <td>
                        <!-- Envolvemos la imagen en un enlace para abrirla al hacer clic -->
                        <a href="{{ asset('storage/' . $producto->image1) }}" target="_blank">
                            <img src="{{ asset('storage/' . $producto->image1) }}" alt="Imagen 1" width="100">
                        </a>
                    </td>
                    <td>
                        <!-- Envolvemos la imagen en un enlace para abrirla al hacer clic -->
                        <a href="{{ asset('storage/' . $producto->image2) }}" target="_blank">
                            <img src="{{ asset('storage/' . $producto->image2) }}" alt="Imagen 2" width="100">
                        </a>
                    </td>  
      <td><a href="/productos/editar/{{ $producto->id}}" > editar </a></td>
      <td><a href="/productos/mostrar/{{ $producto->id}}" > borrar </a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<div class="col-12">
    <a class="btn btn-primary" href="/productos/crear">Agregar producto</a>
</div>    
@endsection

