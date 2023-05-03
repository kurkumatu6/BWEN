<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<h1 class="foreign">Аэрография</h1>

<div class="containerAir">
    <div class="text1">
        <p>Проекция собственного дизайна под руководством специалистов!</p>
        <img class="imgAir1" src="/upload/air1.png" alt="">
        <? foreach ($air as $item) : ?>
            <h4 class="h4Air"><?= $item->name ?></h4>
            <p class="pAir"><?= $item->description ?></p>
        <? endforeach ?>
    </div>

    <div class="text2">
        <img class="imgAir2" src="/upload/air2.png" alt="">
        <p>Бесплатная фотосъемка</p>
        <img class="imgAir3" src="/upload/air3.jpg" alt="" s>
    </div>

</div>

<h3 class="h3AirOb">Обратная связь:</h3>
<? foreach ($contactAir as $contact) : ?>
    <div class="airZ">
        <img src="/upload/icons/<?= $contact->image ?>" alt="" style="width: 20px; height: 20px;">
        <p><?= $contact->content ?></p>
    </div>
<? endforeach ?>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>