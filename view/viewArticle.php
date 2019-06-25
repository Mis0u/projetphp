<?php

$title = "Article";
$body = "about article";

ob_start(); ?>
<div class="article">
    <h1> <?= $article["title"] . $article["date_article"]; ?> </h1>

    <p> <?= $article["content"] ; ?> </p>
</div>
<?php foreach($comments as $comment): ?>
    <div class="comments">
    <h1> <?= $comment["author"] . $comment["date_comm"] ?> </h1>
    <p> <?= $comment["content"] ?> </p>
    <?php endforeach ?>

<?php $content = ob_get_clean() ?>

<?php require "template.php" ?>