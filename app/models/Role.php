<?php

namespace App\models;

use App\helpers\Connection;

class Role
{
    // все без повторений
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM `roles`");
        return $query->fetchAll();
    }

    public static function find()
    {
        $query = Connection::make()->query("SELECT * FROM `roles`");
        return $query->fetchAll();
    }
}
