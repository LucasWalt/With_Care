<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Sobre | With Care</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

    <link rel="icon" type="image/jpg" href="imagens/logo.png" />   

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

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
    <link href="heroes.css" rel="stylesheet">
  </head>
  <body>
    
  <?php
  include('layouts/menu_principal.php');
?>

<main>
  <div class="px-4 py-5 my-5 mt-5 text-center">
  <br>
    <img class="d-block mx-auto mb-4 mt-5" src="imagens/logo.png" alt="" width="110" height="110">
    <h1 class="display-5 fw-bold">O que é o With Care?</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">With Care é uma plataforma para conectar profissionais e pessoas solicitando serviços. Esses profissionais são prestadores de serviços da área de cuidados humanos, podendo trabalhar como cuidadores de idosos, babás e cuidadores de pessoas com necessidades especiais.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      </div>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="px-4 pt-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="imagens/encontrar.png" alt="" width="140" height="110">
    <h1 class="display-4 fw-bold">Encontre um profissional</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Escolha qual tipo de serviço você tem interesse, coloque o CEP do local onde ele será feito e acharemos os profissionais adequados para cuidar dos seus entes queridos, de acordo com sua localização. </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="cadastro_clientes_front.php"><button class="btn btn-primary me-5 btn-lg w-100 mb-5">Cadastre-se agora!</button></a>
      </div>
    </div>

    <hr class="featurette-divider">

    <img class="d-block mx-auto mb-4 mt-5" src="imagens/coracao.png" alt="" width="130" height="130">
    <h1 class="display-4 fw-bold">Seja um profissional</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Clique no botão "Cadastrar" abaixo, você será redirecinado para a página de cadastros. Logo no ínicio terá a opção de cadastro como profissional ou como cliente, escolha a primeira opção, preecnha seus dados e pronto, simples assim.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="cadastro_profissionais_front.php"><button class="btn btn-primary me-5 btn-lg w-100 mb-5">Cadastre-se agora!</button></a>
      </div>
    </div>
</div>
</div>
<hr class="featurette-divider">
<?php
  include('layouts/rodape.php');
?>
  </main>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>     
  </body>
</html>