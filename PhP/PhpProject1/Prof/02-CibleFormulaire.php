<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Affichage du tableau</title>
    </head>
    <body>
        <table>
            <tr>
                <?php
                //je lis le champ limite=x de l'url
                $lim=$_POST["limite"];
                //je lis le champ colonnes=x de l'url
                $col=$_POST["colonnes"];
                
                        
                for ($i = 1; $i <= $lim; $i++) {
                    echo "<td>$i</td>";

                    if ($i % $col == 0) {
                        echo "</tr><tr>";
                    }
                }
                ?>
            </tr>
        </table>
    </body>
</html>
