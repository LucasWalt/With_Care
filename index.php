<?php
  session_start();
  include('conexao.php');

  include('geo_ip.php');

  $sql = "SELECT A.id_usuario, A.nome, A.sobrenome, A.dir_foto_perfil,
          E.bebes, E.criancas, E.adolescentes, E.idosos, E.especiais, B.*, ( 6670.5 * acos( cos( radians(
          -- latitude
          $data->latitude) ) * cos( radians( 
          B.latitude ) ) * cos( radians( 
          B.longitude ) - radians(
          -- longitude
          $data->longitude) ) + sin( radians(
          -- latitude
          $data->latitude) ) * sin( radians( 
          B.latitude ) ) ) ) AS distancia FROM usuario AS A 
          INNER JOIN endereco AS B on A.id_usuario = B.id_usuario
          INNER JOIN servico as E on A.id_usuario = E.id_usuario 
          WHERE A.tp_usuario = 'P' 
          HAVING distancia < 25 
          ORDER BY RAND(NOW()) LIMIT 3";

  $execute = mysqli_query($conexao,$sql);

  $usuario = $execute->fetch_assoc();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Inicio | With Care</title>

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

<h1 class="text-center m-5 p-5 featurette-heading">Profissionais em Destaque <span class="text-muted"></span></h1>
<div class="container marketing">
    <div class="row g-5 py-5 row-cols-5 row-cols-lg-4" style="margin-left: 12.5%;" >
  <?php do{ ?>


    <div class="feature col border border-1 text-center rounded-5 m-3">
        <a href="perfil_profissional.php?id=<?= $usuario['id_usuario']?>">
        <img src="<?php  if ($usuario['dir_foto_perfil']){
          if ($usuario['dir_foto_perfil'] != "") {
             echo $usuario['dir_foto_perfil'];
          }
        }else{
            echo "imagens/pic_usuarios/semfoto.png";
        } ?>"  class="rounded-circle mt-5 mb-4 foto_perfil border border-2 border-secondary" alt="">
            <h2><?=  $usuario['nome'], $espaco=" ", $usuario['sobrenome'] ?></h2>


            <h5 class="mt-3">Cuido de...</h5>
  <div class="mt-3 d-inline-block" style="">
  <?php
      if ($usuario['especiais'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-block border border-dark" style="background-color: #CD03FF;">
      Especiais
    </div>
  <?php
      endif;
      if ($usuario['criancas'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-dark d-inline-block border border-dark" style="background-color: #F3F76C;">
      Crianças
    </div>
  <?php
      endif;
      if ($usuario['adolescentes'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-block border border-dark" style="background-color: #FF4561;">
      Adolescentes
    </div>
  <?php
      endif;
      if ($usuario['idosos'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-block border border-dark" style="background-color: #FFAF03;">
      Idosos
    </div>
  <?php
      endif;
      if ($usuario['bebes'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-block border border-dark" style="background-color: #40C5EB;">
      Bebês
    </div>
  <?php
      endif;
  ?> 
  </div>
  <br>
            <p class="text-truncate ms-5 me-5">Distancia <?= number_format($usuario['distancia'],2);?> KM</p>
      
            <p class="m-3">Mais informações <i class="fas fa-angle-right"></i></p>
        </a>
      </div>
  

  <?php }while($usuario = $execute->fetch_assoc());?>
    <!-- START THE FEATURETTES -->
    </div>

    <a href="quadro_profissionais.php" class=""><h4 class="featurette-heading text-center text-mute fs-4 mt-1">
      Veja mais profissionais próximos de você &emsp;
    <i class="fas fa-chevron-right align-middle fs-5"></i></h4></a>
    
    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Poucos cliques para achar quem você precisa. <span class="text-muted"></span></h2>
        <p class="lead">Todos precisamos em algum momento de alguém para cuidar de quem nós amamos, e por que não fazer isso de forma agil e prática? .</p>
      </div>
      <div class="col-md-5">
        <img src="imagens/maeefilha.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto border border-1  " width="500" height="500">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Precisamos saber com quem estamos deixando nossos entes queridos. <span class="text-muted"></span></h2>
        <p class="lead">Você pode ver informações detalhadas de cada cuidador e observar as avaliações dadas a eles.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img src="imagens/cuidadordeidosos.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto border border-1" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Quanto mais próximo de nós, melhor. <span class="text-muted"></span></h2>
        <p class="lead">Ache os cuidadores mais próximos de você, fazendo buscas através da sua localização.</p>
      </div>
      <div class="col-md-5">
      <img src="imagens/cuidadorespeciais.png" alt="" class="rounded-3 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto border border-1" width="500" height="500">

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
  <script src="js/cheatsheet.js"></script>
</body>
</html>