<?php


use App\models\Auto;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
// УДАЛЕНИЕ ПРОДУКТА
$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;

 $oldImg = Auto::find($id)->image;
 unlink("C:/OSPanel/domains/eK/upload/" . $oldImg);
 $del = Auto::delete($id);
 echo json_encode( $del, JSON_UNESCAPED_UNICODE);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/admin.add.view.php';
?>