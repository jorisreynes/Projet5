<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class ConnexionSubscriptionManager extends Manager

{



    public function subscription($pseudo, $email, $password)
    {
    $database = $this->dbConnect();
    $users = $database->prepare('INSERT INTO users(pseudo, email, password) VALUES(?, ?, ?)');
    $affectedLines = $users->execute(array($pseudo, $email, $password));

    return $affectedLines;
    }












    public function connexion($pseudo, $password)
    {
    $database = $this->dbConnect();

    $req = $database->prepare('SELECT id, password FROM users WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $resultat = $req->fetch();

    
  
    $isPasswordCorrect = password_verify(filter_input(INPUT_POST, 'password'), $resultat['password']);

    

    
        if (!$resultat)
        {
            print_r ( 'Mauvais identifiant ou mot de passe !');
        }
        else
        {
            if ($isPasswordCorrect) 
            {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;
                //$_SESSION['pseudo'] = $pseudo;
                //echo 'Vous êtes connecté !';
                header("Location: http://localhost:8888/Projet5/index.php");
            }
            else 
            {
                print_r( 'Mauvais identifiant ou mot de passe !');
            }
        }
    }   


}