<?php 
    define('HOST', '127.0.0.1');
    define('USUARIO', 'root');
    define('SENHA', 'root');
    define('DB', 'withcare');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('<br><br> NÃO FOI POSSÍVEL CONECTAR AO BANCO DE DADOS! <br><br>  Verifique as credenciais do banco de dados no arquivo "conexao.php" !');
?>