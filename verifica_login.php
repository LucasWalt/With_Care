<?php
    if(!$_SESSION['usuario']){
        header('Location: login_front.php');
        exit();
    }