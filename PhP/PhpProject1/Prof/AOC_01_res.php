<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <form action="AOC-01_res.php" method="post">
            <h1>Advent of code J1 - Résulat</h1>
            <h3>Résultat Partie 1:</h3>
            <?php
            $s = $_POST["suite"];
            $tableau = str_split($s);
            $somme = 0;

            for ($i = 0; $i < count($tableau) - 1; $i++) {
                if ($tableau[$i] == $tableau[$i + 1]) {
                    $somme += $tableau[$i];
                }
            }
            if ($tableau[0] == $tableau[count($tableau) - 1]) {
                $somme += $tableau[0];
            }
            ?>
            <h2><?php echo $somme; ?></h2>
            <br><br>
            <h3>Résultat Partie 2:</h3>
            <?php
            $s = $_POST["suite"];
            $tableau = str_split($s);
            $somme = 0;

            $moit=count($tableau)/2;
            
            for ($i = 0; $i < count($tableau); $i++) {
                if ($i<$moit && $tableau[$i] == $tableau[$i + $moit]) {
                    $somme += $tableau[$i];
                }
                if ($i>=$moit && $tableau[$i] == $tableau[$i - $moit]) {
                    $somme += $tableau[$i];
                }
            }
            
            ?>
            <h2><?php echo $somme; ?></h2>
        </form>
    </body>
</html>
