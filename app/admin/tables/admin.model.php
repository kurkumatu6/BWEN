<?php
use App\models\Brand;
use App\models\Model;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    $_SESSION["error"] = "Вы не администратор";
    header("Location: /app/admin/tables/admin.auth.php");
    unset($_SESSION["auth"]);
    die();
}

$models = Model::allGroup();
$brands = Brand::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/admin.model.view.php';
