<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
session_start(); ?>

<div class="createForm">
    <form class="createF" action="/app/tables/users/insert.php" method="POST">
        <img src="/upload/icons/icon-avatar.png" alt="">
        <h3>Регистрация</h3>
        <div class="l">
            <label for="name">Введите имя:</label>
            <input type="text" class="form-control" name="name" value="<?= $_SESSION["data"]["name"] ?? "" ?>">
        </div>

        <?php if (!empty($_SESSION["error"]["name"])) : ?>
            <p class="error"><?= $_SESSION["error"]["name"] ?></p>
        <?php endif ?>

        <div class="l">
            <label for="surname">Введите фамилию:</label>
            <input type="text" class="form-control" name="surname" value="<?= $_SESSION["data"]["surname"] ?? "" ?>">
        </div>

        <?php if (!empty($_SESSION["error"]["surname"])) : ?>
            <p class="error"><?= $_SESSION["error"]["surname"] ?></p>
        <?php endif ?>

        <div class="l">
            <label for="email" >Введите почту:</label>
            <input type="email" class="form-control" name="email" value="<?= $_SESSION["data"]["email"] ?? "" ?>">
        </div>
        <?php if (!empty($_SESSION["error"]["email"])) : ?>
            <p class="error"><?= $_SESSION["error"]["email"] ?></p>
        <?php endif ?>


        <div class="l">
            <label for="login">Логин:</label>
            <input type="login" class="form-control" name="login" value="<?= $_SESSION["data"]["login"] ?? "" ?>">
            <?php if (!empty($_SESSION["error"]["login"])) : ?>
                <p class="error"><?= $_SESSION["error"]["login"] ?></p>
            <?php endif ?>
        </div>
        <div class="l">
            <label for="password" class="form-label">Пароль:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="l">
            <label for="password_confirmation" class="form-label">Повтор пароля:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        <div class="l">
            <label style="margin-left: 20px;" for="agreement" class="form-label">Согласие на обработку данных:</label>
            <input type="checkbox" checked name="agreement" id="agreement">
        </div>
        <?php if (!empty($_SESSION["error"]["glob"])) : ?>
            <p class="error"><?= $_SESSION["error"]["glob"] ?></p>
        <?php endif ?>
        <div class="form-group">
            <button class="button" name="btn">Зарегистрироваться</button>
        </div>
    </form>
</div>
<script>
    document.querySelector('#agreement').addEventListener('change', (e) => {
        document.querySelector('[name=btn]').disabled = !e.target.checked
    })
</script>
<?php
unset($_SESSION["error"]);
unset($_SESSION["data"]);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php';
?>