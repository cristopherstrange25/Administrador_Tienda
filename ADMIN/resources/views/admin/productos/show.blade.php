@extends('admin.plantilla.layout')

@section('titulo', 'VER PRODUCTO')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/productos/{{$producto->id}}" novalidate>
    @csrf
    @method('DELETE') <!-- Método DELETE para borrar el producto -->

    <h1>MOSTRAR</h1>

    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" value="{{ $producto->name }}" readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Id de proveedor</label>
        <input type="number" class="form-control" id="validationCustom02" value="{{ $producto->supplier_id }}" readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Id de categoría</label>
        <input type="number" class="form-control" id="validationCustom03" value="{{ $producto->categorie_id }}" readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom04" class="form-label">Precio</label>
        <input type="number" min="0" max="100" step="0.25" value="{{ $producto->price }}" class="form-control" id="validationCustom04" readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Cantidad</label>
        <input type="text" class="form-control" id="validationCustom05" value="{{ $producto->quantity }}" readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom06" class="form-label">Estado</label>
        <input type="text" class="form-control" id="validationCustom06" value="{{ $producto->status }}" readonly>
    </div>

    <div class="col-md-12">
        <label for="validationCustom07" class="form-label">Imagen</label>
        @if(isset($producto->picture) && !empty($producto->picture))
            <img src="{{ asset($producto->picture) }}" alt="Imagen de {{ $producto->name }}" width="150">
        @else
            <p>No hay imagen disponible.</p>
        @endif
    </div>

    <div class="col-12">
        <button class="btn btn-danger" type="submit">Borrar</button>
        <a href="/productos" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

<script>
(() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

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
