<?php

Class Morphologie {

    private $id;
    private $nom;
    private $commentaire;

    function __construct($id = 0, $nom = null, $commentaire = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->commentaire = $commentaire;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
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

    public function initWithDBMorphologie($morphologie) {
        $this->id = $morphologie['id'];
        $this->nom = $morphologie['nom'];
        $this->commentaire = $morphologie['commentaire'];
    }

    public function displayAsCell() {
        echo '<tr id="' . $this->id . '"><td>' . $this->id . '</td><td>' . $this->nom . '</td><td>' . $this->commentaire . '</td><td><a href="edit.php?id=' . $this->id . '" class="btn btn-mini"><i class="icon-edit"></i> Editer</a> <a href="delete.php?id=' . $this->id . '" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i> Supprimer</a></td></tr>';
    }

}

?>
