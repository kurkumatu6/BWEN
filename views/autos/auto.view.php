<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
session_start();
?>

<div class="container-auto">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($images as $key => $image) : ?>
                <div class="carousel-item  <?= $key == 0 ? 'active' : ' ' ?>">
                    <img src="/upload/autoAll/<?= $image->name ?>" class="carImg" alt="<?= $image->name ?>">
                </div>
            <?php endforeach ?>
            <button class="carousel-control-prev prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    </div>
    <div class="right">
        <div>
            <h3>Модель: <?= $autos->model ?></h3>
            <small class="autoBody"><b><?= $autos->body ?></b></small>
            <p><?= $autos->description ?></p>
        </div>
        <div>
            <p>Предоставляемые характеристики:</p>
            <div class="characteristics">
                <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                <p>Мощность: от <?= $autos->power ?> л.с</p>
            </div>
            <div class="characteristics">
                <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                <p>Объем бака: <?= $autos->volume ?> литров</p>
            </div>
            <div class="characteristics">
                <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                <p>Скорость: до <?= $autos->speed ?> км/ч</p>
            </div>
            <div class="characteristics">
                <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                <p>Масса: <?= $autos->weight ?> кг</p>
            </div>
            <div class="characteristics">
                <img class="arrow" src="/upload/icons/Arrow.png" alt="">
                <p>Расход: <?= $autos->consumption ?> л на 100 км</p>
            </div>
            <div class="characteristics">
                <img class="arrow" src="/upload/icons/Arrow-green.png" alt="">
                <p>Класс: <?= $autos->class ?></p>
            </div>
        </div>
    </div>
</div>
<h4>Изумительный дизайн модели, которого никого не оставит без внимания</h4>
<p class="pAuto">Мужественная элегантность и вдохновляющий простор в идеальной гармонии: новый язык дизайна чувственной лаконичности для нового <?= $autos->model ?>. Увеличенная длина автомобиля, удлиненная колесная база, более широкие задние двери и третье боковое стекло в задней стойке кузова создают основу для максимального комфорта салона.</p>


<?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
    <a href="/app/tables/users/auth.php"><button class="btnSearch2">Забронировать просмотр</button></a>
<?php else : ?>
    <a href="/app/tables/autos/booking.php?id=<?= $autos->id ?>"><button class="btnSearch2">Забронировать просмотр</button></a>
<?php endif ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>