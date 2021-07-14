<?php
  session_start();
  include('conexao.php');
  Error_reporting (0);
  include('geo_ip.php');

  $id_pagina = (isset($_GET['id']))? $_GET['id'] : 1;

  $id_avaliador = $_SESSION['id_usuario'];

  $sql_code = "SELECT COUNT(*) AS total FROM controle_avaliacao WHERE  id_avaliador = '$id_avaliador'";

  $execute = mysqli_query($conexao,$sql_code);
  
  $ja_votou = $execute->fetch_assoc();

  if ($ja_votou['total'] > 0) {

  if (isset($_SESSION['usuario_logado'])){
    
    $user = $_SESSION['usuario_logado'];

    $sql = "SELECT a.latitude, a.longitude from  endereco AS a 
    INNER JOIN usuario AS B on A.id_usuario = B.id_usuario 
    where cpf = '$user'";

    $execute = mysqli_query($conexao,$sql);

    $usuario_logado = $execute->fetch_assoc();

    $latitude = $usuario_logado['latitude'];

    $longitude = $usuario_logado['longitude'];

    $sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.dir_foto_perfil,B.bairro, B.rua, B.cidade, B.latitude, b.longitude, C.email_1, D.telefone_1, D.telefone_2,
                E.bebes, E.criancas, E.adolescentes, E.idosos, E.especiais, F.qt_votos, F.qt_pontos, F.id_avaliado,
                ( 6371.5 * acos( cos( radians(
                -- latitude
                $latitude) ) * cos( radians( 
                B.latitude ) ) * cos( radians( 
                B.longitude ) - radians(
                -- longitude
                $longitude) ) + sin( radians(
                -- latitude
                $latitude) ) * sin( radians( 
                B.latitude ) ) ) ) AS distancia 
                 FROM usuario as A 
                 INNER JOIN endereco as B on A.id_usuario = B.id_usuario
                 INNER JOIN email as C on A.id_usuario = C.id_usuario 
                 INNER JOIN telefone as D on A.id_usuario = D.id_usuario 
                 INNER JOIN servico as E on A.id_usuario = E.id_usuario  
                 INNER JOIN pontuacao_avaliacao as F on A.id_usuario = F.id_avaliado
                 WHERE A.id_usuario = '$id_pagina'";

    $execute = mysqli_query($conexao,$sql_code);

    $usuario = $execute->fetch_assoc();
  }else {

    $sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.dir_foto_perfil, B.*, C.email_1, D.telefone_1, D.telefone_2,
                 E.bebes, E.criancas, E.adolescentes, E.idosos, E.especiais, F.qt_votos, F.qt_pontos, F.id_avaliado,
                 ( 6371.5 * acos( cos( radians(
                 -- latitude
                 $data->latitude) ) * cos( radians( 
                 B.latitude ) ) * cos( radians( 
                 B.longitude ) - radians(
                 -- longitude
                 $data->longitude) ) + sin( radians(
                 -- latitude
                 $data->latitude) ) * sin( radians( 
                 B.latitude ) ) ) ) AS distancia 
                 FROM usuario as A 
                 INNER JOIN endereco as B on A.id_usuario = B.id_usuario
                 INNER JOIN email as C on A.id_usuario = C.id_usuario 
                 INNER JOIN telefone as D on A.id_usuario = D.id_usuario 
                 INNER JOIN servico as E on A.id_usuario = E.id_usuario  
                 INNER JOIN pontuacao_avaliacao as F on A.id_usuario = F.id_avaliado
                 WHERE A.id_usuario = '$id_pagina'";

    $execute = mysqli_query($conexao,$sql_code);

    $usuario = $execute->fetch_assoc();
  }

}else {
  $user = $_SESSION['usuario_logado'];

  $sql = "SELECT a.latitude, a.longitude from  endereco AS a 
  INNER JOIN usuario AS B on A.id_usuario = B.id_usuario 
  where cpf = '$user'";

  $execute = mysqli_query($conexao,$sql);

  $usuario_logado = $execute->fetch_assoc();

  $latitude = $usuario_logado['latitude'];

  $longitude = $usuario_logado['longitude'];

  $sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.dir_foto_perfil,B.bairro, B.rua, B.cidade, B.latitude, b.longitude, C.email_1, D.telefone_1, D.telefone_2,
              E.bebes, E.criancas, E.adolescentes, E.idosos, E.especiais,
              ( 6371.5 * acos( cos( radians(
              -- latitude
              $latitude) ) * cos( radians( 
              B.latitude ) ) * cos( radians( 
              B.longitude ) - radians(
              -- longitude
              $longitude) ) + sin( radians(
              -- latitude
              $latitude) ) * sin( radians( 
              B.latitude ) ) ) ) AS distancia 
               FROM usuario as A 
               INNER JOIN endereco as B on A.id_usuario = B.id_usuario
               INNER JOIN email as C on A.id_usuario = C.id_usuario 
               INNER JOIN telefone as D on A.id_usuario = D.id_usuario 
               INNER JOIN servico as E on A.id_usuario = E.id_usuario  
               WHERE A.id_usuario = '$id_pagina'";

  $execute = mysqli_query($conexao,$sql_code);

  $usuario = $execute->fetch_assoc();
}

$_SESSION['id_avaliado'] = $id_pagina;


$id_avaliado = $id_pagina;

$id_avaliador = $_SESSION['id_usuario'];

$sql_code = "SELECT COUNT(*) AS total FROM controle_avaliacao WHERE id_avaliado = '$id_avaliado' AND id_avaliador = '$id_avaliador'";

$execute = mysqli_query($conexao,$sql_code);

$ja_votou = $execute->fetch_assoc();

if ($ja_votou['total'] > 0) {

  $ja_votou = TRUE;
}else {
  $ja_votou = FALSE;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Profissionais Próximos | With Care</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <link rel="stylesheet" href="css/estilo.css">

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
        }}
    .foto_perfil{
      width: 250px;
      height: 250px;
    }
    svg {
    	max-height: 100%;
    
    	&:not(:root) {
    		overflow: hidden;
    	}
    }
    #main {
    	margin: 0 auto;
    	max-width: 20em;
    	width: 75%;
    }
    .icon {
    	display: block;
    	height: 35px;
    	margin: 1em auto;
    	width: 180px;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/avaliacao.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include('layouts/menu_principal.php');
?>

<main>
  <div class="container mt-5 py-5">
  <div class="container-md border-4 p-5" style="background-color: #F7F7F7; border-radius: 10px; box-shadow: 1px 1px 5px 5px #EEEEEE;">
  
  <a href="" style="color: red;">
  <div class="float-end align-middle">
  <i class="fas fa-flag"></i>
  Algo de errado? 
  </div>
  </a>

  <img src="<?php  if ($usuario['dir_foto_perfil']){
                      if ($usuario['dir_foto_perfil'] != "") {
                         echo $usuario['dir_foto_perfil'];
                      }
                    }else{
                        echo "imagens/pic_usuarios/semfoto.png";
                    } ?>"  class="rounded-circle mt-2 mb-3 foto_perfil border border-2 border-secondary">
  <br>
  <?php 

  if (isset($_SESSION['usuario_logado'])) :
    if (($ja_votou == True) || ($_SESSION['id_usuario'] == $id_pagina)){

  $calculo = ($usuario['qt_pontos'] == 0) ? 0 : round(($usuario['qt_pontos']/$usuario['qt_votos']), 1);
  ?>
  <span class="ratingAverage" data-average="<?php echo $calculo;?>"></span>
  <span class="article" data-id="<?php echo $usuario['id_avaliado'];?>"></span>
    
  <div class="barra" style="margin-left: 4%;">
  	<span class="bg"></span>
  	<span class="stars">
  <?php for($i=1; $i<=5; $i++):?>
  
  
  <span class="star" data-vote="<?php echo $i;?>">
  	<span class="starAbsolute"></span>
  </span>
  <?php 
  	endfor;
  	echo '</span></div><p class="votos" style="margin-left: 9.5%;">(<span>'.$usuario['qt_votos'].'</span>)</p>';
      
      // Mensagem cadastrado com sucesso

        if (isset( $_SESSION['msg'])){
      ?>
            <div class="alert alert-success d-inline-block" role="alert">
            <?php echo $_SESSION['msg']; ?>
            </div>
      <?php
        }
        unset( $_SESSION['msg']);
  
  }else {
    ?>
    <form method="POST" action="avaliacao_back.php" enctype="multipart/form-data" style="margin-left: 3.5%;">
    <div class="estrelas">
      <input type="radio" id="vazio" name="estrela" value="" checked>
      
      <label for="estrela_um"><i class="fa fs-3"></i></label>
      <input type="radio" id="estrela_um" name="estrela" value="1">
      
      <label for="estrela_dois"><i class="fa fs-3"></i></label>
      <input type="radio" id="estrela_dois" name="estrela" value="2">
      
      <label for="estrela_tres"><i class="fa fs-3"></i></label>
      <input type="radio" id="estrela_tres" name="estrela" value="3">
      
      <label for="estrela_quatro"><i class="fa fs-3"></i></label>
      <input type="radio" id="estrela_quatro" name="estrela" value="4">
      
      <label for="estrela_cinco"><i class="fa fs-3"></i></label>
      <input type="radio" id="estrela_cinco" name="estrela" value="5">
      
      <input type="submit" class="btn btn-primary text-center ms-4 align-middle" style="margin-bottom: 1.8%" value="Avaliar">
      
    </div>
  </form>
  <?php
  }
endif;
  ?>

  <h3 class="mt-2"><?= $usuario['nome'], $espaco=" ", $usuario['sobrenome'] ?></h3>

  <h5 class="pt-3">Distância <?= number_format($usuario['distancia'],2);?> KM</h5>

  <h5 class="pt-3"><?php echo $usuario['cidade'] ?>  
  <?php if ((isset($usuario['estado'] )) && ($usuario['estado']  != '')) : ?>
  <?php echo $usuario['estado'] ?></h5>
  <?php endif;?>  
  <?php if ((isset($usuario['bairro'] )) && ($usuario['bairro']  != '')) : ?>
    <h5 class="pt-3">Bairro <?php echo $usuario['bairro'];  ?></h5> 
  <?php endif;?>

  <br>
  <h5>Cuido de...</h5>
  <div class="mt-3" style="width: 300px">
  <?php
      if ($usuario['especiais'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-flex border border-dark" style="background-color: #CD03FF;">
      Especiais
    </div>
  <?php
      endif;
      if ($usuario['criancas'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-dark d-inline-flex border border-dark" style="background-color: #F3F76C;">
      Crianças
    </div>
  <?php
      endif;
      if ($usuario['adolescentes'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-flex border border-dark" style="background-color: #FF4561;">
      Adolescentes
    </div>
  <?php
      endif;
      if ($usuario['idosos'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-flex border border-dark" style="background-color: #FFAF03;">
      Idosos
    </div>
  <?php
      endif;
      if ($usuario['bebes'] == 1):
  ?>
    <div class="rounded-pill p-2 mb-2 text-white d-inline-flex border border-dark" style="background-color: #40C5EB;">
      Bebês
    </div>
  <?php
      endif;
  ?> 
  </div>

  <p class="fs-5 mt-5">Mais sobre <?= $usuario['nome']?>...</p>

  <p class="pt-4 lh-lg" style="padding: 0% 10% 0 10%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $usuario['descricao'] ?></p>
 
  <hr class="mt-5 mb-5">

  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fab fa-whatsapp align-middle" style="font-size: 35px;"></i> <?= $usuario['telefone_1'] ?></p>
 
  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fas fa-at align-middle" style="font-size: 33px;"></i> <?= $usuario['email_1'] ?></p>
  </div>

  </div>
</main>

<?php
include('layouts/rodape.php');
?>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/avaliations.js"></script>
</html>