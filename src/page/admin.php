<?php
     $title = "Admin";
    require "../../src/common/template.php";
    require "../../src/function/dbFunction.php";
    require "../../src/function/dbAdmin.php";

?>




<div class="admin">

    <div class="buttonadmin">
        <h3><a href="../../src/page/admin.php?choix=listeCategorie">Gérer les catégories</a></h3>
    </div>

    <div class="buttonadmin">
        <h3><a href="../../src/page/admin.php?choix=listeArticle">Gérer les articles</a></h3>
    </div>

    <div class="buttonadmin">
        <h3><a href="../../src/page/admin.php?choix=listeUser">Gérer les utilisateurs</a></h3>
    </div>

    <div class="buttonadmin">
        <h3><a href="../../src/page/admin.php?choix=listeComment">Gérer les commentaires</a></h3>
    </div>

</div>

<div>
    <?php
        if(isset($_GET["choix"]) && $_GET["choix"] ==  "listeCategorie") {

            require "../../src/page/adminInclude/listeCategorie.php";
        }
    ?>
</div>

<div>
    <?php
        if(isset($_GET["choix"]) && $_GET["choix"] ==  "listeArticle") {

            require "../../src/page/adminInclude/listeArticle.php";
        }
    ?>
</div>

<div>
    <?php
        if(isset($_GET["choix"]) && $_GET["choix"] ==  "listeUser") {

            require "../../src/page/adminInclude/listeUser.php";
        }
    ?>
</div>

<div>
    <?php
        if(isset($_GET["choix"]) && $_GET["choix"] ==  "listeComment") {

            require "../../src/page/adminInclude/listeComment.php";
        }
    ?>
</div>

<?php
    require "../../src/common/footer.php"
?>
