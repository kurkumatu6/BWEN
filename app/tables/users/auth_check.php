<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

// при нажатии
if (isset($_POST['authBtn'])) {
    // проверяем на вроде значения
    $user = User::getUser($_POST['login'], $_POST['password']);
    // если пользователя не находит
    if ($user == null) {
        // формируем ошибку
        $_SESSION['error'] = "Пользователь не найден";
        // присваиваем сессии false и остаемся на той же форме
        $_SESSION['auth'] = false;
        header("Location: /app/tables/users/auth.php");
        die(); //сбрасывание кода
    } else {
        // если находим, перебрасываем на профиль
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user->id;
        header("Location: /app/tables/users/profile.php");
    }
}
