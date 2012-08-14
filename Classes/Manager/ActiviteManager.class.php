<?php

	class activiteManager extends PdoManager {
		
		public function getAllActivites(){
			$query = $this->pdo->prepare('	
				SELECT *
				FROM activite
			');
			
			if($query){
				$query->execute();
				$results = array();
				while($result = $query->fetch(PDO::FETCH_ASSOC)) {
					$activite = new Activite();
					$activite->initWithDBActivite($result);
					$results[] = $activite;
				}
		
				$query->closeCursor();
				return $results;	
			}
		}
		
		public function getActiviteById($id){
			$query = $this->pdo->prepare('	
				SELECT *
				FROM activite
				WHERE id = :id
			');
			
			if($query){
				$query->bindValue(':id', $id);
				$query->execute();
	
				$result = $query->fetch(PDO::FETCH_ASSOC);
				$activite = new Activite();
				$activite->initWithDBActivite($result);
					
				$query->closeCursor();
				return $activite;	
			}
		}
		
		public function addActivite($activite){
			$query = $this->pdo->prepare('	
				INSERT INTO activite(nom, description, commentaire)
				VALUES(:nom, :description, :commentaire)
			');
			
			if($query){
				$query->bindValue(':nom', $activite->getNom());
				$query->bindValue(':description', $activite->getDescription());
                                $query->bindValue(':commentaire', $activite->getCommentaire());
				
				$success =  $query->execute();
				$query->closeCursor();
				
				return $success;
			}
		}
		
		public function updateActivite($activite){
			$query = $this->pdo->prepare('	
				UPDATE activite
				SET nom = :nom, description = :description, commentaire = :commentaire
				WHERE id = :id
			');
			
			if($query){
				$query->bindValue(':nom', $activite->getNom());
				$query->bindValue(':description', $activite->getDescription());
                                $query->bindValue(':commentaire', $activite->getCommentaire());
				$query->bindValue(':id', $activite->getId());
				
				$success = $query->execute();
				$query->closeCursor();
				
				return $success;
			}
		}
		
		public function deleteActivite($id){
		
			// Delete the menu itself
			$query = $this->pdo->prepare('	
				DELETE FROM activite
				WHERE id=:id
			');
			if ($query){
				$query->bindValue(':id', $id);
				$success = $query->execute();
				$query->closeCursor();
				return $success;
                        }
		}
	}

?>