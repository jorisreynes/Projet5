<?php

require('controller/frontend.php');


try {
 
    if (isset($_GET['action'])) {
        //if ($_GET['action'] == 'listPosts') {
        if (filter_input(INPUT_GET, 'action') == 'listPosts') {
            listPosts();
        }


        elseif (filter_input(INPUT_GET, 'action') == 'post') {
            if (null !== (filter_input(INPUT_GET, 'id')) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

    



        elseif (filter_input(INPUT_GET, 'action') == 'newpost') {
           
            if (isset($_GET['title']) && $_GET['content']){
               addpost($_GET['title'], $_GET['content']);
           }
            else {
               newpost('', '');
            }
        }
        elseif (filter_input(INPUT_GET, 'action') == 'addpost') {

           

            if (isset($_POST['title']) && $_POST['content']){
                addpost($_POST['title'], $_POST['content']);
            }
            else {
                newpost('', '');
            }
        }




        elseif (filter_input(INPUT_GET, 'action') == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
            validateComment($_GET['id']);
           
        }


        elseif (filter_input(INPUT_GET, 'action') == 'deletecomment') {
            deleteComment($_GET['id']);
           
        }


        elseif (filter_input(INPUT_GET, 'action') == 'subscriptionpage') {
            subscriptionpage();
        }

        elseif (filter_input(INPUT_GET, 'action') == 'subscription') 
        {
            subscriptioncontroller($_POST['pseudo'], $_POST['email'], $_POST['password']);
        }



        elseif (filter_input(INPUT_GET, 'action') == 'connexionpage') {
            connexionpage();
        }


        elseif (filter_input(INPUT_GET, 'action') == 'connexion') {
            connexion($_POST['pseudo'], $_POST['password']);
        }

      



        

        elseif (filter_input(INPUT_GET, 'action') == 'deconnexion') {
            deconnexion();
        }
















       
    }
    else {
       
        home();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
