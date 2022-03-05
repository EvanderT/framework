<?php
session_start();

include './../app/configuracao.php';
include './../app/autoLoad.php';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?> </title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">-->
    <link type="text/css" rel="stylesheet" href="<?= URL ?>/public/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?= URL ?>/public/css/all.css">
    <link type="text/css" rel="stylesheet" href="<?= URL ?>/public/css/estilo.css">
</head>

<body>


    <?php

    include '../app/Views/shared/header.php';

    $rotas = new Rota();

    include '../app/Views/shared/footer.php';

    ?>


    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>-->
    <script src="<?= URL ?>/public/js/jquery-3.4.1.min.js"></script>
    <script src="<?= URL ?>/public/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>/public/js/main.js"></script>
</body>

</html>