<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>With Care | Profissionais Próximos</title>

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
</head>

<body>
  <?php
  include('layouts/menu_principal.php');
  include('layouts/star_system.php');
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

  <img src="imagens/logo.png"  class="rounded-circle mt-2 foto_perfil" alt="">
  <br>

  <div class="d-inline-flex mt-3"> 
  <svg class="icon">
	<use xlink:href="#stars-5-0-star">
	</svg></div>

  <h3 class="mt-2">nome / sobrenome / idade</h3>

  <h4 class="mt-3">categorias que atende</h4>

  <h5 class="pt-3">cidade</h5>

  <p class="pt-3">formação</p>

  <p class="pt-3">descrição</p>
 
  <hr class="mt-5 mb-5">

  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fab fa-whatsapp align-middle" style="font-size: 35px;"></i> (00) 00000-0000</p>

  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fas fa-phone-alt align-middle" style="font-size: 30px;"></i> (00) 00000-0000</p>
 
  <p class="pt-2 ps-2 pe-2 rounded-3"><i class="fas fa-at align-middle" style="font-size: 33px;"></i> email@email.com</p>
  </div>

  </div>
</main>

  <?php
  include('layouts/rodape.php');
  ?>
</body>
<script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
</html>