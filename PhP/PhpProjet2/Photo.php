        <?php 
        $dossierrelatif=$_GET['d'];
        
        $dossierphysique=__DIR__."/Eleves/".$dossierrelatif;
        
        $contenu= scandir($dossierphysique);
        echo"<div class='row'>";
        for ($i = 2; $i < count($contenu); $i++){
            if(is_file($dossierphysique."/".$contenu[$i])){
                echo"<div class='col-xs-6 col-md-3'>";
                echo"<a href='#' class='thumbnail' title=''>";
                echo"<img src='Eleves/$dossierrelatif/$contenu[$i]' >";  //class='img-thumbnail'
            echo"</a> </div>";
            }
                
                
}
        echo "</div>";
        ?>
