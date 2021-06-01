<?php
    session_start();
    include('conexao.php');

    $nome =                    mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $sobrenome =               mysqli_real_escape_string($conexao, $_POST['sobrenome']);
    $email =                   mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cpf =                     mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $cep =                     mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $senha =                   mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $cuida_bebe =              filter_input(INPUT_POST, 'cuida_bebe');
    $cuida_crianca =           filter_input(INPUT_POST, 'cuida_crianca');
    $cuida_adolescente =       filter_input(INPUT_POST, 'cuida_adolescente');
    $cuida_idoso =             filter_input(INPUT_POST, 'cuida_idoso');
    $cuida_especiais =         filter_input(INPUT_POST, 'cuida_especiais');


    echo $cuida_adolescente;
    // Verifica se EMAIL e se CPF já estão cadastrados na base. 

    $sql = "select count(*) as total from usuario where cpf = '$cpf'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        $_SESSION['cpf_existe'] = TRUE;
        header('Location: cadastro_profisiois_front.php');
        exit;
    }

    $sql = "select count(*) as total from email where email_1 or email_2 = '$email'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['total'] == 1) {
        $_SESSION['email_existe'] = TRUE;
        header('Location: cadastro_profissiois_front.php');
        exit;
    }

    // Insere os dados na base. 

    //Tabelas "usuario", "email" e "endereco".
    $sql = "INSERT INTO usuario (nome, sobrenome, cpf, senha, dt_cadastro) 
            values('$nome', '$sobrenome','$cpf','$senha', NOW())

            INSERT INTO email(id_usuario, email_1) 
            values((select id_usuario from usuario where cpf = '$cpf'), '$email')   
    
            INSERT INTO endereco(id_usuario, cep) 
            values((select id_usuario from usuario where cpf = '$cpf'), '$cep')";
    
    //Tabela "servico".

    $sql_bebe = "INSERT INTO servico(id_usuario) 
                 values((select id_usuario from usuario where cpf = '$cpf'))";
   
    if ($cuida_bebe == "on") {
        $sql_bebe = "UPDATE servico 
                     set bebes = 1 
                     where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }

    if ($cuida_crianca == "on") {
        $sql_crianca = "UPDATE servico 
                        set criancas = 1 
                        where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }

    if ($cuida_adolescente == "on") {
        $sql_adolescente = "UPDATE servico 
                            set adolescentes = 1 
                            where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }

    if ($cuida_idoso == "on") {
        $sql_idoso = "UPDATE servico
                      set idosos = 1 
                      where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }

    if ($cuida_especiais == "on") {
        $sql_especiais = "UPDATE servico 
                          set especiais = 1 
                          where id_usuario = (select id_usuario from usuario where cpf = '$cpf')";
    }

    //  Verifica se foram realmente inseridos ou se .

    if ($conexao->query($sql_bebe)          === TRUE and
        $conexao->query($sql_crianca)       === TRUE and
        $conexao->query($sql_adolescente)   === TRUE and
        $conexao->query($sql_idoso)         === TRUE and
        $conexao->query($sql_especiais)     === TRUE and
        $conexao->query($sql)               === TRUE) {
        
        $_SESSION['sucesso_cadastro'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
    }else{
        $_SESSION['falha_cadastro'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
    }

    $conexao->close();
    exit();
?>
    