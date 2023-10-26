<?php

interface Evaluations
{
    public function EvaluerEtudiant($dateEvaluation);
}



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

// Instanciation et appel des méthodes
$etudiant1 = new Etudiant("Binta123", "Bah", "Binta");
$etudiant1->setDateNaissance("01-01-1990");
$etudiant1->Presenter();
$etudiant1->FaireCours();
$etudiant1->FaireEvaluation();



// Classe Professeur
class Professeur extends Etudiant implements Evaluations
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


        echo "Bonjour je suis $this->nom $this->prenom, mon matricule est le : $this->matricule,  je suis Professeur de $this->specialite, j'ai un salaire de $this->salaire FCFA et $message";
    }

    public function EvaluerEtudiant($dateEvaluation)
    {
        if (!DateTime::createFromFormat('d-m-Y', $dateEvaluation)) {
            throw new Exception("La date n'est pas correct");
        } else {
            echo "Je vais évaluer les etudiants le $dateEvaluation";
        }
    }
}

$Professeur1 = new Professeur("Sadio123", "Bah", "Sadio", true, "5000000", "Reseau Informatique");
$Professeur1->Presenter();
$Professeur1->EvaluerEtudiant("01-11-2023");
