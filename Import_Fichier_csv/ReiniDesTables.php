<!DOCTYPE html>
<?php
//Préparation avant insertion dans la base de données.
$bdd = new PDO('mysql:host=localhost;dbname=AdminChatBox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $reqReini = $bdd->prepare('DELETE FROM utilisateur');
        $reqReini->execute();
        
        ?>
        <p>Vous avez réinitaliser les tables, voulez vous retournez a la <a href="index.php"> page d'acceuil </a></p>
    </body>
</html>
