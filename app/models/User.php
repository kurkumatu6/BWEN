<?php
namespace App\models;
use App\helpers\Connection;

//все методы необходимые для работы с пользователем
class User
{
    // получить всех пользователей
    public static function all()
    {
        $query = Connection::make()->query("SELECT users.*, roles.name as role FROM users
        INNER JOIN roles ON roles.id = users.role_id");
        return $query->fetchAll();
    }

    // изменение пользователя
    public static function insert($data)
    {
        $query = Connection::make()->prepare("INSERT INTO users (name, surname, login, email, password) VALUES (:name, :surname,:login,:email, :password)");

        return $query->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "email" => $data["email"],
            "login" => $data["login"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT)
        ]);
    }

    // получить пользователя
    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE login = :login");
        $query->execute(["login" => $login]);
        $user = $query->fetch();
        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    // найти пользователя по id
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT users.*, roles.name as role FROM users 
        INNER JOIN roles ON roles.id = users.role_id
        WHERE users.id = :userID");
        $query->execute(["userID" => $id]);
        $user = $query->fetch();
        return $user;
    }

    // удалить
    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM users WHERE id = :id");
        $query->execute([":id" => $id]);
        return "delete";
    }
    //добавление
    public static function add($data)
    {
        $query = Connection::make()->prepare("INSERT INTO users (name, surname, email, role_id) VALUES (:name, :surname, :email,:country, :role_id)");
        $query->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "email" => $data["email"],
            "role_id" => $data["role_id"]
        ]);
    }

    // обновить пользователя
    public static function update($data)
    {
        $query = Connection::make()->prepare("UPDATE users SET role_id = :role_id
        WHERE id = :id");
        $query->execute([
            "role_id" => $data["role_id"],
            // "id" => $id
            "id" => $data["id"]

        ]);
    }

    //формируем строчку с позицонными параметрами
    private static function getParams($arr)
    {
        return implode(", ", array_fill(0, count($arr), "?"));
    }

    //получаем товары по указанным категориям
    public static function userByManyBrands($user)
    {
        //формируем параметры для запроса 
        $params = self::getParams($user);

        $query = Connection::make()->prepare("SELECT users.*, roles.name as role FROM users
        INNER JOIN roles ON roles.id = users.role_id
        WHERE role_id IN (" . $params . ")");
        $query->execute($user);
        return $query->fetchAll();
    }

    // найти сотрудников
    public static function findEmployee()
    {
        $query = Connection::make()->query("SELECT users.* FROM users
        INNER JOIN roles ON roles.id = users.role_id
        WHERE users.role_id = 3 LIMIT 1");
        return $query->fetchAll();
    }
    
}
