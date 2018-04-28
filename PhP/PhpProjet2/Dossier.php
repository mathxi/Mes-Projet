<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <?php include "head.php" ?>
        
        
        <title></title>
    </head>
    <body>
        <?php include "Menu.php" ?>
        <?php
        echo"<h1> bienvenu chez les ".$_GET['d']."</h1>";
        ?>
        <?php include "Photo.php" ?>
    </body>
</html>
