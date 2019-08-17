<?php $title="Blog"?>
<?php $body ="about"?>


<?php ob_start()?>

<?php if(isset($articles)) :?>
    <?php foreach($articles as $article) : ?>
    <div class="box-content">
        <?= "<h1>" . $article["title"] . "<span>  " . $article["date_article"] . "</span> </h1>"?>
        <p> <?= $article["content"]?></p>
    </div>
    <p><a href="blog/chapitre/<?= $article['id_article'] ?>">Voir plus </a></p>

    <?php endforeach ?>
    <?php 
    else:
        echo "<h1>Erreur</h1>";
endif ?>

<?php $content= ob_get_clean()?>

<?php require "template.php"?>