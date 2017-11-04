<?php
	include("./Gestion/getDB.php");	 //Inclut les fonctions du fichier 
	
	//if((isset($_POST['id'])))
	$annee = $_POST['annee'];

	afficherTableau($annee);	
?>