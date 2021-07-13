<?php
    session_start();
    include('conexao.php');

    if (isset($_SESSION['usuario_logado'])){

    }else{
      header('Location: index.php');
    };

    $cpf_usuario_logado = $_SESSION['usuario_logado'];

    $sql_code = "SELECT tp_usuario, id_usuario FROM usuario WHERE cpf = '$cpf_usuario_logado'";
    
    $execute = mysqli_query($conexao,$sql_code);
    
    $usuario = $execute->fetch_assoc();

    $id_usuario = $usuario['id_usuario'];

    $email_1 =                 mysqli_real_escape_string($conexao, trim($_POST['email_1']));
    $email_2 =                 mysqli_real_escape_string($conexao, trim($_POST['email_2']));
    $cep =                     mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $telefone_1 =              mysqli_real_escape_string($conexao, trim($_POST['telefone_1']));
    $telefone_2 =              mysqli_real_escape_string($conexao, trim($_POST['telefone_2']));
    $bairro =                  mysqli_real_escape_string($conexao, $_POST['bairro']);
    $rua =                     mysqli_real_escape_string($conexao, $_POST['rua']);

    if ($usuario['tp_usuario'] == "P") {

        $descricao =               mysqli_real_escape_string($conexao, $_POST['descricao']);
        $cuida_bebe =              filter_input(INPUT_POST, 'cuida_bebe');
        $cuida_crianca =           filter_input(INPUT_POST, 'cuida_crianca');
        $cuida_adolescente =       filter_input(INPUT_POST, 'cuida_adolescente');
        $cuida_idoso =             filter_input(INPUT_POST, 'cuida_idoso');
        $cuida_especiais =         filter_input(INPUT_POST, 'cuida_especiais');
    }
    // Verifica se EMAIL já estão cadastrados na base.

    $sql = "select count(*) as total from email where (email_1 or email_2 = '$email_1' and id_usuario != '$id_usuario')
     or (email_1 or email_2 = '$email_2' and id_usuario != '$id_usuario')";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['total'] == 1) {
        $_SESSION['email_existe'] = TRUE;
        header('Location: editar_info_usuario_front.php');
        exit;
    }

    // Insere os dados na base. 

    //Tabelas "usuario", "email" e "endereco".
    
    
    $sql_email =    "UPDATE email SET email_1 = '$email_1', email_2 = '$email_2' WHERE id_usuario = '$id_usuario'";
    $sql_endereco = "UPDATE endereco SET cep = '$cep', bairro = '$bairro', rua = '$rua' WHERE id_usuario = '$id_usuario'";
    $sql_telefone = "UPDATE telefone SET telefone_1 = '$telefone_1', telefone_2 = '$telefone_2' WHERE id_usuario = '$id_usuario'";
    
    //Tabela "servico" e "usuario".
    if ($usuario['tp_usuario'] == "P") {

        $sql_usuario =  "UPDATE usuario SET descricao = '$descricao' WHERE id_usuario = '$id_usuario'";

        if ($cuida_bebe == "on") {
            $sql_bebe = "UPDATE servico 
                         set bebes = 1 
                         where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";
        }else{
            $sql_bebe = "UPDATE servico 
                              set bebes = 0 
                              where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";        
        };

        if ($cuida_crianca == "on") {
            $sql_crianca = "UPDATE servico 
                            set criancas = 1 
                            where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";
        }else{
            $sql_crianca = "UPDATE servico 
                              set criancas = 0 
                              where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";        
        };

        if ($cuida_adolescente == "on") {
            $sql_adolescente = "UPDATE servico 
                                set adolescentes = 1 
                                where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";
        }else{
            $sql_adolescente = "UPDATE servico 
                              set adolescentes = 0 
                              where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";        
        };

        if ($cuida_idoso == "on") {
            $sql_idoso = "UPDATE servico
                          set idosos = 1 
                          where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";
        }else{
            $sql_idoso = "UPDATE servico 
                              set idosos = 0 
                              where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";        
        };

        if ($cuida_especiais == "on") {
            $sql_especiais = "UPDATE servico 
                              set especiais = 1 
                              where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";
        }else{
            $sql_especiais = "UPDATE servico 
                              set especiais = 0 
                              where id_usuario = (select id_usuario from usuario where id_usuario = '$id_usuario')";        
        };
    }

    //  Verifica se foram realmente inseridos ou se .

    if ($usuario['tp_usuario'] == "P") {
        if ($conexao->query($sql_usuario)       &&
            $conexao->query($sql_endereco)      &&
            $conexao->query($sql_email)         &&
            $conexao->query($sql_telefone)      &&
            $conexao->query($sql_adolescente)   &&
            $conexao->query($sql_idoso)         &&
            $conexao->query($sql_especiais)     &&
            $conexao->query($sql_crianca)       &&
            $conexao->query($sql_bebe))        {
        
            $_SESSION['sucesso_cadastro'] = TRUE;
            header('Location: editar_info_usuario_front.php');
        }else{
            $_SESSION['falha_cadastro']   = TRUE;
            header('Location: editar_info_usuario_front.php');
        }
    
    }else{
        if ($conexao->query($sql_endereco)      &&
            $conexao->query($sql_email)         &&
            $conexao->query($sql_telefone))     {    
    
           $_SESSION['sucesso_cadastro'] = TRUE;
           header('Location: editar_info_usuario_front.php');
        }else{
           $_SESSION['falha_cadastro']   = TRUE;
           header('Location: editar_info_usuario_front.php');
        }
    };
?>
    