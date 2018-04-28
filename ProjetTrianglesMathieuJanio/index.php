<?php
$titre = "Liste des Triangles";

include_once 'header.php';
?>

<h1><?php echo $titre ?></h1>

<?php
$triangles = Triangle::getTriangles();
?>
<table class="table">
    <tr>
        <th>id</th>
        <th>Triangle</th>
        <th></th>
    </tr>

    <?php
    foreach ($triangles as $tri) {
        ?>
        <tr>
        
            <td>
                <?php 
                $idTriangle=$tri->getId();
                echo $tri->getId(); 
                ?>
            </td>
            <td><?php echo $tri ?></td>
            <td>
                <form>
                <?php echo"<a href='modifierTriangle.php?id=$idTriangle' class='btn btn-primary'>Modifier triangle</a>" ?>
                    <?php echo"<a href='supprimerTriangle.php?id=$idTriangle' class='btn btn-primary' style='background-color:red'   >X</a>" ?>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="nouveauTriangle.php" class="btn btn-primary">Nouveau triangle</a>

<h1>SVP soyez indulgent j'étais tout seul</h1> <img src='https://media2.giphy.com/media/3oz8xWrNol65TMrc1a/giphy.gif' />
<img src='https://media0.giphy.com/media/I1nwVpCaB4k36/giphy.gif' />

<?php

include_once 'footer.php';
