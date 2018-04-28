<?php include_once'config.php';
	
	$couleur = $_POST['couleur'];
	$id = $_POST['id'];

	$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);

		$req1=$db->prepare("UPDATE polygones SET couleur = :couleur where id=:id");
		$req1->bindParam(":couleur",$couleur);
		$req1->bindParam(":id",$id);
		$req1->execute();

		$idPoints= $db->prepare("SELECT id FROM points where idPolygone=:id");
		$idPoints->bindParam(":id",$id);
		$idPoints->execute();
		$idP = $idPoints->fetchAll();
			
		$i = 1;
		while ($i <= 3) {
			$x = $_POST['x'.$i.''];
			$y = $_POST['y'.$i.''];
			$req3=$db->prepare("UPDATE points SET X = :x , Y = :y where id=:idPts");
    	    $req3->bindParam(":x",$x);
    	    $req3->bindParam(":y",$y);
    	    $j=$i-1;
    	    $req3->bindParam(":idPts",$idP[$j][0]);
    	    $req3->execute();
			$i++;
		}
		$db = null;
  		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

     
?>