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

        .color {
        color: white;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css_boot_50/navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    
      
      <h1 class="color">*****CANDY SYSTEM*****
    </h1>
    </div>
  </div>
</nav>

<main class="container-fluid">
  @yield('contenido')
</main>


    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>