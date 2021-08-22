<?php

function dbAccess () {
    try {
        static $bdd;

        $bdd = new PDO("mysql:host=localhost;dbname=blog_youtube;charset=utf8", "root","");
        
        if (!$bdd){

        throw new Exception("\nPDO::errorInfo():\n", 1);

        return false;

    } 
        return $bdd;

    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
    }
}

?>