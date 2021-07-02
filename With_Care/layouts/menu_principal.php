<header>
  <nav class="navbar navbar-expand-md fixed-top fs-4" style="background: #F0F7FC;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img class="mb-1 ms-3 me-3" src="imagens/logo.png" alt="" width="75" height="75"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ms-5" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="btn btn-info ms-5" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-info ms-5" aria-current="page" href="sobre.php">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-info ms-5" aria-current="page" href="contato.php">Contato</a>
          </li>
        </ul>
          <?php
          Error_reporting (0);
          if ((!$_SESSION['usuario_logado'])){
          ?>
            <a href="login_front.php"><button class="btn btn-info me-5 btn-lg">Entrar</button></a>

            <a href="cadastro_clientes_front.php"><button class="btn btn-info me-5 btn-lg">Cadastre-se</button></a>
          <?php
          }else{
          ?>
          <div class="dropdown me-5 dropstart">
            <i class="far fa-user-circle fs-1" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
              <ul class="dropdown-menu fs-4 p-4 border rounded-3" style="box-shadow: 0px 0px 1px 1px #D7D7D7" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item text-primary" href="perfil_profissional.php"><i class="fas fa-user-cog"></i> Perfil</a></li>
                <li><a class="dropdown-item text-success  mt-3" href="#"><i class="fas fa-angle-double-up "></i> Dar boost</a></li>
                <li><a class="dropdown-item text-danger mt-3" href="logout.php"><i class="fas fa-life-ring"></i> Ajuda</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger mt-3" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
              </ul>
          </div>
          <?php
          };
          ?>
      </div>
    </div>
  </nav>
</header>