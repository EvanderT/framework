<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="<?= URL ?>">Curso PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="<?= URL ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="<?= URL ?>/Paginas/Sobre">Sobre Nós</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['usuario_nome'])) : ?>

                <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item  me-2">
                        <a class="nav-link active fw-bold" href="<?= URL . '/usuarios/perfil' ?>"><i class="fas fa-user-circle"></i> <?= $_SESSION['usuario_nome'] ?></a>
                    </li>
                    <li class="nav-item btn btn-outline-dark btn-sm">
                        <a class="nav-link fw-bold" href="<?= URL . '/usuarios/sair' ?>">Sair</a>
                    </li>
                </ul>

            <?php else : ?>
                <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item btn btn-outline-dark btn-sm me-2">
                        <a class="nav-link fw-bold" href="<?= URL . '/usuarios/login' ?>">Login</a>
                    </li>
                    <li class="nav-item btn btn-outline-dark btn-sm">
                        <a class="nav-link fw-bold" href="<?= URL . '/usuarios/cadastrar' ?>">Cadastro</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>