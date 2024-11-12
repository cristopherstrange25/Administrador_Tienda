@extends('admin.plantilla.layout')

@section('titulo')
    
@endsection
@section('contenido')
<p></p>
<p></p>
<div class="col-12">
</div>
</table>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($categorias as $categoria) 
        
      <tr>
      <th scope="row"> {{ $categoria->id }} </th>
      <td>{{ $categoria->name }}</td>
      <td>{{ $categoria->description }}</td>
      <td>
    <!-- Envolvemos la imagen en un enlace para abrirla al hacer clic -->
    <a href="{{ asset('storage/' . $categoria->picture) }}" target="_blank">
        <img src="{{ asset('storage/' . $categoria->picture) }}" alt="{{ $categoria->picture }}" width="100">
    </a>
</td>
      <td><a href="/categorias/editar/{{ $categoria->id }}" > editar </a></td>
      <td><a href="/categorias/mostrar/{{ $categoria->id }}" > borrar </a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<div class="col-12">
    <a class="btn btn-primary" href="/categorias/crear">Crear categoria</a>
</div>
@endsection
