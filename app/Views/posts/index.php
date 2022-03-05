<div class="container mt-5 mb-5">
    <?= Sessao::mensagem('post') ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between p-4 bg-danger text-white">
            POSTAGENS
            <div class="justify-self-right">
                <a class="btn btn-dark" href="<?= URL ?>/posts/cadastrar">Criar Post</a>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($dados['posts'] as $post) : ?>

                <div class="card my-3">
                    <div class="card-header bg-dark text-white">
                        <h4><?= $post->titulo ?></h4>

                    </div>
                    <div class="card-body">
                        <p><?= $post->texto ?></p>

                    </div>
                    <div class="card-footer">
                        <p>Escrito por: <?= $post->nome ?> em <?= date('d/m/Y H:i', strtotime($post->postDataCadastro)) ?></p>
                        <a href="<?= URL . '/posts/detalhe/' . $post->postId ?>" class="btn btn-danger">Ler mais</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>