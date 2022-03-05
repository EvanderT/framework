<div class="row p-4 d-flex justify-content-center bg-dark">
    <div class="col-4">
        <div class="card">

            <div class="card-body">
                <h1 class="text-center">Cadastre-se</h1>
                <hr>
                <?= Sessao::mensagem('usuario') ?>

                <form method="POST" action="<?= URL ?>/usuarios/cadastrar">
                    <div class="p-4">
                        <div class="form-group">
                            <label>Nome: <span class="text-danger">*</span></label>
                            <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?= !empty($dados['erro_nome']) ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= $dados['erro_nome'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email: <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= !empty($dados['erro_email']) ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= $dados['erro_email'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Senha <span class="text-danger">*</span></label>
                            <input type="password" name="senha" id="senha" class="form-control <?= !empty($dados['erro_senha']) ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= $dados['erro_senha'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirmar Senha <span class="text-danger">*</span></label>
                            <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control <?= !empty($dados['erro_confirmar_senha']) ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= $dados['erro_confirmar_senha'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger mt-3 w-100 fw-bold">Cadastrar</button>

                        </div>
                        <div class=" p-3">
                            <a href="<?= URL . '/usuarios/login' ?>" class="mt-4"> Você tem uma conta? Faça Login</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>