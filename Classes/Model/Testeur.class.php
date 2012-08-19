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

    private $id;
    private $nom;
    private $prenom;
    private $telephone;
    private $mobile;
    private $email;
    private $dateNaissance;
    private $adresse;
    private $lieuResi;
    private $codePostal;
    private $pilote;
    private $testeur;
    private $vehicule;
    private $commentaire;
    
    
    public function getMobile() {
        return $this->mobile;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

        public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTesteur() {
        return $this->testeur;
    }

    public function setTesteur($testeur) {
        $this->testeur = $testeur;
    }

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

    public function getLieuResi() {
        return $this->lieuResi;
    }

    public function setLieuResi($lieuResi) {
        $this->lieuResi = $lieuResi;
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

    function __construct($id = 0, $nom = null, $prenom = null, $telephone = null, $email = null, $dateNaissance = null, $lieuResi = null, $pilote = null, $testeur = null, $vehicule = null, $commentaire = null, $mobile = null, $adresse = null, $codePostal = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->dateNaissance = $dateNaissance;
        $this->lieuResi = $lieuResi;
        $this->pilote = $pilote;
        $this->testeur = $testeur;
        $this->vehicule = $vehicule;
        $this->commentaire = $commentaire;
        $this->mobile = $mobile;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
    }

    public function initWithDBTesteur($testeur) {
        $this->id = $testeur['id'];
        $this->nom = $testeur['nom'];
        $this->prenom = $testeur['prenom'];
        $this->telephone = $testeur['telephone'];
        $this->email = $testeur['email'];
        $this->dateNaissance = $testeur['dateNaissance'];
        $this->lieuResi = $testeur['lieuResi'];
        $this->pilote = $testeur['pilote'];
        $this->testeur = $testeur['testeur'];
        $this->vehicule = $testeur['vehicule'];
        $this->commentaire = $testeur['commentaire'];
        $this->mobile = $testeur['mobile'];
        $this->adresse = $testeur['adresse'];
        $this->codePostal = $testeur['codePostal'];
    }

    public function displayAsCell() {

        echo '<tr id="' . $this->id . '">
                            <td>' . $this->id . '</td>
                                <td>' . $this->nom . '</td>
                                    <td>' . $this->prenom . '</td>
                                                    <td>' . $this->telephone . '</td>
                                                        <td>' . $this->email . '</td>
                                                            <td>' . $this->dateNaissance . '</td>
                                                                <td>' . $this->lieuResi . '</td>
                                                                    <td>' . $this->pilote . '</td>
                                                                        <td>' . $this->testeur . '</td>
                                                                            <td>' . $this->vehicule . '</td>
                                                            <td>' . $this->commentaire . '</td>
                                            <td><a href="edit.php?id=' . $this->id . '" class="btn btn-mini"><i class="icon-edit"></i> Editer</a> 
                                                <a href="delete.php?id=' . $this->id . '" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i>
                                                    Supprimer</a></td></tr>';
    }

}

?>
