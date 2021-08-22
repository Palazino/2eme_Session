
<?php 
    // Traiter l'envoi du fichier
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
        
        if ($_FILES['fichier']['size'] <= 10000000) {
            $extensionArray = ['png','PNG','gif','GIF','jpg','JPG','jpeg','JPEG','jfif','JFIF'];
            $infoFichier = pathinfo($_FILES['fichier']['name']);
            $extensionImage = $infoFichier['extension'];

            // Extension est autorisée ?
            if (in_array($extensionImage,$extensionArray)) {
                // Préparer le chemin de reception de mon image
                $dossier = '../../src/img/article/'.time().basename($_FILES['fichier']['name']);
                // Envoyer au fichier
                move_uploaded_file($_FILES['fichier']['tmp_name'],$dossier);
                // Indiquer à mon user que l'upload s'est bien passé
                ?>
                <div class="recapUpload">
                    <h4>Envoie du fichier <?=$_FILES['fichier']['name']?> réussi !</h4>
                    <img src="<?=$dossier?>" alt="<?=$_FILES['fichier']['name']?>" class="nouvelUpload">
                </div>
                <?php
                if (isset($_POST['tampon']) && $_POST['tampon'] == 'oui') {
                    $pdo = dbAccess();
                    $requete = $pdo->prepare('INSERT INTO tampon(liens,auteurId) VALUES (?,?)');
                    $requete->execute(array($dossier,$_SESSION['user']['id']));
                    $requete->closeCursor();
                }
            } else {
                header('location: ../../src/pages/articles?choix=uploaderPhoto&error=true&message=extension non autorisée.');
                exit();
            }
        }
    }
?>

<div class="formulaire">
    <form action="" method="post" enctype="multipart/form-data">
    <?php 
        if (isset($_GET['error']) && $_GET['error'] == true) {
    ?>
            <h3><?=$_GET['message']?></h3>
    <?php
        }
    ?>
        <h4>Uploader un fichier</h4>
        <table>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
            <tr>
                <td><input type="file" name="fichier"></td>
            </tr>
            <tr>
                <td>
                    <select name="tampon">
                        <option value="oui">OUI</option>
                        <option value="non">NON</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer image"></td>
            </tr>
        </table>
    </form>
</div>