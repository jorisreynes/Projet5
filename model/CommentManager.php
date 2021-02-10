<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");
require_once("entity/Comment.php");

class CommentManager extends Manager

{
    //Permet de récupérer un commentaire en particulier
    public function getComments($postId)
    {
        $database = $this->dbConnect();
        $comments = $database->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND comment_status = \'valide\' ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    //Permet de récupérer les commentaires
    public function getComment()
    {
        $database = $this->dbConnect();
        $comments = $database->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND comment_status = \'valide\' ORDER BY comment_date DESC');
        return $comments;
    }

    //Permet de poster un commentaire
    public function postComment($postId, $author, $comment)
    {
        $database = $this->dbConnect();
        $status = 'avalider';
        $comments = $database->prepare('INSERT INTO comments(post_id, author, comment, comment_status, comment_date) VALUES(?, ?, ?, "avalider", NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    //Permet de modifier un commentaire précis
    public function updateComment($id)
    {
        $database = $this->dbConnect();
        $comments = $database->prepare('UPDATE comments SET comment_status = "valide" WHERE id=?');
        $affectedLines = $comments->execute(array($id));
        header("Location: http://localhost:8888/Projet5/index.php");
        return $affectedLines;
    }

    //Permet de supprimer un commentaire précis
    public function removeComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id=?');
        $affectedLines = $comments->execute(array($id));
        header("Location: http://localhost:8888/Projet5/index.php");
        return $affectedLines;
    }
}