<!DOCTYPE html>
<?php require_once 'Geometrie/Point.php'; ?>
<?php require_once 'Geometrie/Polygone.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //j'instancie un point : je crée un point concret en mémoire 
        //ça s'appelle un objet ou une instance 
        
        $p1=new point(3,600);
//        $p1->setx(3);
//        $p1->sety(6);
        $p2=new point(50,700);
        $p3=new Point(100,90)
//        echo "La distance entre $p1 et $p2 est " . $p1->calculerDistance($p2);
            
        $poly=new Polygone($p1,$p2,$p3, "pink");
        echo "Le périmètre du polygone $poly est de" . $poly->CalculerPerimetre();
        ?>
    </body>
</html>
