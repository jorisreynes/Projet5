<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnexionSubscription.php');


//Permet l'affichage des différents posts, utilisé dans la page listPostsView
function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}

//Permet l'affichage des différents commentaires, utilisé dans la page postView
function listComments()
{
    $postManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $posts = $postManager->getComments();
}

//Permet de valider un commentaire, ils sont affichés sur la page home
function validateComment($postId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $posts = $commentManager->updateComment(filter_input(INPUT_GET, 'id'));
}

//Permet de supprimer un commentaire de la page home
function deleteComment($postId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $posts = $commentManager->removeComment(filter_input(INPUT_GET, 'id'));
}

//Permet de supprimer un commentaire de la page postView
function deletePost($postId)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->removePost(filter_input(INPUT_GET, 'id'));
    header("Location: http://localhost:8888/Projet5/index.php?action=listPosts");
}

//Permet d'afficher la page home
function home()
{
    require('view/frontend/home.php');
}

//Permet d'afficher un post en particulier
function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $post = $postManager->getPost(filter_input(INPUT_GET, 'id'));
    $comments = $commentManager->getComments(filter_input(INPUT_GET, 'id'));

    require('view/frontend/postView.php');
}

//Permet d'ajouter un commentaire, le postId est repris automatiquement, l'utilisateur entre son nom et son commentaire
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

//Permet d'ajouter un post, l'utilisateur entre le titre, le chapo, et le contenu, l'id sera créé automatiquement
function addPost($title, $chapo, $content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $affectedLines = $postManager->postPost($title, $chapo, $content);
    header("Location: http://localhost:8888/Projet5/index.php?action=listPosts");
}

//Permet l'affichage de la page de création de post
function newPost($title, $content)
{
    require('view/frontend/addpost.php');
}

//Permet l'affichage de la page d'inscription'
function subscriptionPage()
{
    require('view/frontend/subscription.php');
}

//Permet l'affichage de la page de connexion
function connexionPage()
{
    require('view/frontend/connexion.php');
}

//Permet de se connecter, l'utilisateur entre son pseudo et son mot de passe, qui va etre chiffré et comparé à la version chiffrée stockée
function connexion($pseudo, $password)
{
    $connexionSubscriptionManager = new \OpenClassrooms\Blog\Model\ConnexionSubscriptionManager();
    $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
    $affectedLines = $connexionSubscriptionManager->connexion($pseudo, $password);
    require('view/frontend/connexion.php');
}

//Permet de s'enregistrer, l'utilisateur entre son pseudo, son adresse email et son mot de passe, qui va etre chiffré et stocké
function subscriptionController($pseudo, $email, $password)
{
    $connexionSubscriptionManager = new \OpenClassrooms\Blog\Model\ConnexionSubscriptionManager();
    $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
    $affectedLines = $connexionSubscriptionManager->subscription($pseudo, $email, $password);
    require('view/frontend/subscription.php');
}

//Permet d'afficher la page de modification de post en affichant les données actuelles dans le formulaire
function updateThePost()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $post = $postManager->getPost(filter_input(INPUT_GET, 'id'));
    require('view/frontend/updatePost.php');
}

//Permet de mettre à jour un post, l'id est renseigné automatiquement, le titre, le chapo et le contenu sont saisis par l'utilisateur dans le formulaire
function updatePost($id, $title, $chapo, $content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->updatePosts(filter_input(INPUT_GET, 'id'), $title, $chapo, $content);
}

//Permet de se déconnecter
function deconnexion()
{
    session_start();
    session_destroy();
    header("Location: http://localhost:8888/Projet5/index.php");
}