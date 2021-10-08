<?php $title = $post->title; ?>
<?php ob_start(); ?>

<h1>Mon super blog</h1>
<div><a href="index.php">Retour à la liste des articles</a></div>
<div class="news">
    <h3><?= $post->title ?></h3>
    <em>le <?= $post->creation_date_fr ?></em>
    <div>
        <?= nl2br($post->content) ?>
    </div>
</div>

<h2>Commentaires</h2>
<form action="index.php?action=addcomment&id=<?= $post->id ?>" method="POST">
    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" id="auteur" name="author" value="">
    </div>
    <div class="form-group">
        <label for="com">Commentaire: </label>
        <textarea name="commentaire" id="com" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Envoyer">
    </div>


</form>


<?php foreach($comments as $comment): ?>
    <div><a href="index.php?action=comment&id=<?= $comment->id ?>"><strong><?= $comment->author ?></strong></a></div>
    <div>le <?= $comment->comment_date_fr ?></div>
    <div><?= nl2br($comment->comment) ?></div>
<?php endforeach; ?>

<?php $content = ob_get_clean() ?>

<?php require("template.php") ?>