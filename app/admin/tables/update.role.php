<?php

use App\models\Role;
use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$roles = Role::all();
// var_dump($_POST);
if(isset($_POST["saveBtn"])){
    User::update($_POST);
}

require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/admin.role.view.php";