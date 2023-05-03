<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="createFormA">
        <form class="createA" action="/app/admin/tables/admin_auth_check.php" method="POST">
            <img src="/upload/icons/icon-avatar.png" alt="">
            <h3>Авторизация</h3>
            <div class="lp">
                <label class="labelM" for="login">Логин:</label>
                <input type="login" class="form-control" name="login" placeholder="Введите логин">
            </div>
            <div class="lp">
                <label for="password" class="form-label labelP">Пароль:</label>
                <input type="password" name="password" placeholder="Введите пароль" class="form-control" id="password">

            </div>

            <?php if (!empty($_SESSION["error"])) : ?>
                <p class="error"><?= $_SESSION["error"] ?></p>
            <?php endif ?>

            <div class="form-group">
                <button class="button" name="AdminAuthBtn">Войти</button>
            </div>
        </form>
    </div>
</body>

</html>