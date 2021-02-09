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

    <h1>Inscription</h1>

    <form action="index.php?action=subscription" method="POST">

        <div>
            <label for="pseudo">Pseudo</label><br />
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo"/>
        </div>

        <div>
            <label for="email">Email</label><br />
            <input type="text" class="form-control" id="email" name="email" placeholder="Adresse email"/>
        </div>

        <div>
            <label for="password">Password</label><br />
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"/>
        </div>

        <div>
            <br>
            <button type="submit" class="button" id="sendMessageButton">Envoyer</button>
        </div>

    </form>

    </div>

    <?php include("footer.php"); ?>

    </body>
</html>