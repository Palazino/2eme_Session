<?php 

    require "./src/function/dbFunction.php";
    require "./src/function/dbArticle.php";

    $listeArticle = getArticle();
    $listeArticleOnTop = getArticleOnTop();

?>

<section class="news">
    <div>
        <div class="firstnews" style="background: url(<?=$listeArticleOnTop[0]['imgUrl']?>) center center/cover;">
            <a href="../../src/page/article.php?id=<?=$listeArticleOnTop[0]['articleId']?>" class="newsontop"><?=$listeArticleOnTop[0]['titre']?></a>            
        </div>

        <div>
        <div class="secondnews" style="background: url(<?=$listeArticleOnTop[1]['imgUrl']?>) center center/cover;">
            <a href="../../src/page/article.php?id=<?=$listeArticleOnTop[1]['articleId']?>" class="newsontop"><?=$listeArticleOnTop[1]['titre']?></a>            
        </div>

        <div class="thirdnews" style="background: url(<?=$listeArticleOnTop[2]['imgUrl']?>) center center/cover;">
            <a href="../../src/page/article.php?id=<?=$listeArticleOnTop[2]['articleId']?>" class="newsontop"><?=$listeArticleOnTop[2]['titre']?></a>            
        </div>
        </div>
    </div>
</section>

<section class="corp">
    <div class="allart">
        <?php foreach ($listeArticle as $value) {
            $titreRaccourci = substr($value['titre'], 0, 50);
            $contenuRaccourci = substr($value['contenu'], 0, 50) . '...';
        ?>
            <div class="art">
                <div>
                    <img src="<?=$value['imgUrl']?>" alt="<?=$titreRaccourci?>" class="imgArticle">
                </div>
                <div>
                    <a href="../../src/page/article.php?id=<?=$value['articleId']?>"><h2><?=$titreRaccourci?></h2></a>
                    <p><?=$contenuRaccourci?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>