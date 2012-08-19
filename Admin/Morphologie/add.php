<?php
require_once('../../_include.php');

// If creation of morphologie
if (isset($_POST['nom'])) {
    extract($_POST);

    if (strlen($nom) != 0) {
        $newMorphologie = new Morphologie(0, $nom, $commentaire);
        $morphologieManager = new MorphologieManager();
        $morphologieManager->addMorphologie($newMorphologie);


        header('Location: ' . $siteUrl . '/Admin/Morphologie');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Nouvelle morphologie</title>
        <link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../css/style.css" type="text/css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include('../../_header.php');
        ?>
        <div class="largeform_container">
            <form action="add.php" method="post" class="well">
                <h2>nouvelle morphologie</h2><br />
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="span6" id="nom" placeholder="Nom"/>
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" class="span6" id="commentaire" placeholder="Commentaire"></textarea>	
                <br /><br />	
                <button type="submit" class="btn btn-primary">Creer morphologie</button>
            </form>
        </div>
    </body>
</html>