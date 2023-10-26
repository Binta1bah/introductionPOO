<?php

require_once ('etudiant.php');
require_once ('professeur.php');
require_once ('evaluation.php');



// $etudiant1 = new Etudiant("Binta123", "Bah", "Binta");
// $etudiant1->setDateNaissance("01-01-1990");
// $etudiant1->Presenter();
// $etudiant1->FaireCours();
// $etudiant1->FaireEvaluation();


$Professeur1 = new Professeur("Sadio123", "Bah", "Sadio", true, "5000000", "Reseau Informatique");
$Professeur1->Presenter();

$evaluation1 = new Evaluation("Evaluation Ecrite en Reseau", "26-10-2023", 2, $Professeur1);
$evaluation1->afficherEva();
// $Professeur1->EvaluerEtudiant("01-11-2023");
