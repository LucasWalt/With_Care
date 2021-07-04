<?php
    session_start();
    include('conexao.php');

    if (isset($_SESSION['usuario_logado'])){

    }else{
      header('Location: index.php');
    };

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
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Verifica o tamanho da imagem
    if ($_FILES["fileToUpload"]["size"] > 200000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Só permite os seguintes formatos...
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo "Sorry, only JPG, JPEG and PNG files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        rename("imagens/pic_usuarios/". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]))."","imagens/pic_usuarios/".$_SESSION['usuario_logado'].".".$imageFileType);

        $dir_foto_perfil = "imagens/pic_usuarios/".$cpf.".".$imageFileType."";

        $sql = "UPDATE usuarios SET dir_perfil_pic = '$dir_foto_perfil' WHERE cpf = '$cpf'";

        if ($conexao->query($sql_usuario){$_SESSION['foto_salva'] = True;}
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
?>