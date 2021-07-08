<?php
  session_start();
  include('conexao.php');

  $sql = "SELECT A.nome, A.sobrenome, A.descricao, A.dir_foto_perfil, B.*, C.qt_votos, C.qt_pontos
          FROM usuario AS A
          INNER JOIN servico AS B ON A.id_usuario = B.id_usuario
          INNER JOIN pontuacao_avaliacao AS C ON A.id_usuario = C.id_avaliado
          WHERE tp_usuario = 'P' AND boosted = 'S'
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


    <div class="feature col border border-1 text-center rounded-5 m-4">
        <a href="perfil_profissional.php?id=<?= $usuario['id_usuario']?>">
        <img src="<?php  if ($usuario['dir_foto_perfil']){
          if ($usuario['dir_foto_perfil'] != "") {
             echo $usuario['dir_foto_perfil'];
          }
        }else{
            echo "imagens/pic_usuarios/semfoto.png";
        } ?>"  class="rounded-circle mt-5 mb-4 foto_perfil border border-2 border-secondary" alt="">
            <h2><?= $usuario['nome'] ?></h2>
      
            <p class="text-truncate ms-5 me-5"><?= $usuario['descricao']?></p>
      
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
  <script src="js/cheatsheet.js"></script>
</body>
</html>