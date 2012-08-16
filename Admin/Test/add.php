<?php
require_once('../../_include.php');
$page = 1;

// If creation of restaurant
if (isset($_POST['nom'])) {
    extract($_POST);

    if (intval($idActivite) == -1) {
        $idActivite = null;
    }

    if (strlen($nom) != 0 && strlen($client) != 0) {

        $objTest = new Test(0, $nom, $client, $reference, $detail, $dateDebut, $dateFin, $idActivite, $commentaire);
        $testManager = new TestManager();
        $testManager->addTest($objTest);

        header('Location: '.$siteUrl.'/Admin/Test');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajout de test</title>
        <link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../libraries/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" />
        <link rel="stylesheet" href="../../css/style.css" type="text/css">
        <script type="text/javascript" src="../../libraries/jquery.js"></script>
        <script type="text/javascript" src="../../libraries/jquery-ui.js"></script>

    </head>
    <body>
        <?php
        include('../../_header.php');

        // Get all menus
        $activiteManager = new activiteManager();
        $allActivites = $activiteManager->getAllActivites();
        ?>
        <div class="form_container">
            <form action="add.php" method="post" class="well">
                <h2>Nouveau test</h2><br />
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" class="span6"/>
                <label for="client">Client</label>
                <input type="text" name="client" id="client" placeholder="Client" class="span6"/>
                <label for="reference">Référence</label>
                <input type="text" name="reference" id="reference" placeholder="Référence" class="span6"/>
                <label for="reference">Détail</label>
                <input type="text" name="detail" id="detail" placeholder="Détail" class="span6"/>
                <label for="idActivite">Activité</label>
                <select name="idActivite" id="current_menu" class="span6">
                    <option value="-1" selected="selected">Choix de l'activité</option>
                    <?php
                    foreach ($allActivites as $objActivite) {
                        echo '<option value="' . $objActivite->getId() . '">' . $objActivite->getNom() . '</option>';
                    }
                    ?>
                </select>        
                Date de début : <br/>
                <input type='text' name='dateDebut' maxlength='150' id="dateDebut" value="0000-00-00" required /><br/><br/>
                Date de fin : <br/>
                <input type='text' name='dateFin' maxlength='150' id="dateFin" value="0000-00-00" required /><br/><br/>
                <label for="commentaire">Commentaire</label>
                <input type="text" name="commentaire" id="commentaire" placeholder="Commentaire" class="span6"/>
                <br /><br />
                <button type="submit" class="btn btn-primary">Creer</button>
            </form>
        </div>

        <script>
            $(function(){
                $("#dateDebut").datepicker({ dateFormat: 'yy-mm-dd' });
                $("#dateFin").datepicker({ dateFormat: 'yy-mm-dd' });
            });
        </script>

    </body>
</html>