<?php
    session_start();
    include('conexao.php');

    if (isset($_SESSION['usuario_logado'])){

    }else{
      header('Location: index.php');
    };

    $cpf_usuario_logado = $_SESSION['usuario_logado'];

    $select_id = "SELECT id_usuario FROM usuario WHERE cpf ='$cpf_usuario_logado'";

    $execute = mysqli_query($conexao,$select_id);

    $id_usuario1 = $execute->fetch_assoc();

    $id_usuario = $id_usuario1['id_usuario'];

    $sql1 = "DELETE FROM usuario  WHERE id_usuario = '$id_usuario'";

    $sql2 = "DELETE FROM telefone WHERE id_usuario = '$id_usuario'";

    $sql3 = "DELETE FROM servico  WHERE id_usuario = '$id_usuario'";

    $sql4 = "DELETE FROM endereco WHERE id_usuario = '$id_usuario'";

    $sql5 = "DELETE FROM email    WHERE id_usuario = '$id_usuario'";

    if ($conexao->query($sql1)      &&
        $conexao->query($sql2)      &&
        $conexao->query($sql3)      &&
        $conexao->query($sql4)      &&
        $conexao->query($sql5))      {
            include('logout.php');
            $_SESSION['sucesso_deletar'] = TRUE;
            header('Location: index.php');
        }else{
            $_SESSION['falha_deletar']   = TRUE;
            header('Location: editar_info_usuario_front.php');
        }
        clearstatcache();
        $conexao->close();
        exit();
?>