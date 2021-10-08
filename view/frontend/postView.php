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
<?php foreach($comments as $comment): ?>
    <div><a href="index.php?action=comment&id=<?= $comment->id ?>"><strong><?= $comment->author ?></strong></a></div>
    <div>le <?= $comment->comment_date_fr ?></div>
    <div><?= nl2br($comment->comment) ?></div>
<?php endforeach; ?>

<?php $content = ob_get_clean() ?>

<?php require("template.php") ?>