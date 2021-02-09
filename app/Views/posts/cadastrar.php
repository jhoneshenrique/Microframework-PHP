<div class="col-xl-8  mx-auto p-5">
   
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URL?>/posts">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
    </ol>
    </nav>
    


    <div class="card">
        <div class="card-header bg-secondary text-white">
              <h2>Cadastrar Post</h2>
        </div>
         <div class="card-body">
            <!-- Informar o destino no Action-->
            <form name="login" method="POST" action="<?= URL?>/posts/cadastrar">
                

                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo: <sup class="text-danger">*</sup></label>
                    <input type="titulo" class="form-control <?=$dados['titulo_erro']? 'is-invalid' : '' ?>" name="titulo" id="titulo" value="<?=$dados['titulo']?>">
                    <div class="invalid-feedback">
                        <?=$dados['titulo_erro']?>
                    </div> 
                </div>

                <div class="mb-3">
                    <label for="texto" class="form-label">Texto: <sup class="text-danger">*</sup></label>
                    <textarea class="form-control <?=$dados['texto_erro']? 'is-invalid' : '' ?>" name="texto" id="texto"><?= $dados['texto']?></textarea>
                    <div class="invalid-feedback">
                        <?=$dados['texto_erro']?>
                    </div>
                </div>

                        <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
                 
            </form>
        </div>
    </div>
</div>