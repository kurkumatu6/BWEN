<?php

use App\models\Role;
use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$roles = Role::all();
$users = User::find($_GET["id"]);
// if(isset($_POST["id"])){
//     User::update($_POST);
// }

require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/role.update.view.php";