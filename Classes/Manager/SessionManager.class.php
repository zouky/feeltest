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
class SessionManager extends PdoManager {

    public function getAllSessions() {
        $query = $this->pdo->prepare('
            SELECT * 
            FROM session
            ');
        $result = array();

        if ($query) {
            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $session = new Session();
                $session->initWithDBSession($row);
                $result[] = $session;
            }
            $query->closeCursor();
        }

        return $result;
    }

    public function updateSession(Session $session) {
        $query = $this->pdo->prepare('	
				UPDATE session
				SET nom = :nom, dateDebut = :dateDebut, dateFin = :dateFin, lieu = :lieu, idTest = :idTest, commentaire = :commentaire
				WHERE id = :id
			');

        if ($query) {
            $query->bindValue(':nom', $session->getNom());
            $query->bindValue(':dateDebut', $session->getDateDebut());
            $query->bindValue(':dateFin', $session->getDateFin());
            $query->bindValue(':lieu', $session->getLieu());
            $query->bindValue(':idTest', $session->getIdTest());
            $query->bindValue(':commentaire', $session->getCommentaire());
            $query->bindValue(':id', $session->getId());

            $success = $query->execute();
            $query->closeCursor();

            return $success;
        }
    }

    public function getSessionById($id) {
        $query = $this->pdo->prepare('	
				SELECT *
				FROM session
				WHERE id = :id
			');

        if ($query) {
            $query->bindValue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            $session = new Session();
            $session->initWithDBSession($result);

            $query->closeCursor();
        }
        return $session;
    }

    public function addSessions($session) {
        $query = $this->pdo->prepare('
            INSERT INTO session (nom, dateDebut, dateFin, lieu, idTest, commentaire)
            VALUES (:nom, :dateDebut, :dateFin, :lieu, :idTest, :commentaire)
            ');
        if ($query) {
            $query->bindValue(':nom', $session->getNom());
            $query->bindValue(':dateDebut', $session->getDateDebut());
            $query->bindValue(':dateFin', $session->getDateFin());
            $query->bindValue(':lieu', $session->getLieu());
            $query->bindValue(':idTest', $session->getIdTest());
            $query->bindValue(':commentaire', $session->getCommentaire());

            $success = $query->execute();
            $query->closeCursor();
        }
        return $success;
    }

}

?>
