<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Carousel Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

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
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<?php 
  include('layouts/menu_principal.php');
?>

<main>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
<br><br>
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Nome</h2>
        <p>Idade, cidade, tipo de cuidador.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Nome</h2>
        <p>Idade, cidade, tipo de cuidador.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Nome</h2>
        <p>Idade, cidade, tipo de cuidador.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading">Quem nós somos?<span class="text-muted"></span></h2>
    <p class="lead">With Care é uma plataforma para conectar profissionais e pessoas solicitando serviços. Esses profissionais são prestadores de serviços da área de cuidados humanos, podendo trabalhar como <b>cuidadores de idosos, babás e cuidadores de pessoas com necessidades especiais.</b></p>
  </div>
  <div class="col-md-5 order-md-1">
  <img src="imagens/cuidadoshumanos.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">

  </div>
</div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Poucos cliques para achar quem você precisa. <span class="text-muted"></span></h2>
        <p class="lead">Todos precisamos em algum momento de alguém para cuidar de quem nós amamos, e por que não fazer isso de forma agil e prática? .</p>
      </div>
      <div class="col-md-5">
        <img src="imagens/maeefilha.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Precisamos saber com quem estamos deixando nossos entes queridos. <span class="text-muted"></span></h2>
        <p class="lead">Você pode ver informações detalhadas de cada cuidador e observar as avaliações dadas a eles.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img src="imagens/cuidadordeidosos.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Quanto mais próximo de nós, melhor. <span class="text-muted"></span></h2>
        <p class="lead">Ache os cuidadores mais próximos de você, fazendo buscas através da sua localização.</p>
      </div>
      <div class="col-md-5">
      <img src="imagens/cuidadorespeciais.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
</main>
<?php 
  include('layouts/rodape.php');
?>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
</body>
</html>