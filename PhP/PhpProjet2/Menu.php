        <nav class="navbar-default navbar-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Gestion des Elèves</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!--                        <li class="active"><a href="#">Home</a></li>
                                                <li><a href="#about">About</a></li>
                                                <li><a href="#contact">Contact</a></li>-->
                        <?php
                        // on va lister les dossiers dans /Eleves
                        //scandir renvoie un tableau des éléments dans le dossier 
                        //physique spécifié
                        $dossiers = scandir(__DIR__.'/Eleves');
                        
                        for ($i = 2; $i < count($dossiers); $i++) {
                            if(is_dir(__DIR__.'/ELeves/'.$dossiers[$i])){               //POur avoir uniquement les dossier et pas les fichier en plus car il fait pas de distinction            
                            
                            echo"<li><a href='Dossier.php?d=$dossiers[$i]'>$dossiers[$i]</a></li>";
                            }
                            
                        }
                        ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>