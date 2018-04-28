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
        $req = $bdd->prepare('DELETE utilisateur FROM utilisateur LEFT OUTER JOIN '
                . '(SELECT MIN(id) as id, identifiant '
                . 'FROM utilisateur group by identifiant ) '
                . 'AS table_1 ON utilisateur.id=table_1.id WHERE table_1.id IS NULL');
            $req->execute()
                    
        ?>
        <h1>Les doublons ont été supprimé de la base de donnée, voulez vous retournez a <a href="index.php">l'acceuil</a> ?</h1>
    </body>
</html>
