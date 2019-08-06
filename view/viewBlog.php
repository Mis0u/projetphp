<?php $title="Blog"?>
<?php $body ="about"?>


<?php ob_start()?>

<?php if(isset($articles)) :?>
    <?php foreach($articles as $fixture) : ?>
    <div class="box-content">
        <?= "<h1>" . $fixture["title"] . "<span>  " . $fixture["date_article"] . "</span> </h1>"?>
        <p> <?= $fixture["content"]?></p>
    </div>
    <p><a href="article/<?= $fixture['id_article'] ?>">Voir plus </a></p>

    <?php endforeach ?>
    <?php 
    else:
        echo "<h1>Erreur</h1>";
endif ?>

<?php $content= ob_get_clean()?>

<?php require "template.php"?>