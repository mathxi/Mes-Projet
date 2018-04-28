<?php include_once 'Geometrie/Point.php'; ?>
<?php include_once 'Geometrie/Polygone.php'; ?>
<?php include_once 'Geometrie/Triangle.php'; ?>
<?php include_once 'Geometrie/Quadrilatere.php'; ?>
<?php include_once 'config.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Triangles</title>
        <?php include_once 'bootsrap.php'; ?>
    </head><div id="abineFillElement"></div>
    <body>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;;"> <div="">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">PHP POO - Geometrie</a>
                </div>
        <div class="container">
            
        </nav>

        <h1>Liste des Triangles</h1>

        <table class="table">
            <tbody><tr>
                <th>id</th>
                <th>Triangle</th>
                <th>Voir</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
                <?php 
                    $polys = Triangle::getTriangles();
                        
                    foreach ($polys as $id => $poly) {
                        //On ce connecte à la base de donnée afin de récupérer l'id du polygone auquel les points sont liés
                        $db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                         , Config::USER, Config::PASSWORD);
                        $req=$db->prepare("SELECT id from polygones");
                        $req->execute();
                        $resultid=$req->fetchAll();
                        $idTriangle= $resultid[$id]['id'];
                    //On créer la ligne du tableau correspondant au polygone.
                    echo "<tr><td> ".$idTriangle."</td>";
                    echo "<td> $poly </td>";
                    echo '<td><a href="voirTriangle.php?id='.$idTriangle.'" class="btn btn-primary glyphicon glyphicon-play"></a></td>';
                    echo '<td><a href="modifierTriangle.php?id='.$idTriangle.'"class="btn btn-success glyphicon glyphicon-pencil"></a></td>';
                    echo '<td><a onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce triangle ?\')" href="supprimerTriangle.php?id='.$idTriangle.'" class="btn btn-danger glyphicon glyphicon-remove"></a></td></tr>';
                    }
                    //Pour des raisons de sécurité on met la varibale bd a null.
                    $bd =null;
                ?>   
            </tbody></table>
         <a href="nouveauTriangle.php" class="btn btn-primary">Nouveau triangle</a>

            </div>
        <hr>
        <div class="container">&copy; PRIOU Dylan CORFA Sylouan MALARD Davy PARRA Adrien 2017</div>
    </body>
</html>

