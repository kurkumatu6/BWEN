<?php

use App\models\Auto;
use App\models\Body;
use App\models\Brand;
use App\models\Classes;
use App\models\Color;
use App\models\Gearbox;
use App\models\Model;
use App\models\Type_color;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$autos = Auto::all();
$brands = Brand::all();
$models = Model::allGroup();

$type_colors = Type_color::all();
$colors = Color::all();
$classes = Classes::all();
$bodies = Body::all();
$gearboxes = Gearbox::all();

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    $_SESSION["error"] = "Вы не администратор";
    header("Location: /app/admin/tables/admin.auth.php");
    unset($_SESSION["auth"]);
    die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/admin.add.view.php';
