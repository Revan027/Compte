<?php
	//pense aussi a un algorythme regrdantsi ya beacoup d'esapce dans la chaine et le prochain caractere sera donc le nombre. et recuper que deux caracteres apres al virugle 
		/*$apresvirgule=implode($apresvirgule);	//convertit en string
		$rest=substr($apresvirgule,0,2);		//recupere 2 caracteres apres la virgule	
		$chaine1 .= $chaine2;*/
	$nombre_string;
	$nombre_float=0;
	$depense=0;	
	$copier=$_POST['copier'];	//recupere donnees du formulaire et du text area copier
	echo $copier;
	$trie=explode('-', $copier);					//trouve le signe - et sépare a partir du signe -la chaine en plusieurs chaines
	
	$taille=count($trie); //taille de la chaine pour le parcourir avec le for
	
	
	for($i=1;$i<$taille;$i++) { 					//parcoure le tableau
			sscanf($trie[$i],"%s",$nombre_string);			//recherche le nombre (string) du debut separer par un espace et l'insert dans un tableau
				echo "</br>Trie : ".($trie[$i]) ."</br>";
				
			if((rechercher($nombre_string))!=false){
				
				$nombre_string= str_replace(",",".",$nombre_string);		//replace les virgules par des points 
				echo "<br/>nombre :". $nombre_string;
				$nombre_float=floatval($nombre_string);	//convertit le string en float
				$depense=calculer($depense,$nombre_float);
				echo "<br/><br/>depense:". $depense;
			}
			
	} 
	echo "<br/>depense total:". $depense;
	
	function calculer($depense,$nombre_float){
		return $depense=$depense+$nombre_float;
	}
	
	function rechercher($chaine){
		$a = strpos($chaine,','); //recherche si la chaine contient une virgule. Sinon, ce n'est pas une depense;
		$b = strpos($chaine,'%'); 

		if($a==false || $b!=false){
			return false;			
		}else{
			return true;
		}		
	}
	
	
	
	

		//print_r();
		//echo" strpos(($_POST['copier']), '-')";
			
		//while($incre<=(strlen($_POST['copier']))){
			
			//echo $incre;
			//$incre++;
			//$interet2[$incre]=$_POST['copier'];
		//};
		//return $interet2[];
		//return strlen($_POST['copier']);
?>
