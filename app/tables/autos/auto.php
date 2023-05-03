<?php

use App\models\Brand;
use App\models\Image;
use App\models\Auto;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$images = Image::all($_GET['id']);

$autos = Auto::find($_GET['id']);
$brands = Brand::all();


require_once $_SERVER["DOCUMENT_ROOT"] . "/views/autos/auto.view.php";