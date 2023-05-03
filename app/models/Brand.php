<?php

namespace App\models;

use App\helpers\Connection;

class Brand
{
    //ищем все бренды
    public static function all()
    {
        $query = Connection::make()->query("SELECT name, id, image FROM brands");
        return $query->fetchAll();
    }
    // найти определенный бренд по id
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT brands.* FROM brands WHERE brands.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }
    
}