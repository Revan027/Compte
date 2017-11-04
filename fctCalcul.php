<?php
	function renvoieTableauDesNombres($copier){
		
		$nombre_string;
		$nombre_float = 0;
		$depense = 0;	
		$tableauDesNombres = array();
		
		$trie = explode('-', $copier);					//trouve le signe - et sépare a partir du signe -la chaine en plusieurs chaines
		$taille = count($trie); //taille de la chaine pour le parcourir avec le for
		$tableauPopPup = array();
		//echo $copier ;
	
		for($i=0;$i<$taille;$i++) { //parcoure le tableau
		
			//echo $trie[$i]."oui</br>";
			sscanf($trie[$i],"%s",$nombre_string);			//recherche le nombre (string) du debut separer par un espace et l'insert dans un tableau
			//echo "</br>Trie : ".$nombre_string ."</br>";
				
			if((rechercher($nombre_string)) != false){
			 
				$nombre_string = str_replace(",",".",$nombre_string);		//remplace les virgules par des points 
				$nombre_string = str_replace(' ', '', $nombre_string);
				
				$nombre_float = floatval($nombre_string);	//convertit le string en float
				
				$tableauDesNombres[] = $nombre_float;
		
			}
		}

		return $tableauDesNombres;
	}
	
	function renvoieDepense($tableauDesNombres){
		
		$depense = 0;
		
		for($i=0;$i<(count($tableauDesNombres));$i++){
			$depense = $depense + $tableauDesNombres[$i];
		}
		
		return $depense;
	}
	
	function fctInfoBulle($tableauDesNombres){
		echo"<div id='infoBulle'>";
		for($i=0;$i<(count($tableauDesNombres));$i++){
			echo "".$tableauDesNombres[$i]."</br>";
		}
		echo"</div>";
	}
	
	function rechercher($chaine){
		
		$recherche = "#[&!.^$\(\])[{}?+*&@%§£\#/]#"; //caractere a trouver
		
		$a = strpos($chaine,','); //recherche si la chaine contient une virgule. Sinon, ce n'est pas une depense;	
		$b = preg_match($recherche,$chaine);	//cherche des caracteres spéciaux dans la chaine

		if($a == false || $b == 1){
			//echo "Valeur non prise : ".$chaine."</br>";
			return false;			
		}else{
			return true;
		}		
	}
?>