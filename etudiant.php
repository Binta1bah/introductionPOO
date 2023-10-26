<?php

class Etudiant
{
    //proprietes
    protected $matricule;
    protected $nom;
    protected $prenom;
    public $dateNaissance;

    //Constucteur
    public function __construct($matricule, $nom, $prenom)
    {
        $this->setMatricule($matricule);
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }

    //getter de chaque propriété
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getMatricule()
    {
        return $this->matricule;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    //setter de chaque propriété
    public function setNom($newNom)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $newNom)) {
            throw new Exception("Attention! Entrer un nom correct");
        } else {
            $this->nom = $newNom;
        }
    }

    public function setPrenom($newPrenom)
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $newPrenom)) {
            throw new Exception("Attention! Entrer un prénom correct");
        } else {
            $this->prenom = $newPrenom;
        }
    }

    public function setMatricule($newMaticule)
    {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $newMaticule) || strlen($newMaticule) != 8) {
            throw new Exception("Attention! le matricule doit avoir 8 caractere composés et chiffre et de lettre mais commançant par une lettre");
        } else {
            $this->matricule = $newMaticule;
        }
    }

    public function setDateNaissance($newDateNaissance)
    {
        if (!DateTime::createFromFormat('d-m-Y', $newDateNaissance)) {
            throw new Exception("Attention! Entrer une date de Naissance correct");
        } else {
            $this->dateNaissance = $newDateNaissance;
        }
    }

    //methode presenter
    public function Presenter()
    {
        echo "Bonjour je suis $this->nom $this->prenom, mon matricule est le : $this->matricule et je suis né(e) le: $this->dateNaissance <br>";
    }

    //methode FaireCours
    public function FaireCours()
    {
        echo "Je fais de cours <br>";
    }

    //methode FaireEvaluation
    public function FaireEvaluation()
    {
        echo "Je fais d'évaluation <br>";
    }
}
