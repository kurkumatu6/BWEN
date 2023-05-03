<?php

use App\models\Auto;
use App\models\Model;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//если выбрано все, то запускаем метод получить все
if (isset($_GET["brands"])) {
    //декодируем джейсон данные (категории)
    $brands = json_decode($_GET["brands"]);
    if (empty($brands) || $brands == "all") {
        $autos = Auto::all();
    } else {
        $autos = Auto::autosByManyBrands($brands);
    }
    echo json_encode($autos, JSON_UNESCAPED_UNICODE);
}       