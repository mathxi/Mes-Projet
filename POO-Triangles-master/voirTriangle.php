<?php include_once'config.php';
	
	$id = $_GET['id'];

	$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);

		//On vient récupérer les données correspondant a l'id du polygone transmi via la méthode _GET['id']
		$req1=$db->prepare("SELECT x from points where idPolygone=:id");
		$req1->bindParam(":id",$id);
		$req1->execute();
		$resultx=$req1->fetchAll();

		$req2=$db->prepare("SELECT y from points where idPolygone=:id");
		$req2->bindParam(":id",$id);
		$req2->execute();
		$resulty=$req2->fetchAll();

		$req3=$db->prepare("SELECT couleur from polygones where id=:id");
		$req3->bindParam(":id",$id);
		$req3->execute();
		$resultcouleur=$req3->fetchAll();
		// On met $db à null pour des raisons de sécurité
		$db= NULL;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Canvas Triangle</title>
	<script type="text/javascript">
		function dessiner() {
  			var canevas = document.getElementById('Triangle');
  			if (canevas.getContext) {
  				// On indique le contexte du dessins ici un dessin 2D car on utilise 2 coordonnées x et y
   				var ctx = canevas.getContext('2d');

   				//création d'un triangle filaire
    			ctx.beginPath();
    			// Coordonnée x1 et y1 correspondant au polygone d'id = _GET['id'], c'est le point d'origine qui sera utilisé par le canvas
   				ctx.moveTo(<?php echo $resultx[0][0]?>, <?php echo $resulty[0][0]?>);
   				// Coordonnée x2 et y2 correspondant au polygone d'id = _GET['id'], dessine une ligne du point d'origine jusqu'aux coodonnées indiqués ci-dessous 
    			ctx.lineTo(<?php echo $resultx[1][0]?>, <?php echo $resulty[1][0]?>);
    			// Coordonnée x3 et y3 correspondant au polygone d'id = _GET['id'], dessine une ligne du point d'origine jusqu'aux coodonnées indiqués ci-dessous 
    			ctx.lineTo(<?php echo $resultx[2][0]?>, <?php echo $resulty[2][0]?>);
    			// closePath vient fermer le triangle
    			ctx.closePath();
    			//Coloration de la forme avec la couleur enregistré dans la base de données 
    			ctx.strokeStyle = <?php echo"'".$resultcouleur[0][0]."'" ?>;
    			//On vient dessiner le triangle
    			ctx.stroke();
  			}
		}
	</script>
	<!-- On affiche une bordure afin de voir les limites du canvas -->
	<style type="text/css">canvas {border: 1px solid black; }</style>
	<?php include_once 'bootsrap.php'; ?>
</head>
<!-- Lorsque la page a fini de charger on execute la fonction dessiner() -->
<body onload="dessiner();">
	<nav class="navbar navbar-light" style="background-color: #e3f2fd;;"> <div="">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">PHP POO - Geometrie</a>
                </div>
        <div class="container">
            
        </nav>
	<!-- La taille du canvas est de 1000x1000 car dans index.php nous avons défini que les valeurs des points du triangles sont comprisent entre 0 et 1000 -->
	<canvas id="Triangle" width="1000" height="1000"></canvas>
	<div class="container">&copy; PRIOU Dylan CORFA Sylouan MALARD Davy PARRA Adrien 2017</div>
</body>
</html>


