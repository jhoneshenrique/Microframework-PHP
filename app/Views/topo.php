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
      <form class="d-flex">
        <!--Link para a View cadastrar --> 
        <a class="btn btn-info" href="<?=URL?>/usuarios/cadastrar" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
        
      </form>
    </div>
  </div>
</nav>
</header>