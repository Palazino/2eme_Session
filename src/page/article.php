<?php
    $title = "Article";
    require "../../src/common/template.php";
    require "../../src/function/dbFunction.php";
    require "../../src/function/dbArticle.php";
    require "../../src/function/dbCommentaire.php";
    $ficheArticle = getArticle();
?>

<body>   
    <?php
    // Rechercher l'article correspondant avec le GET[id]
        foreach($ficheArticle as $search){
            // Affiche la structure de l'article si la correspondance est faite
            if($search['articleId'] == $_GET['id']){
                // Affichage de l'article sélectionné
                ?>
                <h1><?php echo($search['titre']);?></h1>
                <h3><?php echo($search['NomCategorie']);?></h3>
                <h3><?php echo($search['auteurNom']);
                          echo("    "); 
                          echo($search['auteurPrenom']);?></h3>
              <div class="Inclass">  
                  <div>       
                        <img src="<?php echo($search['imgUrl'])?>" alt="" width="450px" id="imgArticle">
                  </div>  
                  <div>
                        <h4><?php echo($search['contenu']);?></h4>
                 </div>
             </div> 
                <?php
            }
        }
        if(isset($_SESSION['user']['login'])){
            ?>
            <div class="Commentaire">
                <?php
                    require "../../src/page/adminInclude/commentaire.php";
                 ?>
            </div>
            <?php

        }
    ?>;
    <?php
    require "../../src/common/footer.php";
    
    ?>
</body>