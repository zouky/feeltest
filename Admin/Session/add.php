<?php
require_once('../../_include.php');

// If creation of restaurant
if (isset($_POST['nom'])) {
    extract($_POST);

    if (intval($idTest) == -1) {
        $idTest = null;
    }

    if (strlen($nom) != 0) {

        $objSession = new Session(0, $nom, $dateDebut, $dateFin, $idTest, $commentaire, $lieu);
        $sessionManager = new sessionManager();
        $sessionManager->addSession($objSession);

        //header('Location: '.$siteUrl.'/Admin/Session');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajout de session</title>
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
        $testManager = new TestManager();
        $allTests = $testManager->getAllTests();
        ?>
        <div class="form_container">
            <form action="add.php" method="post" class="well">
                <h2>Nouvelle session</h2><br />
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" class="span6"/>
                <label for="lieu">Lieu</label>
                <input type="text" name="lieu" id="lieu" placeholder="Lieu" class="span6"/>
                <label for="idTest">Test</label>
                <select name="idTest" id="idTest" class="span6">
                    <option value="-1" selected="selected">Choix du test</option>
                    <?php
                    foreach ($allTests as $objTest) {
                        echo '<option value="' . $objTest->getId() . '">' . $objTest->getNom() . '</option>';
                    }
                    ?>
                </select>
                <label for="commentaire">Commentaire</label>
                <input type="text" name="commentaire" id="commentaire" placeholder="Commentaire" class="span6"/>
                Date de début : <br/>
                <input type='text' name='dateDebut' maxlength='150' id="dateDebut" value="0000-00-00" required /><br/><br/>
                Date de fin : <br/>
                <input type='text' name='dateFin' maxlength='150' id="dateFin" value="0000-00-00" required /><br/><br/>

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