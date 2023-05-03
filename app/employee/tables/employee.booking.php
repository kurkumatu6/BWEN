<?php

use App\models\Booking;
use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["employee"]) || !$_SESSION["employee"]){
    $_SESSION["error"] = "Вы не сотрудник";
    header("Location: /app/admin/tables/admin.auth.php");
    unset($_SESSION["auth"]);
    die();
}

$users = User::find($_SESSION['id']);
// var_dump($users);
$bookings = Booking::all2();

include $_SERVER['DOCUMENT_ROOT'] . '/app/employee/views/employee.booking.view.php';
