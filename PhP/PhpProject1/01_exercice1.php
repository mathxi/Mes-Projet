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
        <style>
            table{border-collapse : collapse;}
            td{margin:0; padding: 3px; border:1px solid black;}
        </style>
    </head>
    <body>
        <?php
        $boucle = 1;
        echo '<table>';
        echo " <tr>";
        while ($boucle < 9) {
            echo "<td>$boucle</td>";
            $boucle++;
        }
        echo "</table>";
        echo " </tr>";

        echo "<br>";
        echo "<br>";
        echo "<br>";





        echo '<table>';
        echo " <tr>";
        for ($boucle2 = 1; $boucle2 < 9;) {
            echo "<td>$boucle2</td>";

            if ($boucle2 == 4) {
                echo "</tr> <tr>";   //pour faire un saut de ligne ferme 
                //et rouvrir tableau 
            }
            $boucle2++;
        }

        echo " </tr>";
        echo "</table>";

        echo "<br>";
        echo "<br>";


        
        echo '<table>';
        echo " <tr>";
        for ($boucle3 = 1; $boucle3 < 201;) {
            echo "<td>$boucle3</td>";


            if ($boucle3 %4 == 0) {
                echo "</tr> <tr>";
                $boucleRetour = 0;
            }
            $boucleRetour++;
            $boucle3++;
        }

        echo " </tr>";
        echo "</table>";
        /*
          <table>
          <tr>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>4</td>
          <td>5</td>
          <td>6</td>
          <td>7</td>
          <td>8</td>
          </tr>
          </table>
         */
        ?>
    </body>
</html>
