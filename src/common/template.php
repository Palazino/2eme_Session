<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://html-css-js.com/html/character-codes/icons/">
    <link rel="stylesheet" href="../../src/style/style.css">
    <link rel="stylesheet" href="../../src/style/formulaire.css">
    <link rel="stylesheet" href="../../src/style/account.css">
    <link rel="stylesheet" href="../../src/style/admin.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../src/img/logo.png">
    <title><?=$title?></title> 
    <script src="https://cdn.tiny.cloud/1/3ksskp8qn37ky65qxtaehjx9zg6pxdpfi0tldelpjkmqjiux/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <?php
        require ("nav.php");
    ?>
</body>
</html>