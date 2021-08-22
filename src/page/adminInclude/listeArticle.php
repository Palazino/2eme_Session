<?php

    $listeArticle = dbListeArticle();

?>

<div class="listeAdmin">
    <table border="1">
        <th>TITRE</th>
        <th>URL IMAGE</th>
        <th>CONTENU</th>
        
    <?php
        foreach ($listeArticle as $value) {

            echo "<tr><td> " . $value["titre"] . " </td><td> ". $value["imgUrl"] ."</td><td>". $value["contenu"] ."</td></tr>";
        }
    ?>
        
    </table>
</div>