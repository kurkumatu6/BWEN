<?php

use App\models\Auto;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$autos = Auto::find($_GET['id']);

include $_SERVER['DOCUMENT_ROOT'] . "/app/employee/views/employee.booking.auto.view.php";