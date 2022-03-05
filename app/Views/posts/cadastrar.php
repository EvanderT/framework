<div class="row p-4 d-flex justify-content-center bg-dark">
    <div class="col-4">
        <div class="bg-white  rounded  mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-2 ms-2">
                    <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                </ol>
            </nav>
        </div>


        <div class="card">

            <div class="card-body">
                <h1 class="text-center">Adicionar Post</h1>
                <hr>
                <?= Sessao::mensagem('usuario') ?>

                <form method="POST" action="<?= URL ?>/posts/cadastrar">
                    <div class="p-4">
                        <div class="form-group">
                            <label>Título: <span class="text-danger">*</span></label>
                            <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?= !empty($dados['titulo_erro']) ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= $dados['titulo_erro'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Texto: <span class="text-danger">*</span></label>
                            <textarea name="texto" id="texto" class="form-control <?= !empty($dados['texto_erro']) ? 'is-invalid' : '' ?>" rows="5">
                            <?= $dados['texto'] ?></textarea>

                            <div class="invalid-feedback">
                                <?= $dados['texto_erro'] ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-danger mt-3 w-100 fw-bold">Cadastrar</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>