<?php

namespace Core;

use \PDO;
use PDOException;

class Connection
{

    public static function connect()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=world', 'phpmyadmin', 'sosote20');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
