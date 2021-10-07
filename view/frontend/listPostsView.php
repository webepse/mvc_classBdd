<?php $title = 'Mon Blog'; ?>

<?php ob_start(); ?>

<h1>Mon super Blog!</h1>
<p>Derniers billets du blog : </p>
<?php var_dump($posts); ?>
<?php foreach($posts as $post): ?>
    <div class="news">
        <h3>
            <a href="<?= $post->getURL() ?>"><?= $post->title; ?> </a>
            <em>le <?= $post->creation_date_fr ?></em>
        </h3>
        <p>
            <?= $post->getExtrait() ?>
        </p>
    </div>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>