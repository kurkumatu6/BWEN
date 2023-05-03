<?php
use App\models\Auto;
use App\models\Model;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// ПОИСК

//если выбрано все, то запускаем метод получить все
if (isset($_GET["category"])) {
    //декодируем джейсон данные (категории)
    $brands = json_decode($_GET["category"]);
    if (empty($brands) || $brands == "all") {
        $models = Model::findAutoAllByModels($_GET['id']);
    } else {
        $autos = Auto::autosByManyBrands($brands);
    }
    echo json_encode($autos, JSON_UNESCAPED_UNICODE);
}