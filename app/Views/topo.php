<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=URL?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL?>/paginas/sobre">Sobre</a>
        </li>
       
      </ul>

      <!-- Checa se o usuario esta logado e caso esteja, printa o nome dele -->
      <?php if(isset($_SESSION['usuario_id'])) { ?>
        <span class="navbar-text">
             <p class="text-secondary">Olá, <?= $_SESSION['usuario_nome']; ?></p>    
             <a class="btn btn-sm btn-danger" href="<?=URL?>/usuarios/sair">Sair </a>
        </span>
      <?php } else{  ?>
                  <span class="navbar-text">
                  <!--Link para a View cadastrar --> 
                  <a class="btn btn-info" href="<?=URL?>/usuarios/cadastrar" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
                  <!--Link para a View login --> 
                  <a class="btn btn-info" href="<?=URL?>/usuarios/login" data-tooltip="tooltip" title="login">Login</a>    
                </span>
      <?php } ?>

      
    </div>
  </div>
</nav>
</header>

