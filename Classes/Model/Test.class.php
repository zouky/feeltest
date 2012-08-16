<?php
    class Test
    {
        private $id;
        private $nom;
        private $client;
        private $reference;
        private $detail;
        private $dateDebut;
        private $dateFin;
        private $idActivite;
        private $commentaire;
        private $nomActivite;
        
        
public function getNomActivite() {
    return $this->nomActivite;
}

public function setNomActivite($nomActivite) {
    $this->nomActivite = $nomActivite;
}

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

public function getClient() {
return $this->client;
}

public function setClient($client) {
$this->client = $client;
}

public function getReference() {
return $this->reference;
}

public function setReference($reference) {
$this->reference = $reference;
}

public function getDetail() {
return $this->detail;
}

public function setDetail($detail) {
$this->detail = $detail;
}

public function getDateDebut() {
return $this->dateDebut;
}

public function setDateDebut($dateDebut) {
$this->dateDebut = $dateDebut;
}

public function getDateFin() {
return $this->dateFin;
}

public function setDateFin($dateFin) {
$this->dateFin = $dateFin;
}

public function getIdActivite() {
return $this->idActivite;
}

public function setIdActivite($idActivite) {
$this->idActivite = $idActivite;
}

public function getCommentaire() {
return $this->commentaire;
}

public function setCommentaire($commentaire) {
$this->commentaire = $commentaire;
}

public function __construct($id = 0, $nom = null, $client = null, $reference = null, $detail = null, $dateDebut = null, $dateFin = null, $idActivite = 0, $commentaire = null, $nomActivite = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->client = $client;
        $this->reference = $reference;
        $this->detail = $detail;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->idActivite = $idActivite;
        $this->commentaire = $commentaire;
}
    
public function initWithDBTest ($db_test) {
        $this->id           = $db_test['id'];
        $this->nom          = $db_test['nom'];
        $this->client       = $db_test['client'];
        $this->reference    = $db_test['reference'];
        $this->detail       = $db_test['detail'];
        $this->dateDebut    = $db_test['dateDebut'];
        $this->dateFin      = $db_test['dateFin'];
        $this->idActivite   = $db_test['idActivite'];
        $this->commentaire  = $db_test['commentaire'];
    }
    
public function displayAsCell(){
    
    $activite = new activiteManager();
    $objActivite = $activite->getActiviteById($this->idActivite);
			echo '<tr id="'.$this->id.'">
                            <td>'.$this->id.'</td>
                                <td>'.$this->nom.'</td>
                                    <td>'.$this->client.'</td>
                                        <td>'.$this->reference.'</td>
                                            <td>'.$this->detail.'</td>
                                                <td>'.$objActivite->getNom().'</td>
                                                    <td>'.$this->dateDebut.'</td>
                                                        <td>'.$this->dateFin.'</td>
                                                            <td>'.$this->commentaire.'</td>
                                            <td><a href="edit.php?id='.$this->id.'" class="btn btn-mini"><i class="icon-edit"></i> Editer</a> 
                                                <a href="delete.php?id='.$this->id.'" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i>
                                                    Supprimer</a></td></tr>';
            }

public function displayAsOption($selectedTest = -1){
        if($selectedTest == $this->id){
                echo '<option value="'.$this->id.'" selected="selected">'.$this->nom.'</option>';				
        } else {
                echo '<option value="'.$this->id.'">'.$this->nom.'</option>';				
        }
}
    }
?>