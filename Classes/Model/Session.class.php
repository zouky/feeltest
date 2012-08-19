<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author Zouky
 */
class Session {

    private $id;
    private $nom;
    private $dateDebut;
    private $dateFin;
    private $idTest;
    private $commentaire;
    private $lieu;

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

    public function getIdTest() {
        return $this->idTest;
    }

    public function setIdTest($idTest) {
        $this->idTest = $idTest;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    function __construct($id = 0, $nom = null, $dateDebut = null, $dateFin = null, $idTest = 0, $commentaire = null, $lieu = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->idTest = $idTest;
        $this->commentaire = $commentaire;
        $this->lieu = $lieu;
    }

    public function initWithDBSession($db_session) {
        $this->id = $db_session['id'];
        $this->nom = $db_session['nom'];
        $this->dateDebut = $db_session['dateDebut'];
        $this->dateFin = $db_session['dateFin'];
        $this->idTest = $db_session['idTest'];
        $this->commentaire = $db_session['commentaire'];
        $this->lieu = $db_session['lieu'];
    }

    public function displayAsCell() {

        $test = new testManager();
        $objTest = $test->getTestById($this->idTest);
        echo '<tr id="' . $this->id . '">
                            <td>' . $this->id . '</td>
                                <td>' . $this->nom . '</td>
                                    <td>' . $this->lieu . '</td>
                                                <td>' . $objTest->getNom() . '</td>
                                                    <td>' . $this->dateDebut . '</td>
                                                        <td>' . $this->dateFin . '</td>
                                                            <td>' . $this->commentaire . '</td>
                                            <td><a href="edit.php?id=' . $this->id . '" class="btn btn-mini"><i class="icon-edit"></i> Editer</a> 
                                                <a href="delete.php?id=' . $this->id . '" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i>
                                                    Supprimer</a></td></tr>';
    }

}

?>
