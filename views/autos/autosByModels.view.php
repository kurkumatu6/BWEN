<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="cont">
    <? foreach ($models as $model) : ?>
        <div class="container-autos">
            <img src="/upload/autoAll/<?= $model->imageAuto ?>" class="autoImg" alt="<?= $model->image ?>">
            <div class="card-body">
                <p style="margin-bottom: -2px; color: #3c6d41;"><?= $model->year ?> год</p>
                <p class="price"><?= $model->price ?>₽</p>
                <div class="rj">
                    <small class="text-muted"><?= $model->color ?></small>
                    <a href="/app/tables/autos/auto.php?id=<?= $model->id ?>"><button class="btnSearch3">Подробнее</button></a>
                </div>
            </div>
        </div>
    <? endforeach ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>