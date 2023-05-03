<?php
if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /app/tables/users/create.php");
    die();
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<br>
<div class="profile">
    <div class="createP">
        <p><?= $user->role ?></p>
        <div class="bu">
        <img class="imgProfile" src="/upload/Profile-Images.png" alt="<?= $user->image ?>">
        <h4><?= $user->name ?> <?= $user->surname ?></h4>
        </div>
        <div>
            <p>Логин: <?= $user->login ?></p>
            <p>Почта: <?= $user->email ?></p>
        </div>
    </div>
    <div class="createP">
        <h5>Заявка на консультацию:</h5>
        <? foreach ($bookings as $booking) : ?>
            <hr>
            <p>Дата: <?= $booking->date_osmotr ?></p>
            <p>Время: <?= $booking->time_start ?></p>
        <? endforeach ?>
    </div>
</div>





<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>