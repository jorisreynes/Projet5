<?php

require('controller/frontend.php');


try {
 
    if (isset($_GET['action'])) {
        if (filter_input(INPUT_GET, 'action') == 'listPosts') {
            listPosts();
        }

        elseif (filter_input(INPUT_GET, 'action') == 'post') {
            if (null !== (filter_input(INPUT_GET, 'id')) && filter_input(INPUT_GET, 'id') > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif (filter_input(INPUT_GET, 'action') == 'newpost') {
           
            if (isset($_GET['title']) && filter_input(INPUT_GET, 'content')){
           }
            else {
               newPost('', '');
            }
        }

        elseif (filter_input(INPUT_GET, 'action') == 'addpost') {
            if (isset($_POST['title']) && filter_input(INPUT_POST, 'content') && filter_input(INPUT_POST, 'chapo')){
                addPost(filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'chapo'), filter_input(INPUT_POST, 'content'));
            }
            else {
            }
        }

        elseif (filter_input(INPUT_GET, 'action') == 'addComment') {
            if (isset($_GET['id']) && filter_input(INPUT_GET, 'id') > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment(filter_input(INPUT_GET, 'id'), filter_input(INPUT_POST, 'author'), filter_input(INPUT_POST, 'comment'));
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif (filter_input(INPUT_GET, 'action') == 'validatecomment') {
            validateComment(filter_input(INPUT_GET, 'id'));
        }

        elseif (filter_input(INPUT_GET, 'action') == 'deletecomment') {
            deleteComment(filter_input(INPUT_GET, 'id'));
        }

        elseif (filter_input(INPUT_GET, 'action') == 'deletepost') {
            deletePost(filter_input(INPUT_GET, 'id'));
        }


        elseif (filter_input(INPUT_GET, 'action') == 'subscriptionpage') {
            subscriptionPage();
        }

        elseif (filter_input(INPUT_GET, 'action') == 'subscription') 
        {
            subscriptionController(filter_input(INPUT_POST, 'pseudo'), filter_input(INPUT_POST, 'email'), filter_input(INPUT_POST, 'password'));
        }

        elseif (filter_input(INPUT_GET, 'action') == 'connexionpage') {
            connexionPage();
        }

        elseif (filter_input(INPUT_GET, 'action') == 'connexion') {
            connexion(filter_input(INPUT_POST, 'pseudo'), filter_input(INPUT_POST, 'password'));
        }

        elseif (filter_input(INPUT_GET, 'action') == 'deconnexion') {
            deconnexion();
        }
 
        elseif (filter_input(INPUT_GET, 'action') == 'updatethepost') {
            if (null !== (filter_input(INPUT_GET, 'id')) && filter_input(INPUT_GET, 'id') > 0) {
                updateThePost();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif (filter_input(INPUT_GET, 'action') == 'updatePost') {
            if (null !== (filter_input(INPUT_POST, 'title')) && filter_input(INPUT_POST, 'content') && filter_input(INPUT_POST, 'chapo')){
                updatePost(filter_input(INPUT_GET, 'id'), filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'chapo'), filter_input(INPUT_POST, 'content'));
            }
            else {
            }
        }
    }
    else {
        home();
    }
}
catch(Exception $e) {
    print_r ('Erreur : ' . $e->getMessage());
}
