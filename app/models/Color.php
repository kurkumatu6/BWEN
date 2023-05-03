<?php
namespace App\models;

use App\helpers\Connection;

class Color
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM `colors`");
        return $query->fetchAll();
    }
}