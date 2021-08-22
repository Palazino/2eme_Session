<?php

    $listeCategorie = dbListeCategorie();

    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
        if(isset($_GET["deleteCat"]) && $_GET["deleteCat"] == true) {

            $secuCategorieId = htmlspecialchars($_GET["value"]);

            $deleteCategorie = intval($secuCategorieId);

            dbDeleteCategorie($deleteCategorie);

            header("location: ../../src/page/admin.php?choix=listeCategorie");

            exit();
        }

        if(isset($_POST["addCat"]) && $_POST["addCat"] == true) {
    
            $addCategorie = htmlspecialchars($_POST["addCat"]);
    
            dbAddCategorie($addCategorie);

            header("location: ../../src/page/admin.php?choix=listeCategorie");

            exit();
        }
    }

    
    

?>

<table class="listeAdmin">
    <tr>
        <th>
            <h3>Catégories</h3>
        </th>
    </tr>

<?php

    foreach ($listeCategorie as $value) {
?>

    <tr id=catego>
        <td>
            <?=$value["NomCategorie"]?>
        </td> 
         
        <?php
            if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
        ?>
            <td>
            <a href="../../src/page/admin.php?choix=listeCategorie&deleteCat=true&value=<?=$value["categorieArticleId"]?>/#catego" class="btnsupp">&#128163;</a>
            </td>
        <?php
        }
        ?>
    </tr>
    
<?php
    }
?>

    <?php
        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
            
    ?>

    <form action=""  method="post">
        <tr>
            <th>Ajout d'une catégorie</th>
        </tr>
        <tr>
            <td><input type="text" name="addCat" placeholder="Entrez le nom de la catégorie" required></td>
            <td><input type="submit" value="&#10004;"></td>
        </tr>
    </form>

    <?php
        }
    ?>

</table>