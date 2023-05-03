<?php
use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// ПОИСК

//если выбрано все, то запускаем метод получить все
if (isset($_GET["category"])) {
    //декодируем джейсон данные (категории)
    $roles = json_decode($_GET["category"]);
    if (empty($roles) || $roles == "all") {
        $user = User::all();
    } else {
        $user = User::userByManyBrands($roles);
    }
    echo json_encode($user, JSON_UNESCAPED_UNICODE);
}
