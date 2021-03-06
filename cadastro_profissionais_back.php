<?php
    session_start();
    include('conexao.php');

    $nome =                    mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $sobrenome =               mysqli_real_escape_string($conexao, $_POST['sobrenome']);
    $email =                   mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cpf =                     mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $cep =                     mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $telefone =                mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $senha =                   mysqli_real_escape_string($conexao, md5($_POST['senha']));
    $confirma_senha =          mysqli_real_escape_string($conexao, md5($_POST['confirma_senha']));
    $cuida_bebe =              filter_input(INPUT_POST, 'cuida_bebe');
    $cuida_crianca =           filter_input(INPUT_POST, 'cuida_crianca');
    $cuida_adolescente =       filter_input(INPUT_POST, 'cuida_adolescente');
    $cuida_idoso =             filter_input(INPUT_POST, 'cuida_idoso');
    $cuida_especiais =         filter_input(INPUT_POST, 'cuida_especiais');

    $erro = 0;
    if ($senha != $confirma_senha) {
        $erro = 1;
        $_SESSION['senha_difere']    = TRUE;
        header('Location: cadastro_profissionais_front.php');
    }

    // Verifica se EMAIL ou CPF já estão cadastrados na base.

    $sql = "select count(*) as total from usuario where cpf = '$cpf'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        $erro = 1;
        $_SESSION['cpf_existe'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
        exit;
    }

    $sql = "select count(*) as total from email where email_1 or email_2 = '$email'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['total'] == 1) {
        $erro = 1;
        $_SESSION['email_existe'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
        exit;
    }

    include('geo_ip.php');

    // Insere os dados na base. 

    //Tabelas "usuario", "email" e "endereco".
    
    $sql_usuario = "INSERT INTO usuario (nome, sobrenome, cpf, senha, dt_cadastro, tp_usuario) values('$nome', '$sobrenome','$cpf','$senha', NOW(), 'P')";
    $sql_email = "INSERT INTO email(id_usuario, email_1) values((select id_usuario from usuario where cpf = '$cpf'), '$email')";
    $sql_endereco = "INSERT INTO endereco(id_usuario, cep , latitude, longitude) values((select id_usuario from usuario where cpf = '$cpf'), '$cep', $data->latitude, $data->longitude);";
    $sql_telefone = "INSERT INTO telefone(id_usuario, telefone_1) values((select id_usuario from usuario where cpf = '$cpf'), '$telefone')";
    
    //Tabela "servico".

    $sql_serv = "INSERT INTO servico(id_usuario) 
                 values((select id_usuario from usuario where cpf = '$cpf'))";
   
    if ($cuida_bebe == "on") {
        $sql_bebe = "UPDATE servico 
                     set bebes = 1 
                     where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }else{
        $sql_bebe = "UPDATE servico 
                          set bebes = 0 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";        
    };

    if ($cuida_crianca == "on") {
        $sql_crianca = "UPDATE servico 
                        set criancas = 1 
                        where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }else{
        $sql_crianca = "UPDATE servico 
                          set criancas = 0 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";        
    };

    if ($cuida_adolescente == "on") {
        $sql_adolescente = "UPDATE servico 
                            set adolescentes = 1 
                            where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }else{
        $sql_adolescente = "UPDATE servico 
                          set adolescentes = 0 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";        
    };

    if ($cuida_idoso == "on") {
        $sql_idoso = "UPDATE servico
                      set idosos = 1 
                      where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }else{
        $sql_idoso = "UPDATE servico 
                          set idosos = 0 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";        
    };

    if ($cuida_especiais == "on") {
        $sql_especiais = "UPDATE servico 
                          set especiais = 1 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }else{
        $sql_especiais = "UPDATE servico 
                          set especiais = 0 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";        
    };

               //  Verifica se foram realmente inseridos ou se .
               if ($erro != 1) {

               if ($conexao->query($sql_usuario)       &&
                   $conexao->query($sql_serv)          &&
                   $conexao->query($sql_endereco)      &&
                   $conexao->query($sql_email)         &&
                   $conexao->query($sql_telefone)      && 
                   $conexao->query($sql_adolescente)   &&
                   $conexao->query($sql_idoso)         &&
                   $conexao->query($sql_especiais)     &&
                   $conexao->query($sql_crianca)       &&
                   $conexao->query($sql_bebe))         {
                
                   $_SESSION['sucesso_cadastro'] = TRUE;
                   header('Location: cadastro_profissionais_front.php');
               }else{
                   $_SESSION['falha_cadastro']   = TRUE;
                   header('Location: cadastro_profissionais_front.php');
               }
               }else {
               }
            ?>
    