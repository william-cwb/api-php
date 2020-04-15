<?php

namespace src;

class Connection
{

    private static $instance;

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            $instance = new \PDO('mysql:host=localhost;dbname=users_db;charset=utf8', 'william', '12345678');
        }

        return $instance;
    }
}
