<?php

use App\models\Model;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// УДАЛЕНИЕ ПРОДУКТА
$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;

 $oldImg = Model::find($id)->image;
 unlink("C:/OSPanel/domains/eK/upload/models" . $oldImg);
 $del = Model::deleteModel($id);
 echo json_encode( $del, JSON_UNESCAPED_UNICODE);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/admin.model.view.php';
?>