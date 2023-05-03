<?php

use App\models\Model;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (isset($_GET["serv_id"])) {
    $serv_id = json_decode($_GET["serv_id"]);
    $res = Model::getSpecsByServiceId($serv_id);
}

echo json_encode($res, JSON_UNESCAPED_UNICODE);
