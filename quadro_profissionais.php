<?php
    session_start();
    include('conexao.php');


    //Define o numero de perfis de profissionais iram aparecer por pagina.
    $perfis_por_pagina = 4;

    //Pegar pagina atual 
    $pagina = intval($_GET['pagina']);

    if ($pagina == 0) {
        header('location: http://localhost/TCC/With_Care/quadro_profissionais.php?pagina=1');
    }
    $inicio=$pagina*$itens_por_pagina;
    //Pegar usuarios do tipo "P"(profissional) do banco de dados 
    $sql_code = "SELECT A.nome, A.sobrenome, A.descricao, A.tp_usuario, B.cep FROM usuario as A 
                 INNER JOIN endereco as B on A.id_usuario = B.id_usuario 
                 WHERE A.tp_usuario = 'P' LIMIT $inicio, $perfis_por_pagina;";

    $execute = mysqli_query($conexao,$sql_code);

    $usuario = $execute->fetch_assoc();
    $num = $execute->num_rows;

    //Pega a quantidade total de usuarios no banco de dados
    $num_total = "select count(*) as total from usuario where tp_usuario = 'P'";
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
    <title>Profissionais Proximos</title>

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

    .collapse {
        &:not(.show) {
            display: none;
        }
    }

    .collapsing {
        height: 0;
        overflow: hidden;
        transition: .35s;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/features.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cheatsheet/">

    <script src="https://kit.fontawesome.com/d166a195c7.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
  include('layouts/menu_principal.php');
  
?>
    <main>
        <div class="container px-4 py-5" id="featured-3" style="margin-left: 5%;">

            <h2 class="pb-2 border-bottom mt-5">Profissionais próximos de você</h2><h1><?php echo $pagina; ?></h1>

            <p>
                <a class="btn" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-filter"></i>
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <h3>Cuidador para...</h3>
                    <p>Bebês</p>
                    <p>Crianças</p>
                    <p>Adolescentes</p>
                    <p>Idosos</p>
                    <p>Especiais</p>

                </div>
            </div>
            <div class="row g-5 py-5 row-cols-1 row-cols-lg-3 ">

                <?php
            if ($num > 0) {
                do{
            ?>

                <div class="feature col border border-1 text-center rounded-5">
                    <a href="">

                        <div class="feature-icon bg-gradient border border-2 mt-5 ">
                        </div>
                        <h2><?= $usuario['nome'], $espaco=" ", $usuario['sobrenome']?></h2>

                        <p><?= $usuario['descricao']?></p>

                        <p>Entre em Contato</p>
                    </a>
                </div>
                <?php }while($usuario = $execute->fetch_assoc()); }?>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                  for ($i=1; $i < $num_paginas ; $i++) { 
                    $estilo="";
                    if ($pagina == $i) {
                      $estilo = "class=\"active\"";
                ?>
                    <li <?php echo $estilo; ?>>
                        <a class="page-link"
                            href="quadro_profissionais.php?pagina=<?php echo $i;?>"><?php echo ($i); ?></a>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="" aria-label="Next">
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


<script src="js/bootstrap.bundle.min.js"></script>

<script src="js/cheatsheet.js"></script>

</html>