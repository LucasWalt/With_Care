<?php
    session_start();
    include('conexao.php');

    $nome =           mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $sobrenome =      mysqli_real_escape_string($conexao, $_POST['sobrenome']);
    $email =          mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cpf =            mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $cep =            mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $senha =          mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

// Verifica se EMAIL e se CPF já estão cadastrados na base. 

    $sql = "select count(*) as total from usuario where cpf = '$cpf'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        $_SESSION['cpf_existe'] = TRUE;
        header('Location: cadastro_clientes_front.php');
        exit;
    }

    $sql = "select count(*) as total from email where email_1 or email_2 = '$email'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['total'] == 1) {
        $_SESSION['email_existe'] = TRUE;
        header('Location: cadastro_clientes_front.php');
        exit;
    }

include('geo_ip.php');

// Insere os dados na base.

    //Tabela "usuario"
    $sql = "INSERT INTO usuario (nome, sobrenome, cpf, senha, dt_cadastro) values('$nome', '$sobrenome','$cpf','$senha', NOW())";
    $sql1 = "INSERT INTO email(id_usuario, email_1) values((select id_usuario from usuario where cpf = '$cpf'), '$email')";
    $sql2 = "INSERT INTO endereco(id_usuario, cep , latitude, longitude) values((select id_usuario from usuario where cpf = '$cpf'), '$cep', $data->latitude, $data->longitude);"; 

//Verifica se foram realmente inseridos.
    if  (($conexao->query($sql))   &&
        ($conexao->query($sql1))   &&
        ($conexao->query($sql2))){
          
        $_SESSION['sucesso_cadastro'] = TRUE;
        header('Location: cadastro_clientes_front.php');
    }else {
        $_SESSION['falha_cadastro'] = TRUE;
        header('Location: cadastro_clientes_front.php');
    }

    $conexao->close();

    exit();
?>