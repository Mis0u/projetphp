<?php $title =" L'auteur ";
 $body = "about"?>

<?php ob_start()?>
<div class="autor-content">
    <div class="about">
    <blockquote>
        <p>
            Ne demandez jamais quelle est l'origine d'un homme ; interrogez plutôt sa vie et vous saurez ce qu'il est.
        </p>
        <footer>—Jean Forteroche, <cite>Acteur et écrivain à succés</cite></footer>
    </blockquote>
    </div>
</div>
<div class="blog-about">
    <h1>De quoi parle ce blog ?</h1>
    <p>Ce blog parle de mon nouveau livre intitulé <strong>Un billet pour l'Alaska</strong>.
        Tout les mois j'y publie mes chapitres jusqu'à la dernère parution.</p>
    <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, repellat rem eum, impedit vero corporis id ratione aliquid, ex facere fugit amet voluptas ducimus aliquam maxime aut iste. Incidunt, animi?
    Numquam eaque molestias nisi, quis dolorum nobis minima ipsa rerum quasi voluptates odit a voluptate corporis distinctio pariatur beatae aliquid maxime nam aperiam fugit, eligendi sed? Illum quia architecto autem.
    Accusantium dicta voluptatem error suscipit, quaerat repudiandae eum explicabo reprehenderit veniam natus, animi doloribus ipsa harum reiciendis rerum! Sequi illo minima consequuntur in commodi tenetur repellendus fugit. Ad, officia porro?
    </p>
    <p><a href="#">Découvrez les chapitres...</a></p>
</div>

<?php $content = ob_get_clean()?>

<?php require "template.php" ?>