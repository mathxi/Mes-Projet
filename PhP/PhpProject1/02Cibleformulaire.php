<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Affichage tableau</title>
    </head>
    <body>
        <table>
            <tr>
        <?php
        //je lis le champ limite = x de l'url
        $lim=$_POST["limite"]; 
        //je lis le champ colonne = x de l'url
        $col=$_POST["colonne"]; 
        
        
       
        for ($i = 1; $i <= $lim; $i++) {
            echo "<td>$i</td>";


            if ($i % $col == 0) {
                echo "</tr> <tr>";
                
            }
            
        }

        ?>
    </tr>
    </table>

    </body>
</html>
