<?php

use App\models\Auto;
use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$autos = Auto::find($_GET["id"]);
$user = User::findEmployee();


// var_dump($user);
// var_dump($_SESSION["employee"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/autos/booking.view.php";