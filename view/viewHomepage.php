<?php $title="Accueil"?>
<?php $body ="accueil"?>


<?php ob_start()?>
    <div class="box-content">

    <?php if(isset( $lastArticle)) :?>
    <?php foreach( $lastArticle as $lastArt) : ?>
        <?= "<h1>" . $lastArt["title"] . "</h1>"?>
        <?= "<p> <span>" . $lastArt["date_article"] . "</span> </p>"?>
        <p> <?= $lastArt["content"]?></p>
    </div>
    <p><a href="#">Voir plus</a></p>
<?php endforeach ?>
    <?php else :
        echo "<h1>Erreur</h1>";
    endif ?>

<?php $content= ob_get_clean()?>

<?php require "template.php"?>
