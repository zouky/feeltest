<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activite
 *
 * @author Zouky
 */
class Activite {
    private $id;
    private $nom;
    private $description;
    private $commentaire;
    

public function getId() {
return $this->id;
}

public function setId($id) {
$this->id = $id;
}

public function getNom() {
return $this->nom;
}

public function setNom($nom) {
$this->nom = $nom;
}

public function getDescription() {
return $this->description;
}

public function setDescription($description) {
$this->description = $description;
}

public function getCommentaire() {
return $this->commentaire;
}

public function setCommentaire($commentaire) {
$this->commentaire = $commentaire;
}


public function __construct($id = 0, $nom = null, $description = null, $commentaire = null) {
    $this->id           = $id;
    $this->nom          = $nom;
    $this->description  = $description;
    $this->commentaire  = $commentaire;
}

public function initWithDBActivite($activite) {
    $this->id           = $activite['id'];
    $this->nom          = $activite['nom'];
    $this->description  = $activite['description'];
    $this->commentaire  = $activite['commentaire'];
}

public function displayAsCell(){
			echo '<tr id="'.$this->id.'"><td>'.$this->id.'</td><td>'.$this->nom.'</td><td>'.$this->description.'</td><td>'.$this->commentaire.'</td><td><a href="edit.php?id='.$this->id.'" class="btn btn-mini"><i class="icon-edit"></i> Edit</a> <a href="delete.php?id='.$this->id.'" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i> Delete</a></td></tr>';
		}

}
?>