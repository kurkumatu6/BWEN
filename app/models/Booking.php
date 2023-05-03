<?php

namespace App\models;

use App\helpers\Connection;

class Booking
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM bookings");
        return $query->fetchAll();
    }



    //забронировать
    public static function add($data, $user_id)
    {
        $conn = Connection::make();
        $query = $conn->prepare("INSERT INTO bookings (date_osmotr,time_start, user_id) VALUES (:date_osmotr,:time_start, :user_id)");
        $query->execute([
            "date_osmotr" => $data["date_osmotr"],
            "time_start" => $data["time_start"],
            "user_id" => $user_id,
        ]);
        return $conn->lastInsertId();
    }
    public static function addBooking($data, $auto_id, $user_id)
    {
        $booking_id = self::add($data, $user_id);
        $last = self::last($booking_id, $auto_id);
    }
    
    public static function last($booking_id,$auto_id)
    {
        $conn = Connection::make();
        $query = $conn->prepare("INSERT INTO item_in_bookings (booking_id, auto_id) VALUES (?, ?)");
        $query->execute([$booking_id, $auto_id]);
        return $conn->lastInsertId();
    }

    // найти по айди пользователя
    public static function findUser($id)
    {
        $query = Connection::make()->query("SELECT bookings.*, user_id as user FROM bookings 
        INNER JOIN users ON users.id = bookings.user_id WHERE users.id = $id");
        return $query->fetchAll();
    }

    // вывести все заказы для админа
    public static function all2()
    {
        $query = Connection::make()->query("SELECT item_in_bookings.*, bookings.date_osmotr as osmotr, bookings.time_start as time, bookings.user_id as user, users.name as name FROM item_in_bookings
        INNER JOIN bookings ON bookings.id = item_in_bookings.booking_id
        INNER JOIN users ON users.id = bookings.user_id ORDER By date_osmotr");
        return $query->fetchAll();
    }

}
