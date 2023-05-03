<?php

namespace App\models;

use App\helpers\Connection;

class Model
{
    //Выводим полную информацию о товаре
    public static function all()
    {
        $query = Connection::make()->query("SELECT models.*, brands.name as brand, autos.price as price FROM models
        INNER JOIN autos ON models.id = autos.model_id
        INNER JOIN brands ON brands.id = models.brand_id");
        return $query->fetchAll();
    }
    // все без повторений
    public static function allGroup()
    {
        $query = Connection::make()->query("SELECT models.*, brands.name as brand FROM models 
        INNER JOIN brands ON brands.id = models.brand_id");
        return $query->fetchAll();
    }
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT models.*, brands.name as brand, autos.price as price FROM models
        INNER JOIN autos ON models.id = autos.model_id
        INNER JOIN brands ON brands.id = models.brand_id WHERE models.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    // вывести все машины определенной модели по id
    public static function findModelByBrand2($id)
    {
        $query = Connection::make()->prepare("SELECT models.* FROM models WHERE brand_id = :id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }

    public static function MinPriceByModel($id)
    {
        // найти минимальную цену модели
        $query = Connection::make()->prepare("SELECT models.name, MIN(price) as minPrice FROM autos INNER JOIN models ON model_id = models.id WHERE models.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }


    // найти определенную модель
    public static function findAutoAllByModels($id)
    {
        $query = Connection::make()->prepare("SELECT autos.*,(SELECT name FROM images WHERE images.auto_id = autos.id LIMIT 1 ) as imageAuto, models.name as model ,brands.name as brand,  colors.name as color, autos.price as price, autos.year as year, type_colors.type as type FROM models
        INNER JOIN autos ON models.id = autos.model_id
        INNER JOIN colors ON colors.id = autos.color_id
        INNER JOIN type_colors ON type_colors.id = autos.type_color_id
        INNER JOIN brands ON brands.id = models.brand_id WHERE models.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }
    public static function addModel($data, $img)
    {
        $query = Connection::make()->prepare("INSERT INTO models (name, description, image, brand_id) VALUES (:name, :description, :image, :brand_id)");
        $query->execute([
            "name" => $data["name"],
            "description" => $data["description"],
            "image" => $img,
            "brand_id" => $data["brand_id"],
        ]);
    }
    // удалить категорию
    public static function deleteModel($id)
    {
        $query = Connection::make()->prepare("DELETE FROM models WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }

    public static function getSpecsByServiceId($serv_id)
    {
        $query = Connection::make()->prepare("SELECT models.id, models.name FROM models 
        INNER JOIN brands ON brands.id = models.brand_id
        WHERE brands.id = ?");

        $query->execute([$serv_id]);

        return $query->fetchAll();
    }
    //формируем строчку с позицонными параметрами
    private static function getParams($arr)
    {
        return implode(", ", array_fill(0, count($arr), "?"));
    }
    //получаем товары по указанным категориям
    public static function modelsByManyBrands($brands)
    {
        //формируем параметры для запроса 
        $params = self::getParams($brands);

        $query = Connection::make()->prepare("SELECT models.*, brands.name as brand FROM models
        INNER JOIN brands ON brands.id = models.brand_id
        WHERE brand_id IN (" . $params . ")");
        $query->execute($brands);
        return $query->fetchAll();
    }
}
