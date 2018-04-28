<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nouveau Triangle</title>
        <?php include_once 'bootsrap.php'; ?>
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;;"> <div="">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">PHP POO - Geometrie</a>
                </div>
        <div class="container">
            
        </nav>
        <div class="container">

<h1>Nouveau Triangle</h1>
<hr>
<form action="nouveauTriangle_action.php" method="post" class="form-horizontal">
            <h3>Point 1</h2>
            <div class="form-group">
                <label for="x1" class="control-label col-sm-2">X</label>
                <div class="col-sm-3">
                    <input required type="number" min="0" max="1000" step="1" name="x1" id="x1"
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="y1" class="control-label col-sm-2">Y</label>
                <div class="col-sm-3">
                    <input required type="number" min="0" max="1000" step="1" name="y1" id="y1"
                           class="form-control">
                </div>
            </div>
                <h3>Point 2</h2>
            <div class="form-group">
                <label for="x2" class="control-label col-sm-2">X</label>
                <div class="col-sm-3">
                    <input required type="number" min="0" max="1000" step="1" name="x2" id="x2"
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="y2" class="control-label col-sm-2">Y</label>
                <div class="col-sm-3">
                    <input required type="number" min="0" max="1000" step="1" name="y2" id="y2"
                           class="form-control">
                </div>
            </div>
                <h3>Point 3</h2>
            <div class="form-group">
                <label for="x3" class="control-label col-sm-2">X</label>
                <div class="col-sm-3">
                    <input required type="number" min="0" max="1000" step="1" name="x3" id="x3"
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="y3" class="control-label col-sm-2">Y</label>
                <div class="col-sm-3">
                    <input required type="number" min="0" max="1000" step="1" name="y3" id="y3"
                           class="form-control">
                </div>
            </div>
                <h3>Couleur</h3>
        <div class="form-group">
            <label for="couleur" class="control-label col-sm-2"></label>
            <div class="col-sm-3">
                <input type="color" class="form-control" id="couleur" name="couleur">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <a href="index.php" class="btn btn-default">annuler</a>
                    
                <input type="submit" class="btn btn-primary" value="enregistrer">
            </div>
        </div>
</form>

        </div>
        <hr>
        <div class="container">&copy; PRIOU Dylan CORFA Sylouan MALARD Davy PARRA Adrien 2017</div>
    </body>
</html>