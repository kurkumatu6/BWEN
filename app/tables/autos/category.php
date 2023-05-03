<?php

use App\models\Brand;
use App\models\Model;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$models = Model::all();
$brands = Brand::all();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/category.view.php";
