<div class="col-xl-4 col-md6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
              <h2>Login</h2>
        </div>
         <div class="card-body">
            
            <small class="text-muted">Informe seus dados para Login</small>

            <!-- Informar o destino no Action-->
            <form name="login" method="POST" action="<?= URL?>/usuarios/login">
                

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


                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?=URL?>/usuarios/cadastrar">Não tem uma conta? Cadastre-se!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>