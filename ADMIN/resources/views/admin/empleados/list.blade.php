@extends('admin.plantilla.layout')

@section('titulo', 'Lista de Empleados')

@section('contenido')
<p></p>
<p></p>

<!-- Botón para registrar un nuevo empleado -->
<div class="col-12 mb-3">
  <a class="btn btn-primary" href="/empleados/crear">Registrar empleado</a>
</div>

<!-- Tabla de empleados -->
<table class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Puesto</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha de nacimiento</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($employees as $empleado)
    <tr>
      <th scope="row">{{ $empleado->id }}</th>
      <td>{{ $empleado->name }}</td>
      <td>{{ $empleado->title }}</td>
      <td>{{ $empleado->address }}</td>
      <td>{{ $empleado->phone }}</td>
      <td>{{ $empleado->email }}</td>
      <td>{{ $empleado->birthdate }}</td>
      <td>
        <a class="btn btn-warning btn-sm" href="/empleados/editar/{{ $empleado->id }}">Editar</a>
      </td>
      <td>
        <form method="POST" action="/empleados/{{ $empleado->id }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
