<?php

use App\models\User;
use App\models\Booking;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// var_dump($_POST);
// var_dump($_SESSION['id']);

$user = User::findEmployee();
if(isset($_POST["BookingBtn"])){
    Booking::addBooking($_POST, $_POST["auto_id"], $_SESSION['id']);
    header("Location: /");
}

// require_once $_SERVER["DOCUMENT_ROOT"] . "/views/autos/booking.view.php";