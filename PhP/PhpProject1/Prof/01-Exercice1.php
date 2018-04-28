<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table{border-collapse: collapse;}
            td{
                margin:0; 
                padding:3px; 
                border:1px solid black;
            }
        </style>    
    </head>
    <body>
        <table>
            <tr>
                <?php
                for ($i = 1; $i < 9; $i++) {
                    echo "<td>$i</td>";
                }
                ?>
            </tr>
        </table>
        <p></p>
        <table>
            <tr>
                <?php
                for ($i = 1; $i < 9; $i++) {
                    if ($i == 5) {
                        echo "</tr><tr>";
                    }
                    echo "<td>$i</td>";
                }
                ?>
            </tr>
        </table>
        <p></p>
        <table>
            <tr>
                <?php
                $tours = 0;
                for ($i = 1; $i <= 200; $i++) {
                    $tours++;
                    echo "<td>$i</td>";

                    if ($tours == 4) {
                        echo "</tr><tr>";
                        $tours = 0;
                    }
                }
                ?>
            </tr>
        </table>
        <p></p>
        <table>
            <tr>
                <?php
                for ($i = 1; $i <= 200; $i++) {
                    echo "<td>$i</td>";

                    if ($i % 4 == 0) {
                        echo "</tr><tr>";
                    }
                }
                ?>
            </tr>
        </table>
    </body>
</html>
