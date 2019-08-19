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
           for ($i = 1; $i <= $nbPages; $i++):
                   echo '<a href="?page=' .$i. '">' .$i. '</a>';
            endfor ?>
       
</div>
<?php $content = ob_get_clean() ;

require "template.php" ?>