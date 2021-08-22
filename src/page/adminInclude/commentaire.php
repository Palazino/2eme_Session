<?php 
    
    if (isset($_GET['id'])) {
        $articleId = $_GET['id'];
    }

    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
            $userId = $_SESSION['user']['id'];
            $pseudo = $_SESSION['user']['login'];
        $commentaire = htmlspecialchars($_POST['commentaire']);
        envoyerCommentaires($articleId,$userId,$commentaire);
    }

    $listeCommentaire = getCommentaireById($articleId);
?>

<section class="comment">
    <table>
        <form action="../../../src/page/article.php?id=<?=$articleId?>#commentaire" method="post">
            <thead>
                <tr>
                    <td>Qu'en penses tu ? <?=$_SESSION['user']['login']?> !</td>
                </tr>
            </thead>
            <tbody>                 
                <tr>
                    <td><textarea name="commentaire" placeholder="Entrez votre commentaire..." required></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Envoyer votre commentaire"></td>
                </tr>
            </tbody>
        </form>
    </table>
</section>

<section class="listeComment">
<?php
    if (isset($listeCommentaire)) {
        foreach ($listeCommentaire as $value) {
            ?>
                <div>
                    <div>
                        <p><?=$value['userId']?> </p>
                    </div>
                    <div>
                        <p><?=$value['contenu']?></p>
                    </div>
                </div>
            <?php
        }
    }
?>
</section>