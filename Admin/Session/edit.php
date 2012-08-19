<?php
require_once('../../_include.php');
$page = 1;

// If id get the session
if (isset($_GET['id'])) {
    $sessionManager = new SessionManager();
    $session = $sessionManager->getSessionById($_GET['id']);
}

// If edition of session
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $lieu = $_POST['lieu'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $commentaire = $_POST['commentaire'];
    $idTest = $_POST['idTest'];
    $id = (int) $_POST['id'];

    if (intval($idTest) == -1) {
        $idTest = null;
    }

    if (strlen($nom) != 0) {

        $sessionManager = new sessionManager();
        $session = $sessionManager->getSessionById($id);

        $session->setNom($nom);
        $session->setLieu($lieu);
        $session->setIdTest($idTest);
        $session->setCommentaire($commentaire);
        $session->setDateDebut($dateDebut);
        $session->setDateFin($dateFin);
        $sessionManager->updateSession($session);


        header('Location: ' . $siteUrl . '/Admin/Session');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Editer une session</title>
        <link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../css/style.css" type="text/css">
    </head>
    <body>
        <?php
        include('../../_header.php');

        // Get all tests
        $testManager = new TestManager();
        $allTests = $testManager->getAllTests();
        ?>
        <div class="form_container">
            <form action="edit.php" method="post" class="well">
                <h2>Editer une session</h2><br />
                <?php
                echo '<input type="text" name="id" value="' . $session->getId() . '" style="display:none" />';
                ?>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo $session->getNom(); ?>" class="span6"/>
                <label for="lieu">Lieu</label>
                <input type="text" name="lieu" id="lieu" placeholder="Lieu" class="span6" value="<?php echo $session->getLieu(); ?>"/>
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
                <input type="text" name="commentaire" id="commentaire" placeholder="Commentaire" value="<?php echo $session->getCommentaire(); ?>" class="span6"/>
                Date de début : <br/>
                <input type='text' name='dateDebut' maxlength='150' id="dateDebut" value="<?php echo $session->getDateDebut(); ?>" required /><br/><br/>
                Date de fin : <br/>
                <input type='text' name='dateFin' maxlength='150' id="dateFin" value="<?php echo $session->getDateFin(); ?>" required /><br/><br/>

                <br /><br />
                <button type="submit" class="btn btn-primary">Editer</button>
            </form>
        </div>
    </body>
</html>