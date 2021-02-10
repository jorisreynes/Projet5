<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");

class Comment
{
    
    private $id;
    private $title;
    private $chapo;
    private $content;
    
    private $author;
    private $comment;
    private $comment_status;




    // Getters and Setters
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getChapo()
    {
        return $this->chapo;
    }
    
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    
    public function getCreated()
    {
        return $this->created;
    }
    
    public function setCreated($created)
    {
        $this->created = $created;
    }
    
    public function getUpdated()
    {
        return $this->updated;
    }
    
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}


