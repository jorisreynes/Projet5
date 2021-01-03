<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager

{



    public function getPosts()
    {
        $database = $this->dbConnect();
        $req = $database->query('SELECT id, title, chapo, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }





    public function getPost($postId)
    {
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT id, title, chapo, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }





// Nouvelle fonction ci dessous pour ajouter des posts

    public function postPost($title, $content)
    {
    $database = $this->dbConnect();
    $post = $database->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
    $affectedLines = $post->execute(array($title, $content));

    return $affectedLines;
    }




}