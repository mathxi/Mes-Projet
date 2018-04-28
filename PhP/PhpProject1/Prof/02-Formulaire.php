<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire simple</title>
    </head>
    <body>
        <form method="post" action="02-CibleFormulaire.php">
            <table>
                <tr>
                    <th>Nombre limite</th>
                    <td>
                        <input type="number" min="1"
                               max="1000" required name="limite">
                    </td>
                </tr>
                <tr>
                    <th>Nombre de colonnes</th>
                    <td>
                        <input type="number" min="1"
                               max="1000" required name="colonnes">
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
