<?php

// require_once('interface.php');

class Professeur extends Etudiant
{
    private $voiture;
    private $salaire;
    private $specialite;

    public function __construct($matricule, $nom, $prenom, $voiture, $salaire, $specialite)
    {

        parent::__construct($matricule, $nom, $prenom);
        $this->setVoiture($voiture);
        $this->setSalaire($salaire);
        $this->setspecialite($specialite);
    }


    //les getter de chaque propriétés
    public function getVoiture()
    {
        return  $this->voiture;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function getSpecialite()
    {
        return $this->specialite;
    }


    //les setter de chaques propriétés
    public function setVoiture($newVoiture)
    {
        if (!is_bool($newVoiture)) {
            throw new Exception("Attention Voiture c'est 'true' ou 'false' ");
        } else {
            $this->voiture = $newVoiture;
        }
    }

    public function setSalaire($newSalaire)
    {
        if (!preg_match("/^[0-9 ]+$/", $newSalaire)) {
            throw new Exception("Attention Donner un salaire correct");
        } else {
            $this->salaire = $newSalaire;
        }
    }

    public function setspecialite($newSpecialite)
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $newSpecialite)) {
            throw new Exception("Attention Donner une specialité correct");
        } else {
            $this->specialite = $newSpecialite;
        }
    }


    // Rediffinition de la fonction Presenter
    public function Presenter()
    {
        $siVoiture = $this->voiture;
        if ($siVoiture) {
            $message = "j'ai une voiture  <br>";
        } else {
            $message = "je n'ai pas de voiture <br>";
        }


        echo "Bonjour je suis $this->nom $this->prenom, mon matricule est le : $this->matricule,  je suis Professeur de $this->specialite, j'ai un salaire de $this->salaire FCFA et $message <br>";
    }
}
