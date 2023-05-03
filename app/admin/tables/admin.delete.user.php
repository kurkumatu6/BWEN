<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
// УДАЛЕНИЕ ПРОДУКТА

$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;

 $oldImg = User::find($id);

 $del = User::delete($id);
 echo json_encode( $del, JSON_UNESCAPED_UNICODE);
}

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/admin.role.view.php';
?>