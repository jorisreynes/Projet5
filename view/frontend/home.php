<?php $title = 'Mon blog'; 
session_start();?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
<body>
      
    <?php include("navbar.php"); ?>

<header class="masthead" id="banner">
<!--img src="public/img/imageaccueil.jpeg" class="masthead"-->

<div class="site-heading">
<h1><span class="red">Joris</span> Reynes</h1>                        
<h2>Le développeur qu'il vous faut</h2>                 
<br><br>
<a href="public/img/CV.pdf" class="button" target="_blank">Télécharger CV</a>
</div>

</header>

<div class="col-lg-8 col-md-10 mx-auto">


<?php
  if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
    print_r( '<h1>Commentaires à valider</h1>' .'<br /><br />');
      $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
      $reponse = $bdd->query('SELECT * FROM comments WHERE comment_status =\'avalider\'');
?>

<?php
      while ($donnees = $reponse->fetch())
      {
      ?>

<table id="mytable" class="table table-bordred table-striped">
        <thead>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>Edit</th>
                <th>Delete</th>
        </thead>
    <tbody>
    <tr>
    <td><?= htmlspecialchars($donnees['author']) ?></td>
    <td><?= nl2br(htmlspecialchars($donnees['comment'])) ?></td>
    <td><a href="index.php?action=validatecomment&amp;id=<?= $donnees['id'] ?>" class="btn btn-secondary mb-2">Valider le commentaire</a></td>
    <td><a href="index.php?action=deletecomment&amp;id=<?= $donnees['id'] ?>" class="btn btn-secondary mb-2"> Supprimer le commentaire</a></td>
    </tr>
    </tbody>

</table>
   
<?php
}
    
$reponse->closeCursor();
}
?>

<br><br><h1><span class="red">Vous</span> pouvez utiliser le formulaire ci dessous pour me contacter</h1>

  <form action="" method="post" >

<div>
      <label for="nom">Nom</label>
      <input  type="text" name="nom" class="form-control" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>">
</div>

<div>
      <label for="prenom">Prénom</label>
      <input  type="text" name="prenom" class="form-control" value="<?php if (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']);?>">
 </div>

<div>
      <label for="email">Addresse email</label>
      <input  type="text" name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
</div>

<div>
      <label for="telephone">Téléphone</label>
      <input  type="text" name="telephone" class="form-control" value="<?php if (isset($_POST['telephone'])) echo htmlspecialchars($_POST['telephone']);?>">
</div>

<div>
      <label for="commentaire">Commentaire</label>
      <textarea  class="form-control" name="commentaire" ><?php if (isset($_POST['commentaire'])) echo htmlspecialchars($_POST['commentaire']);?></textarea>
      <br>
      <input type="submit" class="button" value=" Envoyer ">
</div>

    </form>

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "joris.reynes81@gmail.com";
    $email_subject = "Vous avez reçu un nouveau message provenant de votre blog";
 
    function died($error) {
        // your error code can go here
        echo 
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
    // si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['commentaire'])) {
        died(

'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }

    $nom = $_POST['nom']; // required
    $prenom = $_POST['prenom']; // required
    $email = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $commentaire = $_POST['commentaire']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
   
      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($commentaire) < 2) {
      $error_message .= 
'Le commentaire que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Voici le message que vous avez reçu:\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Telephone: ".$telephone."\n";
    $email_message .= "Commentaire: ".$commentaire."\n";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    ?>

    Merci de nous avoir contacté. Nous vous contacterons très bientôt.
     
  <?php

    }
    
?>

</div>

<?php include("footer.php"); ?>
</body>
</html>