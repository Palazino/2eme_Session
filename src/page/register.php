<?php
    $title = "Register";
    require "../../src/common/template.php";
    require "../../src/function/function.php";
    require "../../src/function/dbLogin.php";
    require "../../src/function/dbFunction.php";
 
    if (isset($_SESSION["mdpFalse"]) && $_SESSION["mdpFalse"] == true){

         $mdpFalse = $_SESSION["mdpFalse"];
         $_SESSION["mdpFalse"] = false;
        
     } else {
         $mdpFalse = false;    
     }

    
    if(isset($_POST["prenom"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp2"])) {
        

        $option = array(

            "prenom" => FILTER_SANITIZE_STRING,
            "nom" => FILTER_SANITIZE_STRING,
            "pseudo" => FILTER_SANITIZE_STRING,
            "email" => FILTER_VALIDATE_EMAIL,
            "mdp" => FILTER_SANITIZE_STRING,
            "mdp2" => FILTER_SANITIZE_STRING

        );
        
        $result = filter_input_array(INPUT_POST, $option);

        $prenom = $result["prenom"];
        $nom = $result["nom"];
        $login = $result["pseudo"];
        $email = $result["email"];
        $mdp = $result["mdp"];
        $mdp2 = $result["mdp2"];
        $clef = 0;
        $roleId = 3;

        if ($mdp == $mdp2) {
            //hash du mdp
            $mdpHash = md5($mdp);
            //générée grain de sel
            $sel = grainDeSel(rand(5,20));
            // mdp envoyer
            $mdpToSend = $mdpHash . $sel;

            $mdpFalse = false;
            
        } else {

              // booleen de controle

              $mdpFalse = true;

              // J'active une session pour dire que les mdp sont pas correct
  
              $_SESSION["mdpFalse"] = true;
  
              // recharger ma page
  
              header("location: ../../src/page/register.php");
  
              exit();

            /* //boolen de controle
            // $mdpfalse = true;
            // j'active une session pour dire que les mdp sont pas correct
            $_SESSION["mdpfalse"] = true;
            //recharger ma page
            header("location: ../../src/page/register.php?error=true&msg=Le mot de passe est incorrect");
            exit(); */

        }
        
        dbCheckRegister($email, $login);

        
        
        /* $bdd = dbAccess();
        $requete = $bdd->prepare("SELECT COUNT (*) AS x FROM users WHERE email = ? OR login = ? ");
        $requete->execute(array($email, $login)) or die (print_r($requete->errorInfo(), true));

        while($result = $requete->fetch()) {

            if ($result["x"] != 0) {

                $accountExist = true;
                
                header("location: ../../src/page/register.php?errorAccount=true&message=Le login et/ou l'email existe déja.");

                exit();
            }
        } */

        dbRegister($nom, $prenom, $login, $email, $mdpToSend, $clef, $roleId, $sel);

        header("location: ../../src/page/login.php");

        exit();

    } else {
    

?>


<body>

<section class="formulaire">
    <form action="" method="post" enctype="multipart/form-data">

        <?php 

            if($mdpFalse == true)

            {
    
                echo "<h2>Les mots de passe ne sont pas identique.</h2>";
    
                $mdpFalse = false;
            }

            if(isset($_GET["errorAccount"]) && $_GET["errorAccount"] == true) {

                echo "<h2>" . $_GET["msg"] . "</h2>";
            }

            

        
           /*  if (isset($_GET["error"]) && $_GET["error"] == true) {
                echo "<h2>".$_GET['msg']."</h2>";
            } */
        ?>
        <table>
            <thead>
                <tr>
                    <th>Enregistrez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="prenom" require placeholder="Ex: Joseph"></td>
                </tr>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="nom" require placeholder="Ex: Joestar"></td>
                </tr>
                <tr>
                    <td>Pseudo : </td>
                    <td><input type="text" name="pseudo" require placeholder="Ex: JoJo234"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" require placeholder="Exemple@email.com"></td>
                </tr>
                <tr>
                    <td>Mot de passe : </td>
                    <td><input type="password" name="mdp" require placeholder="Ne le divugler a personne !"></td>
                </tr>
                <tr>
                    <td>Mot de passe : </td>
                    <td><input type="password" name="mdp2" require placeholder="Retapez votre mot de passe."></td>
                </tr>
<!--                 <tr>
                    <td>Uploader un avatar: </td>
                    <td><input type="file" name="avatar"></td>
                </tr> -->
                <tr>
                    <td><input type="submit" value="Création du compte" class="send"></td>
                </tr>       
            </tbody>
        </table>
    </form>
</section>

<?php
        }
    require "../../src/common/footer.php"
?>
</body>
