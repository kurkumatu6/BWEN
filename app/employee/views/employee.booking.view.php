<div class="Admin-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/employee/views/templates/header.employee.php'; ?>

    <table class="table">
        <tr>
            <th scope="col">Пользователь </th>
            <th scope="col">Дата </th>
            <th scope="col">Время </th>
            <th colspan=2>Действия</th>
        </tr>

        <tbody>
            <?php foreach ($bookings as $booking) : ?>
                <tr>
                    <td><?= $booking->name ?></td>
                    <td><?= date_format(date_create($booking->osmotr), 'd.m.Y')  ?></td>
                    <td><?= $booking->time ?></td>
                    <td><a href="/app/employee/tables/employee.booking.auto.php?id=<?= $booking->auto_id ?> " class="btn">Посмотреть автомобиль</a></td>
                </tr>
            <?php endforeach ?>
            </thead>
    </table>
</div>