<?php

use App\models\Booking;
use App\models\User;

session_start();

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]) || !$_SESSION["auth"]){
    header("Location: /app/tables/users/create.php");
    die();
}

$bookings = Booking::findUser($_SESSION["id"]);


$user = User::find($_SESSION["id"]);
$_SESSION["name"]= $user->name;

include $_SERVER["DOCUMENT_ROOT"] . "/views/users/profile.view.php";
?>