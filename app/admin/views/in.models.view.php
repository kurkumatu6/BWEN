<div class="inModels">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>
    <div class="">
        <?php foreach ($autoByModels as $auto) : ?>
            <div class="inModelsAuto">
                <div class="model">
                    <img src="/upload/autoAll/<?= $auto->imageAuto ?>" alt="<?= $auto->imageAuto ?>" class="auto">
                    <h4>Модель: <?= $auto->model ?></h4>
                </div>
                <div class="price">
                    <h2><?= $auto->price ?>₽</h2>
                    <p>Кол-во: <?= $auto->count ?></p>
                </div>
                <div class="xarak">
                    <h5>Предоставляемые характеристики:</h5>
                    <div class="characteristics">
                        <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                        <p>Мощность: от <?= $auto->power ?> л.с</p>
                    </div>

                    <div class="characteristics">
                        <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                        <p>Объем бака: <?= $auto->volume ?> литров</p>
                    </div>
                    <div class="characteristics">
                        <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                        <p>Скорость: до <?= $auto->speed ?> км/ч</p>
                    </div>
                    <div class="characteristics">
                        <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                        <p>Масса: <?= $auto->weight ?> кг</p>
                    </div>
                    <div class="characteristics">
                        <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                        <p>Расход: <?= $auto->consumption ?> л на 100 км</p>
                    </div>
                </div>
            </div>
        <hr><?php endforeach ?>
    </div>
</div>
<button class="button" style="width: 100px;" for="image"><a href="/app/admin/tables/admin.model.php" style="color: black; text-decoration: none;">Назад</a></button>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>