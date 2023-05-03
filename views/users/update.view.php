<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<br>
<form class="createF" action="/app/tables/users/update_user.php" method="POST">

<label for="name">
        Измените Имя:
        <input type="text" class="form-control" name="name">
    </label>
    <label for="surname">
        Измените Фамилию:
        <input type="text" class="form-control" name="surname">
    </label>
    <label for="email">
        Измените почту:
        <input type="email" class="form-control" name="email">
    </label>
    <label for="login">
        Измените Логин:
        <input type="login" class="form-control" name="login">
    </label>

    <div class="form-group">
        <button class="button" name="saveBtn">Сохранить</button>
    </div>
</form>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>