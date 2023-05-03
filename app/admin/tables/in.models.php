<?php

use App\models\Model;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
// ПРОСМОТР ПО КАТЕГОРИЯМ
$autoByModels = Model::findAutoAllByModels($_GET["id"]);

require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/in.models.view.php";
