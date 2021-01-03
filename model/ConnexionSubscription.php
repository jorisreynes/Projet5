<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class ConnexionSubscriptionManager extends Manager

{



    public function subscription($pseudo, $email, $password)
    {
    $db = $this->dbConnect();
    $users = $db->prepare('INSERT INTO users(pseudo, email, password) VALUES(?, ?, ?)');
    $affectedLines = $users->execute(array($pseudo, $email, $password));

    return $affectedLines;
    }












    public function connexion($pseudo, $password)
    {
    $db = $this->dbConnect();

    $req = $db->prepare('SELECT id, password FROM users WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $resultat = $req->fetch();

    
  
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

    

    
        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) 
            {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;
                //echo 'Vous êtes connecté !';
                header("Location: http://localhost:8888/Projet5/index.php");
            }
            else 
            {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }   


}