<?php
namespace App\models;

use App\helpers\Connection;

class Classes
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM `classes`");
        return $query->fetchAll();
    }
}