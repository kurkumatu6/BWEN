<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<br>
<div class="createForm">
    <form class="createF" action="/app/tables/users/auth_check.php" method="POST">
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
            <button class="button" name="authBtn">Войти</button>
        </div>
    </form>
</div>

<?php
unset($_SESSION["error"]);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php';
?>