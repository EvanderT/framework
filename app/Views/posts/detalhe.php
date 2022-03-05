<div class="container">

    <div class="bg-light  rounded mt-3  mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-2 ms-2">
                <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhe - <?= $dados['post']->titulo ?> </li>
            </ol>
        </nav>
    </div>
    <div class="card my-3">
        <div class="card-header bg-dark text-white">
            <h4><?= $dados['post']->titulo ?></h4>

        </div>
        <div class="card-body">
            <p><?= $dados['post']->texto ?></p>

        </div>
        <div class="card-footer">
            <p>Escrito por: <?= $dados['usuario']->nome ?> em <?= date('d/m/Y H:i', strtotime($dados['post']->criado_em)) ?></p>

            <?php if ($dados['post']->usuario_id == $_SESSION['usuario_id']) : ?>
                <a href="<?= URL . '/posts/editar/' . $dados['post']->id ?>" class="btn btn-info"> Editar Post</a>
            <?php endif; ?>
        </div>

    </div>
</div>