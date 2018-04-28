<?php

function afficherDossier($cheminRelatif) {
    $cheminPhysique = __DIR__ . "/" . $cheminRelatif;
    $contenu = scandir($cheminPhysique);

    if (count($contenu) > 2) {
        echo "<ul>";

        for ($i = 2; $i < count($contenu); $i++) {
            if (is_file($cheminRelatif . "/" . $contenu[$i])) {
                echo "<li><a href='$cheminRelatif/$contenu[$i]'>$contenu[$i]</a></li>";
            }
            
            if (is_dir($cheminRelatif . "/" . $contenu[$i])) {
                echo "<li>$contenu[$i]";
                
                afficherDossier($cheminRelatif . "/" . $contenu[$i]);
                
                echo "</li>";
            }
        }

        echo "</ul>";
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Files Explorer</title>
    </head>
    <body>
        <h1>Affichage des fichiers</h1>
        <?php 
        afficherDossier(".")
        ?>
    </body>
</html>