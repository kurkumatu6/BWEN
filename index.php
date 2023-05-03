<?php

use App\models\Brand;
use App\models\Auto;
use App\models\Color;
use App\models\Element;
use App\models\Model;
use App\models\Type_color;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$brands = Brand::all();
$models = Model::allGroup();
$colors = Color::all();
$types = Type_color::all();
$years = Auto::Year();

$autos = Auto::all();
$images = Auto::last3Created();

$about = Element::getElement('О компании');

$contacts = Element::getElement('контакты');



include $_SERVER["DOCUMENT_ROOT"] . "/views/index.view.php";

?>