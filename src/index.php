<?php
    $title = "Accueil";
    require "./src/common/template.php";
?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/style.css">
    <title><?=$title?></title>
</head>
<body>

<section class="news">
    <div>
        <div class="firstnews">1</div>
        <div>
            <div class="secondnews">2</div>
            <div class="thirdnews">3</div>
        </div>
    </div>
</section>

<section class="corp">
    <div class="listecategorie">
        <a href="#">Vlog</a>
        <a href="#">Actualités</a>
        <a href="#">Cinéma</a>
        <a href="#">Gaming</a>
        <a href="#">Event</a>
    </div>
    <div class="allart">
        <div class="article"><a href="./src/page/article.php">1</a></div>
        <div class="article">2</div>
        <div class="article">3</div>
        <div class="article">4</div>
        <div class="article">5</div>
        <div class="article">6</div>
    </div>
</section>

<?php
    require "./src/common/footer.php"
?>
</body>
</html>