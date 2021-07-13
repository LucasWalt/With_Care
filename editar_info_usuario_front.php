<?php
  session_start();
  include('conexao.php');
  
if (isset($_SESSION['usuario_logado'])){

}else{
  header('Location: index.php');
};

$cpf_usuario_logado = $_SESSION['usuario_logado'];

$sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.dir_foto_perfil, A.cpf, A.tp_usuario, B.cep,
                     B.rua, B.bairro, C.email_1, C.email_2, D.telefone_1, D.telefone_2,
                     E.bebes, E.criancas, E.adolescentes, E.idosos, E.especiais FROM usuario as A 
                     INNER JOIN endereco as B on A.id_usuario = B.id_usuario
                     INNER JOIN email as C on A.id_usuario = C.id_usuario 
                     INNER JOIN telefone as D on A.id_usuario = D.id_usuario 
                     INNER JOIN servico as E on A.id_usuario = E.id_usuario  
                     WHERE A.cpf = '$cpf_usuario_logado'";

$execute = mysqli_query($conexao,$sql_code);

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

                <h2 class="mb-5 mt-5">Atualizar Informações de Usuario</h2>

                <h4>Informações Básicas</h4>
                <?php
      
      // Mensagem cadastrado com sucesso

        if (isset($_SESSION['sucesso_cadastro'])):
      ?>
                <div class="alert alert-success" role="alert">
                    Informações atualizadas com sucesso!
                </div>
                <?php
        endif;
        unset($_SESSION['sucesso_cadastro']);

      //-->

      //<-- Mensagem de erro ao cadastrar

        if (isset($_SESSION['falha_cadastro'])):  
      ?>
                <div class="alert alert-danger" role="alert">
                    Falha ao atualizar informações!
                </div>
                <?php
        endif;
        unset($_SESSION['falha_cadastro']);
      //-->


        if (isset($_SESSION['falha_deletar'])):
        ?>
            <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao deletar sua conta!
            </div>
       <?php     
        endif;
        unset($_SESSION['falha_deletar']);
      ?>
        <div class="dropdown">
         <button class="btn btn-danger dropdown-toggle float-end" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           Excluir Conta!
         </button>
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
           <li><a class="dropdown-item" href="deletar_perfil_usuario.php" ><strong>Excluir</strong> conta permanentemente?</a></li>

         </ul>
        </div>
      
                <form action="editar_info_usuario_back.php" method="POST">
                    <div class="row g-3">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" 
                                    value="<?php echo $usuario['nome']; ?>" disabled>
                            </div>
                            
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                    value="<?php echo $usuario['sobrenome']; ?>" disabled>
                            </div>


                            <div class="col-6">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf"
                                 value="<?php echo $usuario['cpf']; ?>" disabled>
                            </div>

                            <div class="col-12">
                                <label for="email_1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_1" name="email_1"
                                 value="<?php echo $usuario['email_1']; ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="zip" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="zip" name="cep" placeholder="0000-0000"
                                    maxlength="8" value="<?php echo $usuario['cep']; ?>" required>
                            </div>

                            <div class="col-6">
                                <label for="telefone_1" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone_1" name="telefone_1" placeholder="(00) 00000-0000"
                                maxlength="11" value="<?php echo $usuario['telefone_1']; ?>" required>
                            </div>
                            
                            <?php if ($usuario['tp_usuario'] == "P"): ?>

                            <div class="col-md-6 ms-1">
                                <label for="cuidado" class="form-label">De quem você cuida?</label><br>

                                <input class="mt-3" type="checkbox" id="cuida_bebe" name="cuida_bebe"
                                <?php if ($usuario['bebes'] == 1) {
                                    echo "checked";
                                } ?>>
                                <label for="cuida_bebe"> Bebê</label>

                                <input class="ms-4" type="checkbox" id="cuida_crianca" name="cuida_crianca"
                                <?php if ($usuario['criancas'] == 1) {
                                    echo "checked";
                                } ?>>
                                <label for="cuida_crianca"> Criança</label><br><br>

                                <input type="checkbox" id="cuida_adolescente" name="cuida_adolescente"
                                <?php if ($usuario['adolescentes'] == 1) {
                                    echo "checked";
                                } ?>>
                                <label for="cuida_adolescente"> Adolescente</label><br><br>

                                <input type="checkbox" id="cuida_idoso" name="cuida_idoso"
                                <?php if ($usuario['idosos'] == 1) {
                                    echo "checked";
                                } ?>>
                                <label for="cuida_idoso"> Idoso</label>

                                <input class="ms-3" type="checkbox" id="cuida_especiais" name="cuida_especiais"
                                <?php if ($usuario['especiais'] == 1) {
                                    echo "checked";
                                } ?>>
                                <label for="cuida_especiais"> Pessoas Especiais</label><br>
                            </div>    

                            <div class="col-12">
                                <label for="descricao" class="form-label fs-5 fw-bold mt-3">Descrição</label>
                                
                                <p class="">Conte um pouco sobre você e coloque informações importantes para 
                                seus clientes como sua formação, horarios em que está disponível, etc...</p>
                                
                                <textarea class="form-control" id="descricao" name="descricao"
                                placeholder=" " maxlength="1500" rows="10" required> 
                                <?php echo $usuario['descricao']; ?></textarea>
                            </div>
                            
                            <?php endif;?>

                            <h4>Informações Adicionais</h4>

                            <div class="col-6">
                                <label for="rua" class="form-label">Logradouro</label>
                                <input type="text" class="form-control" id="rua" name="rua" 
                                placeholder="Av. Exemplo, Nº 123" value="<?php echo $usuario['rua'] ;?>">
                            </div>

                            <div class="col-6">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" 
                                placeholder="Ex: Centro" value="<?php echo $usuario['bairro']; ?>">
                            </div>

                            <div class="col-6">
                                <label for="telefone_2" class="form-label">2º Telefone</label>
                                <input type="text" class="form-control" id="telefone_2" name="telefone_2" 
                                placeholder="(00) 00000-0000" maxlength="11" value="<?php echo $usuario['telefone_2']; ?>">
                            </div>

                            <div class="col-12">
                                <label for="email_2" class="form-label">2º Email</label>
                                <input type="email" class="form-control" id="email_2" name="email_2"
                                    placeholder="nome@exemplo.com" value="<?php echo $usuario['email_2']; ?>" >
                            </div>

                            <button class="w-100 btn btn-primary btn-lg align-middle mt-5" type="submit" id="btn-submit">Salvar</button>
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