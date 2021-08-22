<?php
    $title = "Login";
    require "../../src/common/template.php";
    require "../../src/function/dbLogin.php";
    require "../../src/function/dbFunction.php";

    if(isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {

    login($_POST["pseudo"], $_POST["mdp"]);

    }

?>


<body>

<section class="formulaire">
    <form action="" method="post" class="login">
        <?php
        if(isset($_GET["erreur"]) && $_GET["erreur"] == true) {
            echo "<h2>" . $_GET["msg"] . "</h2>";
        }

        ?>
        <table>
            <thead>
                <tr>
                    <th>Identifiez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pseudo: </td>
                    <td><input type="text" name="pseudo" require placeholder="Entrez votre pseudo"></td>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><input type="password" name="mdp" require placeholder="Entrez votre mot de passe"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Login" class="send"></td>
                </tr>
            </tbody>
        </table>
    </form>

    <p>Si vous ne possèdez pas de compte, vous pouvez vous en crée un <a href="../../src/page/register.php">ici</a></p>
</section>

<?php
    require "../../src/common/footer.php"
?>
</body>
