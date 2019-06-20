<?php $title="Accueil"?>
<?php $body ="accueil"?>


<?php ob_start()?>
    <div class="box-content">

    <?php if(isset($articles)) :?>
    <?php foreach($articles as $article) : ?>
        <?= "<h1>" . $article["title"] . "</h1>"?>
        <p> <?= $article["content"]?></p>
    </div>
    <p> <?= $article["date_article"]?></p>
<?php endforeach ?>
    <?php else :
        echo "<h1>Erreur</h1>";
    endif ?>

<?php $content= ob_get_clean()?>

<?php require "template.php"?>
