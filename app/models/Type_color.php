<?php
namespace App\models;

use App\helpers\Connection;

class Type_color
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM `type_colors`");
        return $query->fetchAll();
    }
}