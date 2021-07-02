<?php
    if(!$_SESSION['usuario_logado']){
        header('Location: index.php');
        exit();
    }
?>