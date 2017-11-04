<?php
	include("./Gestion/getDB.php");
	
	//if((isset($_POST['id']))) test si variable existe
	$id = $_POST['id'];
	$annee = $_POST['annee'];
	
	supprimerDB($id,$annee);	
?>