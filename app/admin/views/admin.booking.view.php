<div class="Admin-container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>


    <table class="table">
        <tr>
            <th scope="col">Пользователь </th>
            <th scope="col">Дата </th>
            <th scope="col">Время </th>
            <th scope="col">Действие </th>
            <!-- <th colspan = 2>Действия</th> -->
        </tr>

        <tbody>
            <?php foreach ($bookings as $booking) : ?>
                <tr>
                    <td><?= $booking->name ?></td>
                    <td><?= $booking->osmotr ?></td>
                    <td><?= $booking->time ?></td>
                    <td><a href="/app/admin/tables/admin.booking.auto.php?id=<?= $booking->auto_id ?> " class="btn">Посмотреть автомобиль</a></td>
                </tr>
            <?php endforeach ?>
            </thead>
    </table>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>