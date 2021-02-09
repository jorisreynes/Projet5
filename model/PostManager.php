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

    //Permet de publier un post en utilisant le titre, le chapo et le contenu saisis dans le formulaire
    public function postPost($title, $chapo, $content)
    {
    $database = $this->dbConnect();
    $post = $database->prepare('INSERT INTO posts(title, chapo, content, creation_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $post->execute(array($title, $chapo, $content));
    return $affectedLines;
    }

    //Permet de supprimer un post de la base de données
    public function removePost($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM posts WHERE id=?');
        $affectedLines = $comments->execute(array($id));
        return $affectedLines;
    }


    public function updatePost($id)
    {
        header("Location: http://localhost:8888/Projet5/index.php");
    }

    //Permet de modifier un post existant en reprenant automatiquement l'id, le titre, le chapo, et le contenu sont saisis dans le formulaire 
    public function updatePosts($id, $title, $chapo, $content)
    {

        $id=(filter_input(INPUT_GET, 'id'));
        $title=(filter_input(INPUT_POST, 'title'));
        $chapo=(filter_input(INPUT_POST, 'chapo'));
        $content=(filter_input(INPUT_POST, 'content'));

        $database = $this->dbConnect();
        $posts = $database->prepare("UPDATE posts SET title= '$title', chapo='$chapo', content='$content' WHERE id = '$id'");
        $affectedLines = $posts->execute(array());
        header("Location: http://localhost:8888/Projet5/index.php?action=listPosts");
        return $affectedLines;
    }

}