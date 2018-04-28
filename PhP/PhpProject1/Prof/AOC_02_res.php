<?php

function getMinimum($t) {
    $min = intval($t[0]);
    for ($i = 1; $i < count($t); $i++) {
        if ($min > intval($t[$i])) {
            $min = intval($t[$i]);
        }
    }
    return $min;
}
function getMaximum($t) {
    $max = intval($t[0]);
    for ($i = 1; $i < count($t); $i++) {
        if ($max < intval($t[$i])) {
            $max = intval($t[$i]);
        }
    }
    return $max;
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>

        <h1>Advent of code J2 - Résulat</h1>
        <h2>Résultat Partie 1:</h2>
        <?php
        $s = $_POST["puzzle"];
        //je découpe par ligne (\n c'est un saut de ligne)
        $tableau = explode("\n", $s);
        $somme = 0;

        for ($i = 0; $i < count($tableau); $i++) {
            //maintenant je découpe pour avoir tous les
            //nombre de la ligne
            //\t c'est une tabulation
            $tableau2 = explode("\t", $tableau[$i]);

            //il faut maintenant trouver le min et le max dans
            //$tableau2
            $min = getMinimum($tableau2);
            $max = getMaximum($tableau2);

            $somme += $max - $min;
        }
        ?>

        <h3><?php echo $somme; ?></h3>

    </body>
</html>
