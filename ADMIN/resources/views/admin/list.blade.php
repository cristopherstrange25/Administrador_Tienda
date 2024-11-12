@extends('/admin/plantilla/layout')

@section('titulo')
    
@endsection
@section('contenido')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Puesto</th>
      <th scope="col">Fecha de nacimiento</th>
      <th scope="col">Direccion</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>rfw</td>
      <td>efwhfg</td>
      <td>kerfjkhle</td>
    </tr>
  </tbody>
</table>
<div class="col-12">
    <a class="btn btn-primary" href="/admin/administradores/crear">Agragar administrador</a>
</div>
@endsection

