<?php

use App\models\Auto;
use App\models\Body;
use App\models\Brand;
use App\models\Classes;
use App\models\Color;
use App\models\Gearbox;
use App\models\Model;
use App\models\Type_color;

unset($_SESSION["error"]);
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    $_SESSION["error"] = "Вы не администратор";
    header("Location: /app/admin/tables/admin.auth.php");
    unset($_SESSION["auth"]);
    die();
}
$autos = Auto::all();
$brands = Brand::all();
$models = Model::allGroup();

$type_colors = Type_color::all();
$colors = Color::all();
$classes = Classes::all();
$bodies = Body::all();
$gearboxes = Gearbox::all();

// ДОБАВЛЕНИЕ КАРТИНКИ
$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];
if (isset($_POST["InsertBtn"])) {
    if (isset($_FILES["image"])) {
        $name = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $size = $_FILES["image"]["size"];

        $path_parts = pathinfo($name);
        $ext = $path_parts["extension"];
        $mim = mime_content_type($tmpName);

        if (in_array($ext, $extensions) && in_array($mim, $types)) {
            $newName = time() . "_" . $name;
            if ($error == 0) {
                if ($size > 3145728) {
                    $_SESSION["error"] = "Файл слишком большой";
                } else {
                    if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/upload/autoAll/". $newName)) {

                        $_SESSION["error"] = "Не удалось переместить файл";
                    };
                }
            } else {
                $_SESSION["error"] = "есть ошибка";
            };
        } else {
            $_SESSION["error"] = "Расширение файла должно быть: " . implode(", ", $extensions);
        };
        

        if (!isset($_SESSION["error"])) {
            Auto::addAuto($_POST, $newName);
            header("Location: /app/admin/tables/admin.autos.php");
        }
    };
    
}
unset($_SESSION["error"]);

