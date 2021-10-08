<?php $title = "Commentaire de ".$comment->author; ?>

<?php ob_start(); ?>
<h1>Mon super blog</h1>
<div><a href="index.php?action=post&id=<?= $comment->post_id ?>">Retour à l'article</a></div>

<form action="index.php?action=upcomment&id=<?= $comment->id ?>" method="POST">
    <input type="hidden" name="postid" value="<?= $comment->post_id ?>">
    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" id="auteur" name="author" value="<?= $comment->author ?>">
    </div>
    <div class="form-group">
        <label for="com">Commentaire: </label>
        <p><em>Fait le <?= $comment->comment_date_fr ?></em></p>
        <textarea name="commentaire" id="com" cols="30" rows="10"><?= $comment->comment ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Modifier">
    </div>
</form>


<?php $content = ob_get_clean(); ?>
<?php require("template.php"); ?>