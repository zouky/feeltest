<?php

class TesteurManager extends PdoManager {

    public function getAllTesteurs() {
        $query = $this->pdo->prepare('	
				SELECT *
				FROM testeur
			');

        if ($query) {
            $query->execute();
            $results = array();
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $testeur = new Testeur();
                $testeur->initWithDBTesteur($result);
                $results[] = $testeur;
            }

            $query->closeCursor();
            return $results;
        }
    }

    public function addTesteur($testeur) {
        $query = $this->pdo->prepare('	
				INSERT INTO testeur(nom, prenom, telephone, email, dateNaissance, lieuResi, pilote, testeur, vehicule, commentaire, mobile, adresse, codePostal)
				VALUES(:nom, :prenom, :telephone, :email, :dateNaissance, :lieuResi, :pilote, :testeur, :vehicule, :commentaire, :mobile, :adresse, :codePostal)
			');

        $success = false;

        if ($query) {
            $query->bindValue(':nom', $testeur->getNom());
            $query->bindValue(':prenom', $testeur->getPrenom());
            $query->bindValue(':telephone', $testeur->getTelephone());
            $query->bindValue(':email', $testeur->getEmail());
            $query->bindValue(':dateNaissance', $testeur->getDateNaissance());
            $query->bindValue(':lieuResi', $testeur->getLieuResi());
            $query->bindValue(':pilote', $testeur->getPilote());
            $query->bindValue(':testeur', $testeur->getTesteur());
            $query->bindValue(':vehicule', $testeur->getVehicule());
            $query->bindValue(':commentaire', $testeur->getCommentaire());
            $query->bindValue(':mobile', $testeur->getMobile());
            $query->bindValue(':adresse', $testeur->getAdresse());
            $query->bindValue(':codePostal', $testeur->getCodePostal());

            $success = $query->execute();
            $query->closeCursor();
            return $success;
        }

        
    }

}

?>
