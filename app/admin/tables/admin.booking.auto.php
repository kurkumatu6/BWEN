<?php

use App\models\Auto;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$autos = Auto::find($_GET['id']);
// var_dump($autos); 
include $_SERVER['DOCUMENT_ROOT'] . "/app/admin/views/admin.booking.auto.view.php";