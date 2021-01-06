<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnexionSubscription.php');

//__autoload(ConnexionSubscriptionManager);


function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}


function listComments()
{
    $postManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $posts = $postManager->getComments();

    
}

function validateComment($postId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    //$posts = $commentManager->updateComment($_GET['id']);
    $posts = $commentManager->updateComment(filter_input(INPUT_GET, 'id'));



    
}

function deleteComment($postId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $posts = $commentManager->removeComment(filter_input(INPUT_GET, 'id'));

    
}




function home()
{
    require('view/frontend/home.php');
}



function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost(filter_input(INPUT_GET, 'id'));
    $comments = $commentManager->getComments(filter_input(INPUT_GET, 'id'));

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



function newpost($title, $content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $affectedLines = $postManager->postPost($title, $content);

    require('view/frontend/addpost.php');
}



function subscriptionpage()
{
    require('view/frontend/subscription.php');
}



function connexionpage()
{
    require('view/frontend/connexion.php');
}



function connexion($pseudo, $password)
{
    $connexionSubscriptionManager = new \OpenClassrooms\Blog\Model\ConnexionSubscriptionManager();

    $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);

   

    $affectedLines = $connexionSubscriptionManager->connexion($pseudo, $password);

    require('view/frontend/connexion.php');
}



function subscriptioncontroller($pseudo, $email, $password)
{
    $connexionSubscriptionManager = new \OpenClassrooms\Blog\Model\ConnexionSubscriptionManager();

    $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);

    $affectedLines = $connexionSubscriptionManager->subscription($pseudo, $email, $password);

    require('view/frontend/subscription.php');
}





function deconnexion()
{

    session_start();
    session_destroy();

    //require('index.php');
    header("Location: http://localhost:8888/Projet5/index.php");

}