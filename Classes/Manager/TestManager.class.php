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
        $query = $this->pdo->prepare ('
            SELECT * 
            FROM test
            ');
        if($query){
            $query->execute();
            $result = array();
            while ($result = $query->fetch(PDO::FETCH_ASSOC)){
                $test = new Test();
                $test->initWithDBTest($result);
                $result[] = $test;
            }
            $query->closeCursor();
            return $result;
            }
    }
    
    
    public function addTest ($test){
        $query = $this->pdo->prepare('
            INSERT INTO Test (nom, client, reference, detail, dateDebut, dateFin, idActivite, commentaire)
            VALUE (:nom, :client, :reference, :detail, :dateDebut, :dateFin, :commentaire)
            ');
        if ($query){
            $query->bindValue(':nom', $test->getNom());
            $query->bindValue(':clent', $test->getClient());
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
    
}

?>
