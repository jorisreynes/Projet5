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

    <h1>Modifier votre post</h1>

        <form action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" method="POST">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>"/>
        </div>
        <div>
            <label for="chapo">Chapo</label><br />
            <input type="text" class="form-control" id="chapo" name="chapo" value="<?= nl2br(htmlspecialchars($post['chapo'])) ?>"/>
        </div>
        <div>
            <label for="content">Post</label><br />
            <input type="text" class="form-control" id="content" name="content" value="<?= $post['content'] ?>"/>
        </div>
        <div>
            <br>
            <input type="submit" />
        </div>
        </form>
        
    </div>

    <?php include("footer.php"); ?>

    </body>
</html>