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

<?php $content = ob_get_clean() ?>

<?php require("template.php") ?>