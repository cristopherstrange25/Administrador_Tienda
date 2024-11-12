@extends('admin.plantilla.layout')

@section('titulo','Inicio')
    
@section('contenido')
    <h1>Bienvenido a la pagina para administrasdores.</h1>
    <p>Pagina @auth de {{Auth::user() -> name}}@endauth</p>
    <p>Dentro de esta seccion podra hacer manejo del area administrativa, almacenados dentro de una base de datos.</p>
    <p>Dentro de esta pagina podra accesder a ciertos datos dependiendo del tipo de administrador que sea.</p>
    <a class="btn btn-primary" href="{{route('logout')}}">Salir</a>
@endsection