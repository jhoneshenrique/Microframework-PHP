<div class="col-xl-4 col-md6 mx-auto p-5">
    <div class="card">
         <div class="card-body">
            <h2>Cadastre-se</h2>
            <small>Preencha o formulario abaixo</small>

            <form name="cadastrar" method="POST"caction="">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome: <sup class="text-danger">*</sup></label>
                    <input type="texto" class="form-control" name="nome" id="nome" required> 
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="email" class="form-control" name="nome" id="nome" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control" name="senha" id="senha" required>
                </div>

                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label">Confirme a Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control" name="confirma_senha" id="confirma_senha" required>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
                    </div>
                    <div class="col">
                        <a href="$">Você tem uma conta? Faça o login!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>