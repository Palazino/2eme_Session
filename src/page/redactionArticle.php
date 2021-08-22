<?php 

    $title = "Rédiger un article";

    require "../../src/common/template.php";
    require "../../src/function/dbAdmin.php";
    require "../../src/function/dbArticle.php";
    require "../../src/function/dbFunction.php";

    $listeTypeArticle = dbListeCategorie();

    // Traitement du formulaire
    if (isset($_POST['titre']) && isset($_FILES['fichier']) && isset($_POST['NomCategorie']) && isset($_POST['contenu'])) {
        $onTop = 0; // par défaut je n'envoie pas à la une
        $titre = $_POST['titre'];
        $imgUrl = $_FILES['fichier']; // Traitement à effectuer dans al requete envoyer article
        $contenu = $_POST['contenu']; // Tel quel
        $categorieArticleId = $_POST['NomCategorie'];
        $auteurId = intval($_SESSION['user']['id']);
        

        // Vérifier si star a été coché
        if (isset($_POST['onTop']) && $_POST['onTop'] == true) {
            $onTop = 1;
        }

        dbSendArticle($titre, $imgUrl, $contenu, $auteurId, $categorieArticleId, $onTop);

    }
?>

<section class="formulaire">
    <div class="buttonTampon">
            <a href="../../src/page/redactionArticle.php?choix=uploaderPhoto">Uploader photo</a> 
            <a href="../../src/page/redactionArticle.php?choix=redigerArticle&liens=memoireTampon">Afficher le tampon</a>
    </div>
    <?php
    if(isset($_GET["choix"]) && $_GET["choix"] == "redigerArticle")
    {
        require "../../src/page/adminInclude/imgTampon.php";
    }
    if(isset($_GET["choix"]) && $_GET["choix"] == "uploaderPhoto")
    {

        require "../../src/page/adminInclude/moduleUploadFichier.php";
    }
    ?>
</section>  

<!-- Formulaire de création d'article -->
<section class="formulaire">
    <form action="" method="post" enctype="multipart/form-data">
        <p>Titre de votre article:</p>
        <input type="text" name="titre" required>
        <p>Image de référence:</p>
        <input type="file" name="fichier" required>
        <table>
            <tr>
                <td>Type d'article</td>
                <td>A la une ?</td>
            </tr>
            <tr>
                <td>
                    <select name="NomCategorie">
                        <option value="">-- Choisisez la catégorie</option>
                    <?php 
                        for ($i=0; $i < count($listeTypeArticle) ; $i++) { 
                        ?>
                            <option value="<?=$listeTypeArticle[$i][1]?>"><?=$listeTypeArticle[$i][1]?></option>
                        <?php
                        }
                    ?>
                    </select>
                </td>
                <td><input type="checkbox" name="onTop"></td>

            </tr>
        </table>
        <p>Composer votre article</p>
        <textarea name="contenu" id="contenu"></textarea>
        <input class="btnTampon" type="submit" value="Envoyez votre article">
    </form>
</section>

<!-- Ajout du script tinymce et activer options -->
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'autolink lists image imagetools media table',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>

<?php

   require "../../src/common/footer.php";

?>