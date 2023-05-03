<?php
use App\models\Model;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// ПОИСК

//если выбрано все, то запускаем метод получить все
if (isset($_GET["category"])) {
    //декодируем джейсон данные (категории)
    $brands = json_decode($_GET["category"]);
    if (empty($brands) || $brands == "all") {
        $models = Model::allGroup();
    } else {
        $models = Model::modelsByManyBrands($brands);
    }
    echo json_encode($models, JSON_UNESCAPED_UNICODE);
}
