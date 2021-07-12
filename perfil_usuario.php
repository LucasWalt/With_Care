<?php
  session_start();
  include('conexao.php');

  if (isset($_SESSION['usuario_logado'])){

  }else{
    header('Location: index.php');
  };

  $cpf_usuario_logado = $_SESSION['usuario_logado'];

  $sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.dir_foto_perfil, A.tp_usuario, B.cep, C.email_1, D.telefone_1, D.telefone_2,
                E.bebes, E.criancas, E.adolescentes, E.idosos, E.especiais, F.qt_votos, F.qt_pontos, F.id_avaliado FROM usuario as A 
                INNER JOIN endereco as B on A.id_usuario = B.id_usuario
                INNER JOIN email as C on A.id_usuario = C.id_usuario 
                INNER JOIN telefone as D on A.id_usuario = D.id_usuario 
                INNER JOIN servico as E on A.id_usuario = E.id_usuario 
                INNER JOIN pontuacao_avaliacao as F on A.id_usuario = F.id_avaliado 
                WHERE A.cpf = '$cpf_usuario_logado'";

$execute = mysqli_query($conexao,$sql_code);

$usuario = $execute->fetch_assoc();

include('API_pesquisa_cep.php');

$btn_salvar = "False";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Perfil do Usuário | With Care</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
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
  <div class="container-md border-4 p-5" style="background-color: #F7F7F7; 
    border-radius: 10px; box-shadow: 1px 1px 5px 5px #EEEEEE;">
  
  <a href="editar_info_usuario_front.php">
  <div class="float-end align-middle btn btn-primary">
  <i class="fas fa-edit"></i>
  Editar Perfil
  </div>
  </a>
  <div>
  <img src="<?php  if ($usuario['dir_foto_perfil']){
                      if ($usuario['dir_foto_perfil'] != "") {
                         echo $usuario['dir_foto_perfil'];
                      }
                    }else{
                        echo "imagens/pic_usuarios/semfoto.png";
                    } ?>"  class="rounded-circle mt-2 mb-3 foto_perfil border border-2 border-secondary">

  <?php
      
      // Mensagem cadastrado com sucesso

        if (isset($_SESSION['foto_salva'])){
      ?>
            <div class="alert alert-success d-inline-block" role="alert">
                Sucesso ao atualizar foto de perfil!
            </div>
      <?php
        }
        
        if (isset($_SESSION['foto_erro'])){
      ?>
            <div class="alert alert-danger d-inline-block" role="alert">
              Erro ao atualizar foto de perfil!
            </div>
      <?php          
        };
        unset($_SESSION['foto_salva']);
        unset($_SESSION['foto_erro']);
  ?>

  <?php 
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
  ?>

<label for="fileToUpload" class="fs-5 fw-bolder">Alterar Foto de Perfil</label>
  <br>
  
  <div class=" pb-2 pt-1 ps-1 pe-1 border border-3 rounded-2 d-inline-block" style="background: #D6D2C0;border-color: #B9B6AA">
    <form action="upload_back.php" method="post" enctype="multipart/form-data">
      <input class="float-start align-middle btn ps-1" style="background-color: #D2D2D2; width: 141px;" type="file"  name="fileToUpload">
      <button class=" btn btn-primary align-middle ms-2 border border-1 rounded-3" style="margin-top: 2.7px;" type="submit"
       id="btn-submit" name="submit" id="fileToUpload">Salvar</button>
    </form>
  </div>

  <h3 class="mt-5"><?= $usuario['nome'], $espaco=" ", $usuario['sobrenome'] ?></h3>

  <h5 class="pt-3"><?php echo $endereco->localidade; ?> - <?php echo $endereco->uf; ?></h5>

  <?php if ((isset($endereco->bairro)) && ($endereco->bairro != '')) : ?>
    <h5 class="pt-3">Bairro <?php echo $endereco->bairro; ?></h5> 
  <?php endif;?>

  <br>
  <?php
  if ($usuario['tp_usuario'] == "P") {
  ?>

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

  <p class="pt-4 lh-lg"><?=$usuario['descricao'] ?></p>
  <?php
  }  
  ?>
  <hr class="mt-5 mb-5">

  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fab fa-whatsapp align-middle" style="font-size: 35px;"></i> <?= $usuario['telefone_1'] ?></p>

  <?php if (isset($usuario['telefone_2'])): ?>
   <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fas fa-phone-alt align-middle" style="font-size: 30px;"></i> <?= $usuario['telefone_2'] ?></p>
  <?php endif;?>

  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fas fa-at align-middle" style="font-size: 33px;"></i> <?= $usuario['email_1'] ?></p>
  </div>

  </div>
</main>

<?php
include('layouts/rodape.php');
?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/avaliations.js"></script>
</body>
</html>