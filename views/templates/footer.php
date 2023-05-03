<nav class="footer">
    <a class=" aG" aria-current="page" href="/">Главная</a>
    <a class="" href="/app/tables/autos/category.php">Модели</a>
    <a class="" href="/app/tables/autos/airbrushing.php">Аэрография</a>
    <a class="" href="/#aboutUs">О нас</a>

    <?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>

        <a class="" href="/app/tables/users/auth.php">Войти</a>

        <a class="" href="/app/tables/users/create.php">Зарегистрироваться</a>

    <?php else : ?>
        <a class="" href="/app/tables/users/profile.php"><?= $_SESSION["name"] ?></a>
        <a class="" href="/app/tables/users/logout.php">Выйти</a>
    <?php endif ?>
    <a class=" aImg" aria-current="page" href="/"><img src="/upload/logo.png" alt="" width="200px"></a>
</nav>
</body>

</html>