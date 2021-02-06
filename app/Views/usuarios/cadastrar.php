<div class="col-xl-4 col-md6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
              <h2>Cadastre-se</h2>
        </div>
         <div class="card-body">
            
            <small>Preencha o formulario abaixo</small>

            <!-- Informar o destino no Action-->
            <form name="cadastrar" method="POST" action="<?= URL?>/usuarios/cadastrar">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome: <sup class="text-danger">*</sup></label>
                                                    <!--Condicional se existe erro. Caso exista, chama classe de erro do Bootstrap -->
                    <input type="texto" class="form-control <?=$dados['nome_erro']? 'is-invalid' : '' ?>" name="nome" id="nome" value="<?=$dados['nome']?>">
                    <!-- Div que e carregada quando ha o erro. So aparece se is-invalid e ativado-->
                    <div class="invalid-feedback">
                        <?=$dados['nome_erro']?>
                    </div> 
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control <?=$dados['email_erro']? 'is-invalid' : '' ?>" name="email" id="email" value="<?=$dados['email']?>">
                    <div class="invalid-feedback">
                        <?=$dados['email_erro']?>
                    </div> 
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control <?=$dados['senha_erro']? 'is-invalid' : '' ?>" name="senha" id="senha" value="<?=$dados['senha']?>">
                    <div class="invalid-feedback">
                        <?=$dados['senha_erro']?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label">Confirme a Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control <?=$dados['confirma_senha_erro']? 'is-invalid' : '' ?>" name="confirma_senha" id="confirma_senha" value="<?=$dados['confirma_senha']?>">
                    <div class="invalid-feedback">
                        <?=$dados['confirma_senha_erro']?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="#">Você tem uma conta? Faça o login!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>