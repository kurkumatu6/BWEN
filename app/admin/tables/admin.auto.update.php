<?php

use App\models\Auto;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// ИЗМЕНЕНИЕ КАРТИНКИ

$oldImg = Auto::find($_POST["id"]);
$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];

if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
    $name = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];
    $size = $_FILES["image"]["size"];

    $path_parts = pathinfo($name);
    $ext = $path_parts["extension"];
    $mim = mime_content_type($tmpName);
    // var_dump($path_parts);

    if (in_array($ext, $extensions) && in_array($mim, $types)) {

        $newName = $name;
        if ($error == 0) {
            if ($size > 3145728) {
                $_SESSION["error"] = "Файл слишком большой";
            } else {
                if (!move_uploaded_file($tmpName, "D:/OSPanel/domains/eK/upload/" . $newName)) {
                    $_SESSION["error"] = "Не удалось переместить файл";
                } else {
                    unlink("D:/OSPanel/domains/eK/upload/" . $oldImg);
                }
            }
        } else {
            $_SESSION["error"] = "есть ошибка";
        };
    } else {
        $_SESSION["error"] = "Расширение файла должно быть: " . implode(", ", $extensions);
    };
};

if (isset($_POST["saveBtn"])) {
    if ($_POST["id"] != null) {
        if (empty($_FILES["image"]["name"])) {
            Auto::update($_POST, $oldImg);
            header("Location: /app/admin/tables/admin.autos.php");
        } else {
            Auto::update($_POST, $newName);
            header("Location: /app/admin/tables/admin.autos.php");
        }
    }
}

