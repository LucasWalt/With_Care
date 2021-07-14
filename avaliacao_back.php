<?php
session_start();
include_once("conexao.php");

$id_avaliado = $_SESSION['id_avaliado'];

$id_avaliador = $_SESSION['id_usuario'];

$sql_code = "SELECT COUNT(*) AS total FROM controle_avaliacao WHERE id_avaliado = '$id_avaliado' AND id_avaliador = '$id_avaliador'";

$execute = mysqli_query($conexao,$sql_code);

$ja_votou = $execute->fetch_assoc();

if ($ja_votou['total'] == 0) {
    
    if(!empty($_POST['estrela'])){
    	$estrela = $_POST['estrela'];
    
        $sql = "select count(*) as total from pontuacao_avaliacao where id_avaliado = '$id_avaliado'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);
    
        if ($row['total'] == 0) {
        
    	    //Salvar no banco de dados
    	    $result_avaliacos = "INSERT INTO pontuacao_avaliacao (id_avaliado, qt_votos, qt_pontos) VALUES ('$id_avaliado ', 1, '$estrela'";
        
        }else{
            $sql_code = "SELECT qt_votos, qt_pontos FROM pontuacao_avaliacao WHERE id_avaliado = '$id_avaliado'";
        
            $execute = mysqli_query($conexao,$sql_code);
        
            $qts_avaliacao = $execute->fetch_assoc();
        
            $qt_votos = $qts_avaliacao['qt_votos'];
        
            $qt_votos = $qt_votos + 1;
        
            $qt_pontos = $qts_avaliacao['qt_pontos'] ;
        
            $qt_pontos = $qt_pontos + $estrela;
        
            $result_avaliacos = "UPDATE pontuacao_avaliacao SET qt_votos = '$qt_votos',  qt_pontos = '$qt_pontos' WHERE id_avaliado = '$id_avaliado'";
        
            if ($conexao->query($result_avaliacos)){
            
                $sql_code = "INSERT INTO controle_avaliacao (id_avaliado, id_avaliador) VALUES ($id_avaliado, $id_avaliador)";

                $conexao->query($sql_code);
            
                $_SESSION['msg'] = "Profissional avaliado!";
                header('Location: perfil_profissional.php?id='.$id_avaliado.'');
            }else{
                $_SESSION['msg'] = "Erro ao avaliar profissional!";
                header('Location: perfil_profissional.php?id='.$id_avaliado.'');
            }
        }
    
    }else{
    	$_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela!";
    	header('Location: perfil_profissional.php?id='.$id_avaliado.'');
    }
}else {
    $_SESSION['msg'] = "Você não pode avaliar duas vezes a mesma pessoa!";
    header('Location: perfil_profissional.php?id='.$id_avaliado.'');
}