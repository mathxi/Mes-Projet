<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire simple</title>
    </head>
    <body>
        <form method="POST" action="02Cibleformulaire.php">
              
            
        <table>
            <tr>
                <th>Nombre Limite </th>
                <td>
                    <input type="number" min="1" max="1000" required
                           name="limite">
                </td>
            </tr>
            <tr>
                <th>Nombre de colonne </th>
                <td>
                    <input type="number" min="1" max="1000" required
                           name="colonne">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="OK">
                </td>
            </tr>
        </table>
        </form>
        
    </body>
</html>
