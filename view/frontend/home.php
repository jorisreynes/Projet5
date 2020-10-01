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

<div class="site-heading">
<h1><span class="red">Joris</span> Reynes</h1>                        
<h2>Le développeur qu'il vous faut</h2>                 
<br><br>
<a href="public/img/CV.pdf" class="button" target="_blank">Télécharger CV</a></div>



</header>

<div class="col-lg-8 col-md-10 mx-auto">

<h1><span class="red">Vous</span> pouvez utiliser le formulaire ci dessous pour me contacter</h1>

<form name="sentMessage" id="contactForm" novalidate="">
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" id="name" required="" data-validation-required-message="Entrez votre nom.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="email" required="" data-validation-required-message="Entrez votre adresse email.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Message</label>
                    <textarea rows="5" class="form-control" placeholder="Votre Message" id="message" required="" data-validation-required-message="Entrez un message."></textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="button" id="sendMessageButton">Envoyer</button>
            </div>
        </form>



</div>
<?php include("footer.php"); ?>

       
    </body>
</html>