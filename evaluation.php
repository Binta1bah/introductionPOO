<?php

require_once('etudiant.php');
require_once('professeur.php');

class Evaluation
{
    private $nomEva;
    private $infoProf;
    private $dateEva;
    private $duree;

    public function __construct($nomEva, $dateEva, $duree, $infoProf)
    {
        $this->setDateEva($dateEva);
        $this->setNomEva($nomEva);
        $this->setDuree($duree);
        $this->infoProf = $infoProf;
    }

    public function getNomEva()
    {
        return $this->nomEva;
    }


    public function getDateEva()
    {
        return $this->dateEva;
    }


    public function getDuree()
    {
        return $this->duree;
    }


    public function getInfoProf()
    {
        return $this->infoProf;
    }

    public function setNomEva($newNomEva)
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $newNomEva)) {
            throw new Exception("Attention! Entrer un nom correct");
        } else {
            $this->nomEva = $newNomEva;
        }
    }

    public function setDuree($newDuree)
    {
        if (!is_numeric($newDuree) || $newDuree < 0 || $newDuree > 24) {
            throw new Exception("Attention! Entrer une durée correct");
        } else {
            $this->duree = $newDuree;
        }
    }


    public function setDateEva($newDateEva)
    {
        if (!DateTime::createFromFormat('d-m-Y', $newDateEva)) {
            throw new Exception("La date n'est pas correct");
        } else {
            $this->dateEva = $newDateEva;
        }
    }

    public function afficherEva()
    {
        echo "Nom:  $this->nomEva ; Date: $this->dateEva; Durée: $this->duree heures. Par le professeur " . $this->getInfoProf()->getNom() . " " . $this->getInfoProf()->getPrenom();
    }
}

// $Professeur1 = new Professeur("Sadio123", "Bah", "Sadio", true, "5000000", "Reseau Informatique");
// $evaluation1 = new Evaluation("Evaluation Ecrite en Reseau", "26-10-2023", 2, $Professeur1);
// $evaluation1->afficherEva();
// echo "Par le professeur " . $evaluation1->getInfoProf()->getNom();
// echo " " . $evaluation1->getInfoProf()->getPrenom();
