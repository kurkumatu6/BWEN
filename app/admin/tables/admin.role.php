<?php

use App\models\User;
use App\models\Role;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    $_SESSION["error"] = "Вы не администратор";
    header("Location: /app/admin/tables/admin.auth.php");
    unset($_SESSION["auth"]);
    die();
}
$roles = Role::all();
$users = User::all();
include $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/admin.role.view.php";