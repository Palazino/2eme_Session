<?php
    function dbListeCategorie() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM categoriearticle") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeCategorie[] = $donnée;
            
        }
        
        return $listeCategorie;


        $requete->closeCursor();
    }

    function dbListeArticle() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM articles") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeArticle[] = $donnée;
            
        }
        
        return $listeArticle;


        $requete->closeCursor();
    }

    function dbListeUser() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM users u INNER JOIN role r ON r.roleId = u.roleId;") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeUser[] = $donnée;
            
        }
        
        return $listeUser;


        $requete->closeCursor();
    }

    function dbListeCommentaire() {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT users.nom,users.prenom,commentaire.contenu 
                                FROM `commentaire`
                                INNER JOIN users ON commentaire.userId = users.userId") or die (print_r($requete->errorInfo(), true));

        while ($donnée = $requete->fetch()) {

            $listeCommentaire[] = $donnée;
            
        }
        
        return $listeCommentaire;


        $requete->closeCursor();
    }

    function dbDeleteCategorie($deleteCategorie) {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM categoriearticle WHERE categorieArticleId = ?");
        $requete->execute(array($deleteCategorie)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }


    function dbAddCategorie($addCategorie) {
        $bdd = dbAccess();
        $requete = $bdd->prepare("INSERT INTO categoriearticle(NomCategorie) VALUES (?)");
        $requete->execute(array($addCategorie)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }


    function dbDeleteUser($deleteUser) {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM users WHERE userId = ?");
        $requete->execute(array($deleteUser)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }

        
?>