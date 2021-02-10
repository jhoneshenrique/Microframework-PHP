<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>

    <div class="card text-center">
        <h5 class="card-header"><?= $dados['post']->titulo ?></h5>
        <div class="card-body">
       
            <p class="card-text"><?= $dados['post']->texto ?></p>
           
        </div>
        <div class="card-footer text-muted">
            Escrito por: <?= $dados['usuario']->nome ?> em <?= Checa::dataBr($dados['post']->criado_em) ?>
        </div>
        
        <?php if ($dados['post']->usuario_id == $_SESSION['usuario_id']) { ?>
            <a href="<?=URL.'/posts/editar/'.$dados['post']->id ?>" class="btn btn-sm btn-primary">Editar</a>
        <?php } ?>
    </div>
</div>