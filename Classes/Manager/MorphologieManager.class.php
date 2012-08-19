<?php

	class MorphologieManager extends PdoManager {
		
		public function getAllMorphologies(){
			$query = $this->pdo->prepare('	
				SELECT *
				FROM morphologie
			');
			
			if($query){
				$query->execute();
				$results = array();
				while($result = $query->fetch(PDO::FETCH_ASSOC)) {
					$morphologie = new Morphologie();
					$morphologie->initWithDBMorphologie($result);
					$results[] = $morphologie;
				}
		
				$query->closeCursor();
				return $results;	
			}
		}
		
		public function getMorphologieById($id){
			$query = $this->pdo->prepare('	
				SELECT *
				FROM morphologie
				WHERE id = :id
			');
			
			if($query){
				$query->bindValue(':id', $id);
				$query->execute();
	
				$result = $query->fetch(PDO::FETCH_ASSOC);
				$morphologie = new Morphologie();
				$morphologie->initWithDBMorphologie($result);
					
				$query->closeCursor();
					
			}
                        return $morphologie;
		}
		
		public function addMorphologie($morphologie){
			$query = $this->pdo->prepare('	
				INSERT INTO morphologie (nom, commentaire)
				VALUES(:nom, :commentaire)
			');
                        
                        $success = false;
			
			if($query){
				$query->bindValue(':nom', $morphologie->getNom());
                                $query->bindValue(':commentaire', $morphologie->getCommentaire());
				
				$success =  $query->execute();
				$query->closeCursor();
				
				
			}
                        
                        return $success;
		}
		
		public function updateMorphologie($morphologie){
			$query = $this->pdo->prepare('	
				UPDATE morphologie
				SET nom = :nom, commentaire = :commentaire
				WHERE id = :id
			');
			
			if($query){
                            var_dump($morphologie);
				$query->bindValue(':nom', $morphologie->getNom());
                                $query->bindValue(':commentaire', $morphologie->getCommentaire());
				$query->bindValue(':id', $morphologie->getId());
				
				$success = $query->execute();
				$query->closeCursor();
				
				return $success;
			}
		}
		
		public function deleteMorphologie($id){
		
			// Delete the menu itself
			$query = $this->pdo->prepare('	
				DELETE FROM morphologie
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