<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';


$autos = $_SESSION['search_auto']?>

<div>
        
            <div class="card mb-3">
                <? foreach ($autos as $auto) : ?>
                    <div class="category">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="/upload/autoAll/<?= $auto->imageAuto ?>" class="img-fluid rounded-start img1" alt="<?= $auto->imageAuto ?>">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $auto->model ?></h5>
                                    <p class="text"><?= $auto->description ?></p>
                                    <div class="row1">
                                        <p class="card-text"><b><?= $auto->price ?>₽</b></p>
                                        <a href="/app/tables/autos/auto.php?id=<?=$auto->id?>"><button class="btnSearch">Подробнее</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach ?>
                <hr>
            </div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>