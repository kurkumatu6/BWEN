<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';

use App\models\Model; ?>

<div class="category">
    <div class="card mb-3">
        <? foreach ($modelsByBrand as $model) : ?>
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="/upload/models/<?= $model->image ?>" class="img-fluid rounded-start img1" alt="<?= $model->image ?>">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title"><?= $model->name ?></h5>
                        <p class="text"><?= $model->description ?></p>
                        <div class="row1">
                            <p class="card-text"><b>от <?= (Model::MinPriceByModel($model->id))->minPrice ?>₽</b></p>
                            <a href="/app/tables/autos/autosByModels.php?id=<?= $model->id ?>"><button class="btnSearch">Подробнее</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach ?>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>