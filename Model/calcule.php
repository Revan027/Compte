<?php

header("Content-Type: text/plain");
include("./getDB.php");
include("../Controller/fctCalcul.php");

$copier = $_POST['copier']; //recupère donnees du formulaire et du text area copier
$annee = $_POST['annee'];
$mois = $_POST['mois'];
$rentre = $_POST['rentre'];
$rentre = str_replace(",", ".", $rentre);
$rentre = str_replace(' ', '', $rentre); //remplace l'espace du milier par rien

$tableauDesNombres = renvoieTableauDesNombres($copier);
$depense = renvoieDepense($tableauDesNombres); //calcule de la depense
$benefice = ($rentre - $depense); //calcule du bénéfice	

ajouterDB($annee, $rentre, $depense, $mois, $benefice,$tableauDesNombres); //ajout dans la base de données


