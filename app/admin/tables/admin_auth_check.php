<?php
use App\models\User;
// ПРОВЕРКА
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

if (isset($_POST["AdminAuthBtn"])) {
    $user = User::getUser($_POST["login"], $_POST["password"]);

    if ($user == null) {
        $_SESSION["admin"] = false;
        $_SESSION["error"] = "Пользователь не найден";
        header("Location: /app/admin/tables/admin.auth.php");
        die();
    } else {
        if ($user->role_id == 2) {
            $_SESSION["admin"] = true;
            $_SESSION["id"] = $user->id;
            header("Location: /app/admin/tables/admin.model.php");
        } elseif ($user->role_id == 3){
            $_SESSION["employee"] = true;
            $_SESSION["id"] = $user->id;
            header("Location: /app/employee/tables/employee.booking.php");
        }
        else {
            $_SESSION["admin"] = false;
            $_SESSION["error"] = "Вы не администратор";
            header("Location: /app/admin/tables/admin.auth.php");
        }
    }
}
