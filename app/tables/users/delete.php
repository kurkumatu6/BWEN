<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["delete"])){
    $userObj = new User();
    $userObj->delete($_POST["id"]);
}

include $_SERVER["DOCUMENT_ROOT"] . "/views/products/index.view.php";
header("Location: /");