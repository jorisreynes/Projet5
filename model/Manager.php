<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    //Permet la connexion à la base de données
    protected function dbConnect()
    {
        $database = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $database;
    }
}
