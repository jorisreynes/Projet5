<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $database = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        //$db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'dbuser', '');
        return $database;
    }
}
