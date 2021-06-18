<?php
    session_start();
    include('conexao.php');

    if (empty($_POST['cpf']) || empty($_POST['senha'])) {
        header('Location: login_front.php');
        exit();
    };

    $cpf =   mysqli_real_escape_string($conexao, $_POST['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "select id_usuario, cpf, nome from usuario where cpf = '$cpf' and senha = md5('$senha')";

    $result = mysqli_query($conexao, $query);

    $row = mysqli_num_rows($result);

    $dados_usuario = $result->fetch_assoc();

    if ($row == 1) {
        $_SESSION['usuario_logado'] = $dados_usuario['cpf'];
        header('Location: verifica_login.php');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: login_front.php');
        exit();
    };