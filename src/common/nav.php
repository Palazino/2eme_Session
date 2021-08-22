<?php
    if(isset($_GET["deconnect"]) && $_GET["deconnect"] == true) {

        $_SESSION["connecté"] = false;
        session_destroy();

        header("location: ./index.php");
        exit();
    }
?>

<nav>
    <div id="acceuil">
        <a href="../../index.php">Acceuil</a>
    </div>
    


    <div class="menu">
        <?php
            if(!isset($_SESSION["connecté"]) ||  $_SESSION["connecté"] == false) {

        ?>
            <ul>
                <li><a href="../../src/page/login.php">Login</a></li>
            </ul>
        <?php

            }

            if(isset($_SESSION["connecté"]) &&  $_SESSION["connecté"] == true) {
        ?>


                <ul>
                    <!-- Lien vers account a faire /!\ -->
                    <li><a href="../../src/page/account.php">Mon compte</a></li>
                    <?php
                        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Modérateur" || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
                            ?>
                        <li><a href="../../src/page/redactionArticle.php">Rediger article</a></li>
                        <?php
                        }
                        ?>

<?php
                        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Modérateur" || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
                            ?>
                        <li><a href="../../src/page/admin.php">Administration</a></li>
                        <?php
                        }
                        ?>
                        <li><a href="../../index.php?deconnect=true">Disconnect</a></li>
                </ul>
        <?php
            }

        ?>

    </div>
</nav>