<?php
    session_start();
    include('conexao.php');

    $nome =                    mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $sobrenome =               mysqli_real_escape_string($conexao, $_POST['sobrenome']);
    $email =                   mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cpf =                     mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $cep =                     mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $telefone =                mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $senha =                   mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $cuida_bebe =              filter_input(INPUT_POST, 'cuida_bebe');
    $cuida_crianca =           filter_input(INPUT_POST, 'cuida_crianca');
    $cuida_adolescente =       filter_input(INPUT_POST, 'cuida_adolescente');
    $cuida_idoso =             filter_input(INPUT_POST, 'cuida_idoso');
    $cuida_especiais =         filter_input(INPUT_POST, 'cuida_especiais');

    // Verifica se EMAIL ou CPF já estão cadastrados na base.

    $sql = "select count(*) as total from usuario where cpf = '$cpf'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        $_SESSION['cpf_existe'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
        exit;
    }

    $sql = "select count(*) as total from email where email_1 or email_2 = '$email'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['total'] == 1) {
        $_SESSION['email_existe'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
        exit;
    }

    // Insere os dados na base. 

    //Tabelas "usuario", "email" e "endereco".
    
    $sql_usuario = "INSERT INTO usuario (nome, sobrenome, cpf, senha, dt_cadastro, tp_usuario) values('$nome', '$sobrenome','$cpf','$senha', NOW(), 'P')";
    $sql_email = "INSERT INTO email(id_usuario, email_1) values((select id_usuario from usuario where cpf = '$cpf'), '$email')";
    $sql_endereco = "INSERT INTO endereco(id_usuario, cep) values((select id_usuario from usuario where cpf = '$cpf'), '$cep')";
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

// UPLOAD DA IMAGEM

    $target_dir = "imagens/pic_usuarios/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Verifica se o Arquivo é realmente uma imagem
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - ".$check["mime"].".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Verifica se o arquivo ainda existe
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }

    // Verifica o tamanho da imagem
    if ($_FILES["fileToUpload"]["size"] > 200000) {
      $uploadOk = 0;
    }

    // Só permite os seguintes formatos...
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        rename("imagens/pic_usuarios/". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]))."","imagens/pic_usuarios/".$_SESSION['usuario_logado'].".".$imageFileType);

        $dir_foto_perfil = "imagens/pic_usuarios/".$cpf.".".$imageFileType."";

        $sql_foto = "UPDATE usuarios SET dir_perfil_pic = '$dir_foto_perfil' WHERE cpf = '$cpf'";
      } 
    }

    //  Verifica se foram realmente inseridos ou se .

    if ($conexao->query($sql_usuario)       &&
        $conexao->query($sql_serv)          &&
        $conexao->query($sql_endereco)      &&
        $conexao->query($sql_email)         &&
        $conexao->query($sql_telefone)      && 
        $conexao->query($sql_adolescente)   &&
        $conexao->query($sql_idoso)         &&
        $conexao->query($sql_especiais)     &&
        $conexao->query($sql_crianca)       &&
        $conexao->query($sql_bebe)          &&   
        $conexao->query($sql_foto))         {
        
        $_SESSION['sucesso_cadastro'] = TRUE;
        header('Location: cadastro_profissionais_front.php');
    }else{
        $_SESSION['falha_cadastro']   = TRUE;
        header('Location: cadastro_profissionais_front.php');
    }

    $conexao->close();
    exit();
?>
    