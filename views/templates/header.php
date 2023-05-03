<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="Cache-Control" content="public, no-cache"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BWEN</title>
    <link rel="stylesheet" href="/assets/css/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="/assets/css/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/style-phone.css">
</head>

<body>
    <nav class="header">
        <a class="aLogo" aria-current="page" href="/"><img src="/upload/logo.png" alt="" width="200px"></a>

        <a class=" aG" aria-current="page" href="/">Главная</a>
        <a class="" href="/app/tables/autos/category.php">Модели</a>
        <a class="" href="/app/tables/autos/airbrushing.php">Аэрография</a>
        <a class="" href="/#aboutUs">О нас</a>


        <?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>

            <a class="" href="/app/tables/users/auth.php">Войти</a>

            <a class="" href="/app/tables/users/create.php">Зарегистрироваться</a>

        <?php else : ?>
            <a class="" href="/app/tables/users/profile.php"><?= $_SESSION["name"] ?></a>
            <a class="" href="/app/tables/users/logout.php">Выйти</a>
        <?php endif ?>


    </nav>