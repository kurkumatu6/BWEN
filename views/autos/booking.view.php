<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<form class="bookingForm" action="/app/tables/autos/booking.add.php" method="POST">
    <img src="/upload/icons/icon-booking.png" class="bookImg" alt="" style="width: 50px; height: 50px;">
    <h2>Бронирование</h2>
    <!-- <p><?= $autos->brand ?> <?= $autos->model ?> <?= $autos->color ?> </p> -->
    <div class="bookingTime">

        <div class="lbook">
            <label for="date">Дата: </label>
            <input type="date" class="form-control" name="date_osmotr" class="bbok dateB">
        </div>
        <div class="lbook">
            <label for="date">Время: </label>
            <input type="time" class="form-control" name="time_start" class="bbok dateB">
        </div>
        <input hidden name="auto_id" value="<?=$autos->id?>" type="number" class="bbok dateB">
    </div>
    
    <button class="btnBooking2" name="BookingBtn">Забронировать</button>
    <div class="phonee">
        <img src="/upload/icons/icon-phone.png" alt="" style="width: 20px; height: 20px;" class="imgIcons">
        <p>+ 7 (512) 475 47 57</p>
    </div>


</form>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; 
?>