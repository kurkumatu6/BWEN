<?php
namespace App\models;

use App\helpers\Connection;

class Gearbox
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM `gearboxes`");
        return $query->fetchAll();
    }
}