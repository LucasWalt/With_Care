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
    <title>Cadastro | With Care</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

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

        .template {
            color: red;
        }
    }
    </style>
</head>

<body class="bg-light">

    <?php
  include('layouts/menu_principal.php');
?>
    <div class="container mt-5 py-5">
        <main>
            <div class=" py-5 col-md-7 col-lg-6">
                <h3 class="mb-5 mt-2">Cadastre-se agora e encontre os melhores profissionais da sua região!</h3>
                <?php
      //<-- Mensagem de erro ao cadastrar

        if (isset($_SESSION['falha_cadastro'])):  
      ?>
                <div class="alert alert-danger" role="alert">
                    Falha ao realizar seu cadastro!
                </div>
                <?php
        endif;
        unset($_SESSION['falha_cadastro']);
      //-->

      //<-- Mensagem de erro ao cadastrar (CPF ja cadastrado)
        if (isset($_SESSION['cpf_existe'])) :
      ?>
                <div class="alert alert-danger" role="alert">
                    Falha ao realizar seu cadastro! <br>
                    O <strong>CPF</strong> informado já está vinculado a uma conta.
                </div>
                <?php 
      endif;
      unset($_SESSION['cpf_existe']);
      //-->
      
      //<-- Mensagem de erro ao cadastrar (EMAIL ja cadastrado)
      if (isset($_SESSION['email_existe'])) :
      ?>
                <div class="alert alert-danger" role="alert">
                    Falha ao realizar seu cadastro! <br>
                    O <strong>email</strong> informado já está vinculado a uma conta.
                </div>
                <?php
      endif;
      unset($_SESSION['email_existe']);
      //-->
      if (isset($_SESSION['senha_difere'])) :
        ?>
                        <div class="alert alert-danger" role="alert">
                      Falha ao realizar seu cadastro! <br>
                      As <strong>senhas</strong> informadas não são identicas.
                  </div>
                  <?php
        endif;
        unset($_SESSION['senha_difere']);
              // Mensagem cadastrado com sucesso

      if (isset($_SESSION['sucesso_cadastro'])):
        ?>
                  <div class="alert alert-success" role="alert">
                      Você foi cadastrado com sucesso!
                  </div>
                  <?php
          endif;
          unset($_SESSION['sucesso_cadastro']);
                   //-->
        ?>
                <form action="cadastro_clientes_back.php" method="POST">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="" value=""
                                autofocus required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder=""
                                value="" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="nome@email.com" email-validate required>
                        </div>

                        <div class="col-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00"
                                maxlength="11" required>
                        </div>
                        <div>
                        </div>
                        <div class="col-md-6 pb-3">
                            <label for="zip" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="zip" name="cep" placeholder="0000-0000"
                                maxlength="8" required>
                        </div>
                        <div class="col-sm-6 me-1">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="" value=""
                                min-length="8" password-validate required>
                        </div>
                        <div class="col-sm-6">
                            <label for="confirma_senha" class="form-label">Confirme a Senha</label>
                            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha"
                                placeholder="" value="" equal="senha" required>
                        </div>

                        <p class="mt-5 mb-3" style="text-align: justify; width: 450px;"><input type="checkbox"
                                id="aceita_termos" name="aceita_termos" value="" required>
                            Aceito os <a href="termos.php">Termos e condições</a> e autorizo o uso de meus dados de acordo
                            com a <a href="privacidade.php">Declaração de privacidade</a>.
                        </p>

                        <button class="w-100 btn btn-primary btn-lg align-middle" type="submit"
                            id="btn-submit">Cadastrar</button>
                    </div>
                </form>
            </div>
    </div>

    </main>
    </div>
    <?php
        include('layouts/rodape.php');
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
</body>

</html>