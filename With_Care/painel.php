<?php
    session_start();
    include('verifica_login.php');
    include('menu_principal.php');  
?>

<h2><?php echo  $_SESSION['usuario'];?></h2>
<br>
<h2><a href="logout.php">Sair</a></h2>
