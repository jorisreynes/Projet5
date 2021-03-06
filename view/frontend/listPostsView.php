<?php $title = 'Mon blog'; 
session_start();?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link href="public/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    <body>

    <?php include("navbar.php"); ?>

    <div class="col-lg-8 col-md-10 mx-auto">

<?php
    while ($data = $posts->fetch())
        {
            ?>
            <h3><?= htmlspecialchars($data['title']) ?> le <?= $data['creation_date_fr'] ?></h3>
            <br>
            <p>
            <?= nl2br(htmlspecialchars($data['chapo'])) ?>
            <br>
            <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                {
                    ?>
                   <a href="index.php?action=deletepost&amp;id=<?= $data['id'] ?>" class="btn btn-secondary mb-2">Supprimer le post</a>
                   <a href="index.php?action=updatethepost&amp;id=<?= $data['id'] ?>" class="btn btn-secondary mb-2">Modifier le post</a>
                  
<?php
                }
            ?>    
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-secondary mb-2">Voir le post</a>
        </p>
<?php
}
$posts->closeCursor();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
  {
   ?>
    <br>
    <a href="index.php?action=newpost" class="button" target="_blank">Ajouter un post</a>
    <?php
    }
    ?>   
    
</div>

<?php include("footer.php"); ?>  
</body>
</html>