<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
    <div class="container">
        <a href="/views/users/auth.view.php"><button class="btnBooking">Забронировать просмотр</button></a>
    </div>
<?php else : ?>
    <div class="container">
        <a href="/app/tables/autos/category.php"><button class="btnBooking">Забронировать просмотр</button></a>
    </div>
<?php endif ?>
<div class="phone-glav"><img src="container-phone" alt=""></div>

<h1 class="foreign">Иномарки</h1>
<!-- карточки с товарами -->
<div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-3 brand-container">
    <? foreach ($brands as $brand) : ?>
        <div class="col">
            <div class="card">
                <img src="/upload/<?= $brand->image ?>" class="card-img-top" alt="<?= $brand->image ?>">
                <div class="card-body">
                    <a class="card-title" href="/app/tables/autos/brand.php?id=<?= $brand->id ?>"><?= $brand->name ?></a>
                </div>
            </div>
        </div>
    <? endforeach ?>
</div>

<h1 class="foreign">Автомобиль</h1>
<div class="pButton">
    <p>Выберите интересующие Вас характеристики:</p>
    <button form="Search" class="btnSearch">Поиск</button>
</div>

<div class="selectForm">
    <p class="selectSearch">Марка</p>
    <p class="selectSearch">Модель</p>
    <p class="selectSearch">Цвет</p>
    <p class="selectSearch">Тип цвета</p>
    <p class="selectSearch">Год выпуска</p>

</div>

<form action="/app/tables/autos/search.select.php" method="GET" id="Search">
    <div class="selectForm">
        <select class="form-select selectSearch brandSelect" id="select" aria-label="Default select example" name="brand">
            <? foreach ($brands as $brand) : ?>
                <option uniqid class="optionw" value="<?= $brand->id ?>" name="brand"><?= $brand->name ?></option>
            <? endforeach ?>
        </select>

        <select class="form-select selectSearch" name="model_id" id="select" aria-label="Default select example">
            <? foreach ($models as $model) : ?>
                <option uniqid class="optionw" value="<?= $model->id ?>"><?= $model->name ?></option>
            <? endforeach ?>
        </select>

        <select class="form-select selectSearch" id="select" aria-label="Default select example" name="color">
            <? foreach ($colors as $color) : ?>
                <option uniqid class="optionw" value="<?= $color->id ?>"><?= $color->name ?></option>
            <? endforeach ?>
        </select>

        <select class="form-select selectSearch" id="select" aria-label="Default select example" name="type_color">
            <? foreach ($types as $type) : ?>
                <option uniqid class="optionw" value="<?= $type->id ?>"><?= $type->type ?></option>
            <? endforeach ?>
        </select>

        <select class="form-select selectSearch" id="select" aria-label="Default select example" name="year">
            <? foreach ($years as $year) : ?>
                <option uniqid class="optionw" value="<?= $year->year ?>"><?= $year->year ?></option>
            <? endforeach ?>
        </select>

    </div>

</form>
<a name="aboutUs"></a>
<h1 class="foreign">О компании</h1>

<div class="company">

    <div>
        <? foreach ($about as $item) : ?>
            <p class="textP"><?= $item->description ?></p>
        <? endforeach ?>
    </div>

        <img class="imgOfis" src="/assets/images/<?= $item->image ?>" alt="<?= $item->image ?>">
        <img class="imgLogoGreen" src="/upload/logoGreen.png" alt="">
</div>

<div class="new">
    <div class="naz">
        <img class="logoBlack" src="/upload/logoBlack.png" alt="">
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-inner">
            <?php foreach ($images as $key => $image) : ?>
                <div class="carousel-item <?= $key == 0 ? 'active' : ' ' ?> ">
                    <img src="/upload/autoAll/<?= $image->name ?>" class="carousel-pic d-block w-100 carImg2" alt="<?= $image->id ?>">
                </div>
            <?php endforeach ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="new">
        <img src="/upload/new.png" alt="" class="imgNew">
    </div>
</div>

<h1 class="foreign">Контакты</h1>
<div class="contacts">
    <div class="cartaD">
        <div class="carta" style="position:relative;overflow:hidden;">
            <a href="https://yandex.ru/maps/56/chelyabinsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Челябинск</a>
            <a href="https://yandex.ru/maps/56/chelyabinsk/geo/prospekt_lenina/8012145/?ll=61.426054%2C55.159584&utm_medium=mapframe&utm_source=maps&z=14" style="color:#eee;font-size:12px;position:absolute;top:14px;">Построение маршрутов на карте Челябинска — Яндекс Карты</a>
            <iframe title="myFrame" src="https://yandex.ru/map-widget/v1/?ll=61.426054%2C55.159584&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgc4MDEyMTQ1Ej_QoNC-0YHRgdC40Y8sINCn0LXQu9GP0LHQuNC90YHQuiwg0L_RgNC-0YHQv9C10LrRgiDQm9C10L3QuNC90LAiCg08tHVCFdGkXEI%2C&z=14" width="1200" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
    </div>
    <div class="info">
        <h2 style="margin-left: 10px;">Офис продаж</h2>
        <?php foreach ($contacts as $contact) : ?>

            <div class="address">
                <img src="/upload/icons/<?= $contact->image ?>" alt="" style="width: 30px; height: 30px;" class="imgIcons">
                <p><?= $contact->content ?></p>
            </div>
        <? endforeach ?>
    </div>
</div>

<script src="/assets/js/fetch.js"></script>
<script module="type" src="/assets/js/select.js"></script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>