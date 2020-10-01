<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function home()
{
    require('view/frontend/home.php');

}


function connexion()
{
    require('view/frontend/connexion.php');

}


function subscription()
{
    require('view/frontend/subscription.php');

}



function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}



// Nouvelle fonction ci dessous pour ajouter des posts

function addpost($title, $content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $affectedLines = $postManager->postPost($title, $content);

    require('view/frontend/addpost.php');

}
