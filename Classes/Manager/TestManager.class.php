<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestManager
 *
 * @author Zouky
 */
class TestManager extends PdoManager {

    public function getAllTests() {
        $query = $this->pdo->prepare('
            SELECT * 
            FROM test
            ');
        $result = array();

        if ($query) {
            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $test = new Test();
                $test->initWithDBTest($row);
                $result[] = $test;
            }
            $query->closeCursor();
        }

        return $result;
    }

    public function addTest($test) {
        $query = $this->pdo->prepare('
            INSERT INTO test (nom, client, reference, detail, dateDebut, dateFin, idActivite, commentaire)
            VALUES (:nom, :client, :reference, :detail, :dateDebut, :dateFin, :idActivite, :commentaire)
            ');
        if ($query) {
            $query->bindValue(':nom', $test->getNom());
            $query->bindValue(':client', $test->getClient());
            $query->bindValue(':reference', $test->getReference());
            $query->bindValue(':detail', $test->getDetail());
            $query->bindValue(':dateDebut', $test->getDateDebut());
            $query->bindValue(':dateFin', $test->getDateFin());
            $query->bindValue(':idActivite', $test->getIdActivite());
            $query->bindValue(':commentaire', $test->getCommentaire());

            $success = $query->execute();
            $query->closeCursor();

            return $success;
        }
    }

    public function getTestById($id) {
        $query = $this->pdo->prepare('	
				SELECT *
				FROM test
				WHERE id = :id
			');

        if ($query) {
            $query->bindValue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            $test = new Test();
            $test->initWithDBTest($result);

            $query->closeCursor();
        }
        return $test;
    }

}

?>
