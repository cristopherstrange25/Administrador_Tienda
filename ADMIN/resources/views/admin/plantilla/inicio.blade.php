<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>HOLA MUNDO -> @yield('titulo') </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="/css_boot_50/navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/admin/inicio">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/proveedores">Proveedores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/categorias">Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/productos">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pedidos">Pedidos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cliente">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/empleados">Administradores</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <main class="container-fluid">
      <!-- Introducción al sistema CANDY -->
      <section>
        <h1>Bienvenido a CANDY</h1>
        <p>CANDY es un sistema de ventas intuitivo y eficiente diseñado para facilitar la gestión de productos, pedidos, proveedores y clientes en tu tienda. Con CANDY, podrás gestionar cada aspecto de tu negocio de manera ágil, desde el manejo de inventarios hasta la administración de los pedidos y la relación con tus clientes.</p>
        <p>Explora las distintas secciones del sistema para gestionar proveedores, productos, y mucho más. Estamos aquí para hacer tu experiencia más productiva y sencilla.</p>
      </section>

      @yield('contenido')
    </main>

    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
