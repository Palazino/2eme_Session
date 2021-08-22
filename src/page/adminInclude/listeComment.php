<?php

    $listeCommentaire = dbListeCommentaire();

?>

<div class="listeAdmin">
<table border="1">
    <th>PRENOM</th>
    <th>NOM</th>
    <th>COMMENTAIRE</th>
    </th>
    <?php
        foreach ($listeCommentaire as $value) {

            echo "<tr><td> " . $value["nom"] . "</td><td>". $value["prenom"] ."  </td><td>". $value["contenu"] ." </td></tr>";
        }
    ?>
</table>
</div>