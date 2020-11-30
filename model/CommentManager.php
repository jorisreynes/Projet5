<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager

{



    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getComment()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');


        return $comments;
    }


    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $status = 'avalider';
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_status, comment_date) VALUES(?, ?, ?, "avalider", NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }


    public function updateComment($id)
    {
        $db = $this->dbConnect();
        $status = 'valide';
        $comments = $db->prepare('UPDATE comments(comment_status) VALUES("valide")');
        $affectedLines = $comments->execute(array($id, $comment_status));

        return $affectedLines;
    }

    public function removeComment2($id)
    {
        $db = $this->dbConnect();
        $status = 'valide';
        $comments = $db->execute('DELETE from comment where id=$id');
        //$affectedLines = $comments->execute(array($id, $comment_status));

        return $affectedLines;
    }



    public function removeComment4($id)
    {
        $db = $this->dbConnect();
        $comments = $db->execute('DELETE FROM comments WHERE id=$id');
        
        //$affectedLines = $comments->execute(array($id));

        //var_dump ($comments);
        //echo '----';
        //var_dump ($affectedLines);

        header("Location: http://localhost:8888/Projet5/index.php");


        return $affectedLines;
    }

   
    public function removeComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id=?');
        
        $affectedLines = $comments->execute(array($id));

        //ar_dump ($comments);
        //echo '----';
        //var_dump ($affectedLines);

        header("Location: http://localhost:8888/Projet5/index.php");


        return $affectedLines;
    }










    public function removeComment3($id)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sql, [$id]);
    }




}