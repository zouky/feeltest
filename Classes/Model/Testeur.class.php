<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Testeur
 *
 * @author Zouky
 */
class Testeur {
    private $nom;
    private $prenom;
    private $telephone;
    private $email;
    private $dateNaissance;
    private $lieuxResi;
    private $pilote;
    private $vehicule;
    private $commentaire;
    
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    public function getLieuxResi() {
        return $this->lieuxResi;
    }

    public function setLieuxResi($lieuxResi) {
        $this->lieuxResi = $lieuxResi;
    }

    public function getPilote() {
        return $this->pilote;
    }

    public function setPilote($pilote) {
        $this->pilote = $pilote;
    }

    public function getVehicule() {
        return $this->vehicule;
    }

    public function setVehicule($vehicule) {
        $this->vehicule = $vehicule;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function __construct($nom, $prenom, $telephone, $email, $dateNaissance, $lieuxResi, $pilote, $vehicule, $commentaire) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->dateNaissance = $dateNaissance;
        $this->lieuxResi = $lieuxResi;
        $this->pilote = $pilote;
        $this->vehicule = $vehicule;
        $this->commentaire = $commentaire;
    }

}

?>
