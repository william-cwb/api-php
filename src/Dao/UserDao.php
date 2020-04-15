<?php

namespace src\Dao;

use Exception;
use src\Connection;
use src\Models\User;

class UserDao
{

    public static function save(User $user)
    {
        try {
            $sql = 'INSERT INTO users (name, email) VALUES (?,?)';
            $stmt = Connection::getInstance()->prepare($sql);
            $result = $stmt->execute([$user->getName(), $user->getEmail()]);
            return $result;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function all()
    {
        $sql = 'SELECT * FROM users';
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } else {
            return [];
        }
    }

    public static function get(int $id)
    {
        $sql = 'SELECT * FROM users WHERE id = ?';
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function update(User $user)
    {
        $sql = 'UPDATE users SET name = :name, email = :email WHERE id = :id';
        $stmt = Connection::getInstance()->prepare($sql);
        $result = $stmt->execute([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'id' => $user->getId()
        ]);
        return $result;
    }
}
