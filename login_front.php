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
    <title>Entra | With Care</title>

    <link rel="canonical" href="https://etbootstrap.com/docs/5.0/examples/sign-in/">
    
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
    <link href="css/signin.css" rel="stylesheet">
  </head>
<body class="text-center">

<?php
  include('layouts/menu_principal.php')
?>
    
<main class="form-signin py-5">

  <form action="login_back.php" method="POST">
    <img class="mb-4 mt-5" src="imagens/logo.png" alt="" width="150" height="150">
    <h1 class="h3 mb-3 fw-normal">Entre na sua conta agora!</h1>
    
    <div class="form-floating">
      <input type="text" class="form-control"  id="floatingInput" name="cpf" placeholder="CPF" maxlength ="11" autofocus required>
      <label for="floatingInput">CPF</label>
    </div>
    
    <div class="form-floating">
      <input type="password" class="form-control des" name="senha" id="floatingPassword" placeholder="Senha" required>
      <label for="floatingPassword">Senha</label>
    </div>
    
    <?php 
      if (isset($_SESSION['nao_autenticado'])):
    ?>
    <div class="alert alert-danger" role="alert">
        CPF e/ou Senha inválidos!
      </div>
    <?php
    
      endif;
      unset($_SESSION['nao_autenticado']);
    ?>

    <div class="checkbox mb-3">

    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

  </form>
  <?php
  include('layouts/rodape.php');
?>
</main>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
  </body>
</html>
