<?php
namespace App\models;

use App\helpers\Connection;

class Body
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM `bodies`");
        return $query->fetchAll();
    }
}