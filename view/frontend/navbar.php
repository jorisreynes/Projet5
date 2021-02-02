<nav class="navbar navbar-expand-lg navbar-dark bg-dark static">

        <img src="public/img/logo3.png" width="80px" height="27px">
        <a class="navbar-brand" href="#"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"  aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="index.php"><span class="red">Accueil</span><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="index.php?action=listPosts">Les articles<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item active">
            <a class="nav-link" href="index.php?action=subscriptionpage">Inscription<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">

            <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                {
                   ?>
                   <a class="nav-link" href="index.php?action=deconnexion">Déconnnexion<span class="sr-only">(current)</span></a>';
                   <?php
                }
                else{
                    ?>
                    <a class="nav-link" href="index.php?action=connexionpage">Connnexion<span class="sr-only">(current)</span></a>';
                    <?php
                }
            ?> 

            </li>
            </ul>
        </div>
</nav>