<?php

use App\models\Model;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
// УДАЛЕНИЕ КАТЕГОРИИ
$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;
 $del = Model::deleteModel($id);
 echo json_encode( $del, JSON_UNESCAPED_UNICODE);
}

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/admin.model.view.php';
