<div class="admin-autos-container">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/app/employee/views/templates/header.employee.php'; ?>

<div class="inModelsAuto">
    <div class="model">
        <img src="/upload/autoAll/<?= $autos->imageAuto?>" alt="<?= $autos->model?>" class="auto">
        <h4>Модель: <?= $autos->model?></h4>
        <p style="color: #3c6d41;"><?= $autos->body?></p>
    </div>
    <div class="price">
        <h4><?= $autos->price?> ₽</h4>
        <p>Кол-во: <?= $autos->count?></p>
        <p>Год: <?= $autos->year?></p>
        <p>Цвет: <?= $autos->color?></p>
    </div>
    <div class="xarak">
        <h5>Предоставляемые характеристики:</h5>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Мощность: от <?= $autos->power?> л.с</p>
        </div>

        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Объем бака: <?= $autos->volume?> литров</p>
        </div>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Скорость: до <?= $autos->speed?> км/ч</p>
        </div>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Масса: <?= $autos->weight?> кг</p>
        </div>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Расход: <?= $autos->consumption?> л на 100 км</p>
        </div>
    </div>
  </div><hr>

</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>