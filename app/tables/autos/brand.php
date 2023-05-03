<?php
use App\models\Model;
use App\models\Brand;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$modelsByBrand = Model::findModelByBrand2($_GET["id"]);




$brands = Brand::all();
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/brand.view.php";