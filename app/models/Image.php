<?php

namespace App\models;

use App\helpers\Connection;

class Image
{
    // вывести все изображения одной машины
    public static function all($id)
    {
        $query = Connection::make()->prepare("SELECT images.* FROM images
        INNER JOIN autos ON autos.id = images.auto_id WHERE autos.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }
}
