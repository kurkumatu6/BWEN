<?php

namespace App\models;

use App\helpers\Connection;

class Auto
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT autos.*,(SELECT name FROM images WHERE images.auto_id = autos.id LIMIT 1 )as imageAuto, type_colors.type as type, models.name as model, brands.name as brand, colors.name as color, bodies.name as body, classes.name as classes ,gearboxes.name as gearbox FROM autos
        INNER JOIN type_colors ON type_colors.id = autos.type_color_id
        INNER JOIN models ON models.id = autos.model_id
        INNER JOIN brands ON brands.id = models.brand_id
        INNER JOIN colors ON autos.color_id = colors.id
        INNER JOIN bodies ON bodies.id = autos.body_id
        INNER JOIN classes ON classes.id = autos.class_id
        INNER JOIN gearboxes ON gearboxes.id = autos.gearbox_id");
        return $query->fetchAll();
    }


    //формируем строчку с позицонными параметрами
    private static function getParams($arr)
    {
        return implode(", ", array_fill(0, count($arr), "?"));
    }

    //получаем товары по указанным категориям
    public static function autosByManyBrands($brands)
    {
        //формируем параметры для запроса 
        $params = self::getParams($brands);

        $query = Connection::make()->prepare("SELECT autos.*,(SELECT name FROM images WHERE images.auto_id = autos.id LIMIT 1 )as imageAuto, type_colors.type as type, models.name as model, brands.name as brand, colors.name as color, bodies.name as body, classes.name as classes ,gearboxes.name as gearbox FROM autos
        INNER JOIN type_colors ON type_colors.id = autos.type_color_id
        INNER JOIN models ON models.id = autos.model_id
        INNER JOIN brands ON brands.id = models.brand_id
        -- INNER JOIN images ON autos.id = images.auto_id
        INNER JOIN colors ON autos.color_id = colors.id
        INNER JOIN bodies ON bodies.id = autos.body_id
        INNER JOIN classes ON classes.id = autos.class_id
        INNER JOIN gearboxes ON gearboxes.id = autos.gearbox_id
        WHERE  count > 0 AND brand_id IN (" . $params . ")");
        $query->execute($brands);
        return $query->fetchAll();
    }
    //получаем 3 последних товаров
    public static function last3Created()
    {
        $query = Connection::make()->query("SELECT * FROM images LIMIT 3");
        return $query->fetchAll();
    }
    //ищем товар на складе по его id
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT autos.*,(SELECT name FROM images WHERE images.auto_id = autos.id LIMIT 1 )as imageAuto, type_colors.type as type, models.name as model, models.description as description, colors.name as color, classes.name as class, bodies.name as body, gearboxes.name as gearbox, brands.name as brand FROM autos 
        INNER JOIN type_colors ON type_colors.id = autos.type_color_id
        INNER JOIN models ON models.id = model_id
        INNER JOIN colors ON colors.id = color_id
        INNER JOIN classes ON classes.id = class_id
        INNER JOIN bodies ON bodies.id = body_id
        INNER JOIN gearboxes ON gearboxes.id = gearbox_id
        INNER JOIN brands ON brands.id = models.brand_id
        WHERE autos.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    // запрос для поиска
    public static function search($arr)
    {
        $query = Connection::make()->prepare("SELECT autos.*,(SELECT name FROM images WHERE images.auto_id = autos.id LIMIT 1 )as imageAuto, models.description, models.name as model
        FROM `autos` 
        INNER JOIN models ON models.id = autos.model_id
        INNER JOIN brands ON brands.id = models.brand_id
        INNER JOIN colors ON colors.id = autos.color_id
        INNER JOIN type_colors ON type_colors.id = autos.type_color_id
        WHERE brands.id = :brand_id AND models.id = :model_id AND colors.id = :color_id AND type_colors.id = :type_color_id AND year = :year");
        $query->execute([
            "brand_id" => $arr['brand'],
            "model_id" => $arr['model_id'],
            "color_id" => $arr['color'],
            "type_color_id" => $arr['type_color'],
            "year" => $arr['year'],
        ]);
        return $query->fetchAll();
    }
    // для администратора

    // удаление
    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM autos WHERE id = :id ");
        $query->execute(["id" => $id]);
        return "delete";
    }
    //добавление
    public static function add($data)
    {
        $conn = Connection::make();
        $query = $conn->prepare("INSERT INTO autos (price, year, count, country, power, volume, speed, weight, consumption, type_color_id, model_id, color_id, class_id, body_id, gearbox_id) VALUES (:price, :year, :count,:country, :power, :volume, :speed, :weight, :consumption, :type_color_id, :model_id, :color_id, :class_id, :body_id, :gearbox_id)");
        $query->execute([
            "price" => $data["price"],
            "year" => $data["year"],
            "count" => $data["count"],
            "country" => $data["country"],
            "power" => $data["power"],
            "volume" => $data["volume"],
            "speed" => $data["speed"],
            "weight" => $data["weight"],
            "consumption" => $data["consumption"],
            "type_color_id" => $data["type_color_id"],
            "model_id" => $data["model_id"],
            "color_id" => $data["color_id"],
            "class_id" => $data["class_id"],
            "body_id" => $data["body_id"],
            "gearbox_id" => $data["gearbox_id"],
        ]);
        return $conn->lastInsertId();

    }
    public static function addAuto($data, $name)
    {
        $auto_id = self::add($data);
        $img = self::last($name, $auto_id);
    }
    // добавление картинки
    public static function last($name, $auto_id)
    {
        $conn = Connection::make();
        $query = $conn->prepare("INSERT INTO images (name, auto_id) VALUES (?, ?)");
        $query->execute([$name, $auto_id]);
        return $conn->lastInsertId();
    }

    // изменение
    public static function update($data)
    {

        $query = Connection::make()->prepare("UPDATE autos SET price = :price, year = :year, count=:count, country = :country, power = :power, volume = :volume, speed = :speed, weight = :weight, consumption = :consumption, type_color_id = :type_color_id, model_id = :model_id, color_id = :color_id, class_id = :class_id, body_id = :body_id, gearbox_id = :gearbox_id WHERE id = :id");
        $query->execute([
            "price" => $data["price"],
            "year" => $data["year"],
            "count" => $data["count"],
            "country" => $data["country"],
            "power" => $data["power"],
            "volume" => $data["volume"],
            "speed" => $data["speed"],
            "weight" => $data["weight"],
            "consumption" => $data["consumption"],
            "type_color_id" => $data["type_color_id"],
            "model_id" => $data["model_id"],
            "color_id" => $data["color_id"],
            "class_id" => $data["class_id"],
            "body_id" => $data["body_id"],
            "gearbox_id" => $data["gearbox_id"],
            "id" => $data["id"]
        ]);
    }
    public static function Year()
    {
        $query = Connection::make()->query("SELECT DISTINCT autos.year from autos");
        return $query->fetchAll();
    }
}
