@extends('admin.plantilla.layout')

@section('titulo','CREAR PRODUCTO')

@section('contenido')
<form class="row g-3 needs-validation" method="POST" action="/productos" enctype="multipart/form-data" novalidate>
@csrf
  <p></p>
  <p></p>
    <div class="col-md-12">
    <h1>CREAR</h1>
      <label for="validationCustom01" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="validationCustom01" name = "name" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a name.
      </div>
    </div>

    <!-- Proveedor (Select con opciones existentes) -->
    <div class="col-md-12">
      <label for="supplier_id" class="form-label">Proveedor</label>
      <select name="supplier_id" class="form-control" id="validationCustom02" required>
    <option selected disabled value="">Seleccionar proveedor</option>
    @foreach ($proveedores as $proveedor)
        <option value="{{ $proveedor->id }}">
            {{ $proveedor->id }} - {{ $proveedor->name }} ({{ $proveedor->contact_name }})
        </option>
    @endforeach
</select>

      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a supplier.
      </div>
    </div>

    <!-- Categoria (Select con opciones existentes) -->
    <div class="col-md-12">
      <label for="categorie_id" class="form-label">Categoría</label>
      <select name="categorie_id" class="form-control" id="validationCustom03" required>
    <option selected disabled value="">Seleccionar categoría</option>
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">
            {{ $categoria->id }} - {{ $categoria->name }}
        </option>
    @endforeach
</select>

      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a category.
      </div>
    </div>

    <div class="col-md-12">
      <label for="validationCustom04" class="form-label">Precio</label>
      <input type="number" onchange="setTwoNumberDecimal" min="0" max="100000" step="0.25" value="0.00"  class="form-control" 
      id="validationCustom04" name = "price" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a price.
      </div>
    </div>
    
    <div class="col-md-12">
      <label for="validationCustom05" class="form-label">Cantidad</label>
      <input type="number" class="form-control" id="validationCustom05" name = "quantity" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a quantity.
      </div>
    </div>

    <div class="col-md-12">
      <label for="validationCustom06" class="form-label">Status</label>
      <input type="text" class="form-control" id="validationCustom06" name = "status" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please choose a status.
      </div>
    </div>

    <!-- Imagen principal -->
    <div class="col-md-12">
      <label for="validationCustom03" class="form-label">Imagen</label>
      <input type="file" accept="image/*" class="form-control" id="validationCustom03" name ="picture" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid picture.
      </div>
    </div>

    <!-- Imagenes adicionales para la tabla 'picture' -->
    <div class="col-md-12">
      <label for="validationCustom03" class="form-label">Imagenes adicionales</label>
      <input type="file" accept="image/*" class="form-control" id="validationCustom03" 
      name ="photos[]" multiple required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid picture.
      </div>
    </div>
    
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Registrar</button>
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
