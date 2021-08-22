<?php

function dbRegister ($nom, $prenom, $login, $email, $mdp, $clef, $roleId, $ban) {
    
    $bdd = dbAccess();
    $requete = $bdd->prepare(" INSERT INTO users (nom, prenom, login, email, mdp, clef, roleId, ban) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $requete->execute(array($nom, $prenom, $login, $email, $mdp, $clef, $roleId, $ban)) or die (print_r($requete->errorInfo(), true));
    $requete->closeCursor();
}

function dbCheckRegister ($email, $login) {
    $bdd = dbAccess();

    $requete = $bdd->prepare("SELECT count(*) AS x FROM users WHERE email = ? OR login = ?");
    $requete->execute(array($email, $login)) or die(print_r($requete->errorInfo(), true));
    while($données = $requete->fetch()) {

        if($données["x"] != 0)

        {

                 

            header("location: ../../src/page/register.php?errorAccount=true&msg=Le login ou l'email existe déjà");

            exit();

        }


    }

    $requete->closeCursor();
}

function login($pseudo, $mdp) {

        $bdd = dbAccess();

        $requete = $bdd->query("SELECT * FROM users u INNER JOIN role r ON r.roleId = u.roleId;");

        while($donnees = $requete->fetch()) {   

            if($donnees["login"] == $pseudo) {

                // sel du mdp envoyé avec le sel contenu dans la colonne ban

                $sel = md5($mdp) . $donnees["ban"];

                if($donnees["mdp"] == $sel) {

                    //$_SESSION["connect"] = true;

                    $_SESSION["user"] = [

                        "id" => $donnees["userId"],

                        "nom" => $donnees["nom"],

                        "prenom" => $donnees["prenom"],

                        "login" => $donnees["login"],

                        "email" => $donnees["email"],

                        "role" => $donnees["nomRole"]

                    ];

                    // J'active la session connecté

                    $_SESSION["connecté"] = true;

                    // Je redirige vers la page accueuil

                    header("location: ../../src/page/index.php");

                    exit();

                }

                else {                  

                    header("location: ../../src/page/login.php?erreur=true&msg=Le mot de passe est incorrect!");

                    exit();

                }

            }

        }

        $requete->closeCursor();

        header("location: ../../src/page/login.php?erreur=true&msg=Le pseudo est incorrect!");

        exit();

    }
?>