@extends('admin.plantilla.layout')

@section('titulo', 'EDITAR PRODUCTO')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/productos/{{$producto->id}}" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <h1>EDITAR PRODUCTO</h1>

    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ $producto->name }}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a name.</div>
    </div>

    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Proveedor</label>
        <select name="supplier_id" class="form-control" id="validationCustom02" required>
            <option selected disabled value="">Seleccionar proveedor</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ $proveedor->id == $producto->supplier_id ? 'selected' : '' }}>
                    {{ $proveedor->id }} - {{ $proveedor->name }} ({{ $proveedor->contact_name }})
                </option>
            @endforeach
        </select>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a supplier.</div>
    </div>

    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Categoría</label>
        <select name="categorie_id" class="form-control" id="validationCustom03" required>
    <option selected disabled value="">Seleccionar categoría</option>
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->categorie_id ? 'selected' : '' }}>
            {{ $categoria->id }} - {{ $categoria->name }}
        </option>
    @endforeach
</select>

        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a category.</div>
    </div>

    <div class="col-md-12">
        <label for="validationCustom04" class="form-label">Precio</label>
        <input type="number" class="form-control" id="validationCustom04" name="price" value="{{ $producto->price }}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a price.</div>
    </div>

    <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="validationCustom05" name="quantity" value="{{ $producto->quantity }}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a quantity.</div>
    </div>

    <div class="col-md-12">
        <label for="validationCustom06" class="form-label">Status</label>
        <input type="text" class="form-control" id="validationCustom06" name="status" value="{{ $producto->status }}" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please choose a status.</div>
    </div>

    <div class="col-md-12">
        <label for="validationCustom07" class="form-label">Imagen</label>
        @if($producto->image1)
            <img src="{{ asset('images/' . $producto->image1) }}" alt="Imagen de {{ $producto->name }}" width="150">
        @endif
        <input type="file" accept="image/*" class="form-control" id="validationCustom07" name="picture" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please provide a valid picture.</div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </div>
</form>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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
