<?php

use App\models\Model;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$models = Model::findAutoAllByModels($_GET['id']);
$autos = Model::find($_GET['id']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/autos/autosByModels.view.php";