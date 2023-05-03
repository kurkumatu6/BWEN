<?php

use App\models\Booking;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    $_SESSION["error"] = "Вы не администратор";
    header("Location: /app/admin/tables/admin.auth.php");
    unset($_SESSION["auth"]);
    die();
}

$bookings = Booking::all2();

include $_SERVER['DOCUMENT_ROOT'] . "/app/admin/views/admin.booking.view.php";