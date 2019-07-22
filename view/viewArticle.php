<?php

$title = "Article";
$body = "about article";

ob_start()?>
<div class = "article">
                <div class="box-article">
                        <?= "<h1>" . $displayArticle["title"] . "<span>  " . $displayArticle["date_article"] . "</span> </h1>"?>
                        <p> <?= $displayArticle["content"]?></p>
                </div>
        <?php foreach ($displayComments as $comment):?>
                <div class = "box-comments">
                        <?= "<h1>" . $comment["author"] . "<span>  " . $comment["date_comm"] . "</span> </h1>"?>
                        <p> <?= $comment["content"]?></p>
                </div>
        <?php endforeach ; ?>

</div>

<div class = "pagination">
        <?php 
        echo "Pages :";
        for ($i = 1; $i <= $nbPages; $i++){
                echo '<a href="/blog?article&id='.$displayArticle["id_article"].'&page='.$i.'"> '.$i.'</a>';
        }
        ?>
</div>
<?php $content = ob_get_clean() ;

require "template.php" ?>