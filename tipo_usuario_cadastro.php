<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Cadastro | With Care</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <link rel="icon" type="image/jpg" href="imagens/logo.png" />   

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/carousel.css" rel="stylesheet">
    <link href="css/features.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cheatsheet/">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      a{
        text-decoration: none;
        color: #000;
      }
      .navbar-toggler, .navbar-toggler-icon{
        color: #000;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .foto_perfil{
      width: 150px;
      height: 150px;
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<?php 
  include('layouts/menu_principal.php');
?>

<main>

<h1 class="text-center m-5 p-5 featurette-heading">O que você está procurando?<span class="text-muted"></span></h1>
<div class="d-inline-flex mb-5 pb-5" style="margin-left: 5%;">
<div class="px-4 py-5 my-5 mt-5 text-center">
  <br>
    <h1 class="display-5 fw-bold">Profissionais</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Encontre profissionais na sua área e os compare baseado em avaliações de outras pessoas como você!</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="cadastro_clientes_front.php"><button class="btn btn-primary me-5 btn-lg w-100 mb-5">Encontre Profissionais!</button></a>
      </div>
    </div>
  </div>
<div class="px-4 py-5 my-5 mt-5 text-center">
  <br>
    <h1 class="display-5 fw-bold">Clientes</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Com poucos cliques faça parte da With Care e encontre clientes próximos de você!</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="cadastro_profissionais_front.php"><button class="btn btn-primary me-5 btn-lg w-100 mb-5">Encontre Clientes!</button></a>
      </div>
    </div>
  </div>
  </div>
</main>
<?php 
  include('layouts/rodape.php');
?>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
  <script src="js/cheatsheet.js"></script>
</body>
</html>