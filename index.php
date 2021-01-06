<?php

require('controller/frontend.php');


try {
 
    if (isset($_GET['action'])) {
        //if ($_GET['action'] == 'listPosts') {
        if (filter_input(INPUT_GET, 'action') == 'listPosts') {
            listPosts();
        }


        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

    



        elseif ($_GET['action'] == 'newpost') {
           
            if (isset($_GET['title']) && $_GET['content']){
               addpost($_GET['title'], $_GET['content']);
           }
            else {
               newpost('', '');
            }
        }
        elseif ($_GET['action'] == 'addpost') {

           

            if (isset($_POST['title']) && $_POST['content']){
                addpost($_POST['title'], $_POST['content']);
            }
            else {
                newpost('', '');
            }
        }




        elseif ($_GET['action'] == 'addComment') {
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

        elseif ($_GET['action'] == 'validatecomment') {
            validateComment($_GET['id']);
           
        }


        elseif ($_GET['action'] == 'deletecomment') {
            deleteComment($_GET['id']);
           
        }


        elseif ($_GET['action'] == 'subscriptionpage') {
            subscriptionpage();
        }

        elseif ($_GET['action'] == 'subscription') 
        {
            subscriptioncontroller($_POST['pseudo'], $_POST['email'], $_POST['password']);
        }



        elseif ($_GET['action'] == 'connexionpage') {
            connexionpage();
        }


        elseif ($_GET['action'] == 'connexion') {
            connexion($_POST['pseudo'], $_POST['password']);
        }

      



        

        elseif ($_GET['action'] == 'deconnexion') {
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
