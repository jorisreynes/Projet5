<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="col-lg-8 col-md-10 mx-auto">

<h1>Bienvenue sur mon blog</h1>
<h2>N'hésitez pas à laisser des commentaires</h2>



<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            le <?= $data['creation_date_fr'] ?>
        </h3>
        <br>
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
<br>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<div class="form-group">
    <br>
    <a href="index.php?action=addpost" class="button" target="_blank">Ajouter un post</a>
</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
