<?php
    session_start();
    include('conexao.php');
    //Define o numero de perfis de profissionais iram aparecer por pagina.
    $perfis_por_pagina = 12;
    
    //Pegar pagina atual 
    $pagina = intval($_GET['pagina']);

    //Pegar usuarios do tipo "P"(profissional) do banco de dados 
    $sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.tp_usuario, B.cep FROM usuario as A 
                 INNER JOIN endereco as B on A.id_usuario = B.id_usuario 
                 WHERE A.tp_usuario = 'P' LIMIT $pagina, $perfis_por_pagina;";

    $execute = mysqli_query($conexao,$sql_code);

    $usuario = $execute->fetch_assoc();
    $num = $execute->num_rows;

    //Pega a quantidade total de usuarios no banco de dados
    $num_total = ("select count(*) as total from usuario where tp_usuario = 'P'");
    $result = mysqli_query($conexao, $num_total);
    $row = mysqli_fetch_assoc($result);  
    
    //Calcula o numero de paginas
    $num_paginas = ceil($row['total']/$perfis_por_pagina);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Carousel Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/features/">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/features.css" rel="stylesheet">
</head>

<body>

    <?php
  include('layouts/menu_principal.php');
?>
    <main>
        <div class="container px-4 py-5" id="featured-3" style="margin-left: 5%;">
            <h2 class="pb-2 border-bottom mt-5">Profissionais próximos de você</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

                <?php
            if ($num > 0) {
                do{
            ?>

                <div class="feature col">

                    <div class="feature-icon  bg-gradient">
                    </div>
                    <h2><?= $usuario['nome'],$espaco=" ", $usuario['sobrenome']?></h2>

                    <p><?= $usuario['descricao']?></p>

                    <p>Entre em Contato</p>

                </div>
                <?php }while($usuario = $execute->fetch_assoc()); }?>
            </div>
        

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                  for ($i=0; $i < $num_paginas ; $i++) { 
                    $estilo="";
                    if ($pagina == $i) {
                      $estilo = "class:\"active\"";
                ?>
                <li <?php echo $estilo; ?> >
                <a class="page-link" href="quadro_profissionais.php?pagina=<?php echo $i; ?>"><?php echo $i +1; ?></a>
                <?php } ?>
                </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </main>
    <?php
  include('layouts/rodape.php');
?>
</body>

</html>