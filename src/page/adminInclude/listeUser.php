<?php

    $listeUser = dbListeUser();

    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
        if(isset($_GET["deleteUser"]) && $_GET["deleteUser"] == true) {

            $secuUserId = htmlspecialchars($_GET["value"]);

            $deleteUser = intval($secuUserId);

            dbDeleteUser($deleteUser);

            header("location: ../../src/page/admin.php?choix=listeUser");

            exit();
        }
    }

?>

<table class="listeAdmin">
    <tr>
        <th>
            <h3>Utilisateurs</h3>
        </th>

        <th>
            <h3>Email</h3>
        </th>

        <th>
            <h3>Role</h3>
        </th>
    </tr>

<?php

    foreach ($listeUser as $value) {
?>

    <tr id=user>
        <td>
            <?=$value["login"]?>
        </td> 

        <td>
            <?=$value["email"]?>
        </td>

        <td>
            <?=$value["nomRole"]?>
        </td>
         
        <?php
            if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin") {
        ?>
            <td>
            <a href="../../src/page/admin.php?choix=listeUser&deleteUser=true&value=<?=$value["userId"]?>/#user" class="btnsupp">💣</a>
            </td>
        <?php
        }
        ?>
    </tr>
    
<?php
    }
?>

</table>