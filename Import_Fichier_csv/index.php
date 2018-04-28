<!DOCTYPE html>

<?php
//Préparation avant insertion dans la base de données.
$bdd = new PDO('mysql:host=localhost;dbname=AdminChatBox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
?>


<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <h1>Voilà easy ton exercice test ! Il y a juste a appuyer sur des liens :)</h1>
        
        
        
        <ul>    
            <li>
                    <a href="ReiniDesTables.php"> Réinitialisation des tables</a>
            </li>    

            <li>
                    <a href="InsertCSVTest.php">Réinitialisation des tables et insertion du fichier test</a>
            </li>

            <li>
                    <a href="InsertCSV.php" >Réinitialisation des tables insertion du fichier CSV dans la base de donée</a>
            </li>

            <li>
                    <a href="SuppDoublon.php">Suppression des doublons dans la base de donnée</a>
            </li>
        </ul>
        
        <h4>(non je déconne stp met moi une bonne note :'(   )</h4>    
        <img src="https://www.qcunbon.fr/uploads/images/toulouse/12004008_1616628905267043_8305219609784678397_n-20.jpg" >







    </body>
</html>
