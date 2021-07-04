<?php
    session_start();
    session_destroy();

    if (isset($_SESSION['usuario_logado'])){

    }else{
      header('Location: index.php');
    };
    
    header('Location: index.php');
    exit();
?>