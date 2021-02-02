<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager

{

    public function getPosts()
    {
        $database = $this->dbConnect();
        //$req = $database->query('SELECT id, title, chapo, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
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



    public function postPost($title, $chapo, $content)
    {
    $database = $this->dbConnect();
    $post = $database->prepare('INSERT INTO posts(title, chapo, content, creation_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $post->execute(array($title, $chapo, $content));
    return $affectedLines;
    }


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

    public function updatePosts($id, $title, $chapo, $content)
    {
        $id=$_GET['id'];
        $title=$_POST['title'];
        $chapo=$_POST['chapo'];
        $content=$_POST['content'];

        //echo $_POST['title'];
        //echo $_POST['content'];
        //echo $_POST['chapo'];
        //echo $_GET['id'];

        //echo $id;
        //echo $title;
        //echo $chapo;
        //echo $content;




        $database = $this->dbConnect();
        //$posts = $database->prepare('UPDATE posts SET title = "$title" , chapo = "$chapo", content = "$content", WHERE id = $id');
        



        //--------- ENFIIIIIIIINNN -----

        //$posts = $database->prepare("UPDATE posts SET title= '$title' WHERE id = 16");
        $posts = $database->prepare("UPDATE posts SET title= '$title', chapo='$chapo', content='$content' WHERE id = '$id'");

        //-------------------------------



        //$posts->execute(array(
        //'title'=> $_POST['title'],
        //'chapo'=> $_POST['chapo'],
        //'content'=> $_POST['content'],
        
        $affectedLines = $posts->execute(array());
        //$affectedLines = $posts->execute(array($id, $title, $chapo, $content));
        header("Location: http://localhost:8888/Projet5/index.php?action=listPosts");
        return $affectedLines;
        //echo $_POST['title'];
        //echo $_POST['content'];
        //echo $_POST['chapo'];
        //echo $_GET['id'];
    }

}