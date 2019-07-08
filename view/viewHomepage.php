<?php $title="Accueil"?>
<?php $body ="accueil"?>


<?php ob_start()?>
    <div class="box-content">

    <?php if(isset($article)) :?>
    <?php foreach($article as $lastArticle) : ?>
        <?= "<h1>" . $lastArticle["title"] . "</h1>"?>
        <?= "<p> <span>" . $lastArticle["date_article"] . "</span> </p>"?>
        <p> <?= $lastArticle["content"]?></p>
    </div>
    <p><a href="#">Voir plus</a></p>
<?php endforeach ?>
    <?php else :
        echo "<h1>Erreur</h1>";
    endif ?>

<?php $content= ob_get_clean()?>

<?php require "template.php"?>
