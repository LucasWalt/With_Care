<?php
    session_start();
    include('conexao.php');

    if (isset($_SESSION['usuario_logado'])){

    }else{
      header('Location: index.php');
    };
try{
    $cpf = $_SESSION['usuario_logado'];

    $dir_foto_perfil_atual = "SELECT dir_foto_perfil FROM usuario WHERE cpf = '$cpf'";

    $execute = $conexao->query($dir_foto_perfil_atual);

    $dir_foto_perfil_atual = $execute->fetch_assoc();

    unlink($dir_foto_perfil_atual['dir_foto_perfil']);

    $target_dir = "imagens/pic_usuarios/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Verifica se o Arquivo é realmente uma imagem
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }
    }

    // Verifica se o arquivo ainda existe
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }

    // Verifica o tamanho da imagem
    if ($_FILES["fileToUpload"]["size"] > 1000000000) {
      $uploadOk = 0;
    }

    // Só permite os seguintes formatos...
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $_SESSION['foto_erro'] = True;
      header('Location: perfil_usuario.php');
    } else {
        

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        rename("imagens/pic_usuarios/". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).
                "","imagens/pic_usuarios/".$cpf.".".$imageFileType);

        $dir_foto_perfil = "imagens/pic_usuarios/".$cpf.".".$imageFileType."";

        $sql_usuario = "UPDATE usuario SET dir_foto_perfil = '$dir_foto_perfil' WHERE cpf = '$cpf'";

        if ($conexao->query($sql_usuario)){

          $_SESSION['foto_salva'] = True;
          header('Location: perfil_usuario.php');
        }else{
          $_SESSION['foto_erro'] = True;
          header('Location: perfil_usuario.php');
        }
      } else {
          $_SESSION['foto_erro'] = True;
          header('Location: perfil_usuario.php');
      }
    }
  }catch(Exception $e){
    $_SESSION['foto_erro'] = True;
    header('Location: perfil_usuario.php');
  };

?>